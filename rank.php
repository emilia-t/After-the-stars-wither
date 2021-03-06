<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="favicon.ico"/>
    <title>排行</title>
	<script>
        function judge() {
            var userAgentInfo = navigator.userAgent;
            var Agents = ["Android", "iPhone",
                "SymbianOS", "Windows Phone",
                "iPad", "iPod"
            ];    //  判断是否是这几个系统
            var isPC = true;
            for (let i = 0; i < Agents.length; i++) {
                if (userAgentInfo.indexOf(Agents[i]) > 0) {
                    isPC = false;
                    break;
                }
            }
            return isPC;
        }
        var isPC = judge();
        if(!isPC){
            window.location.href = 'rank_pe.php' //跳转到手机端页面
        }
    </script>
    <style>
        #show{width:80%;position: absolute;left: 11%;margin: 0;}
        #refresh{background: rgba(164, 221, 255, 0.71);position: fixed;bottom: 0;z-index: 999;width: 100%;height: 28px;text-align: center}
        body{margin: 0;border: 0;padding: 0}
        .outline{width:24%;height:auto;position: absolute;margin:3px;padding: 0;border: 1px #96ddff solid;border-radius: 16px}
        .picture{width:100%;border-radius: 16px ;margin: 0;border: 0;padding: 0}
        .img_bottom{width:100%;position:absolute;bottom:4px;border-radius:0 0 16px 16px;height: 40px;background: rgba(197, 243, 255, 0.5);margin: 0;border: 0;padding: 0}
        .like_img{width: 40px;z-index: 9999}
        .data_img{font-size: 18px;position: absolute;top:12px;color: #ff3a44}
        #menu{position: fixed;width: 10%;height: 100%}
        #menu img{position: fixed;left:2%;top:48%;width: 7%}
    </style>
</head>
<body>
<script>
    var list_height=new Array();
    list_height['list0']=[0];
    list_height['list1']=[0.1];
    list_height['list2']=[0.2];
    list_height['list3']=[0.3];
    function get_outline_height(img_number) {
        var window_width = window.screen.width;
        var xml = new XMLHttpRequest();
        xml.open('get','php/get_outline_height.php?window_width='+window_width+'&img_number='+img_number,false);
        xml.send();
        return parseFloat(xml.responseText);
    }
    function like_picture(id){
        var xml=new XMLHttpRequest();
        xml.open('post','php/like_picture.php',false);
        xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xml.send('picture_id='+id);
        var img_id_s=document.getElementById(id);
        img_id_s.src='img/like.png';
    }
    function get_like_number(id) {
        var xml=new XMLHttpRequest();
        xml.open('post','php/get_like_number.php',false);
        xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xml.send('picture_id='+id);
        return xml.responseText;
    }
    function add_a_picture(id) {
        var list_width=(window.screen.width)*0.192+10;
        var new_list=new Array();
        var last_list_top='';
        var last_list_left='';
        var last_list_name=0;
        for(i=0;i<4;i++){
            var alist_height_1=list_height['list'+i];
            new_list[i]=alist_height_1[0];
        }
        new_list.sort(function (a,b){return a-b;});
        for (i=0;i<4;i++){
            if(new_list[0]===list_height['list'+i][0]){last_list_top=list_height['list'+i][0]+'px';last_list_left=list_width*i+'px';last_list_name=i}
        }
        var picture_number=id;
        var show=document.getElementById('show');
        var new_div=document.createElement('div');
        var img_url='thumbnail/'+picture_number+'.jpg';
        var inner_html='<a href="source/'+picture_number+'.jpg" target="_blank"><img alt="加载失败" src="'+img_url+'" class="picture"></a>\n' +
            '        <div class="img_bottom">\n' +
            '            <img src="img/no_like.png" id="'+picture_number+'" onclick="like_picture('+picture_number+')" class="like_img" alt="加载失败">'+
            get_like_number(picture_number)+
            '            <a  class="data_img">id'+picture_number+'</a>\n' +
            '        </div>';
        new_div.innerHTML=inner_html;
        new_div.className='outline';
        new_div.style.top=last_list_top;
        new_div.style.left=last_list_left;
        show.appendChild(new_div);
        switch (last_list_name) {
            case 0:{
                list_height['list0'][0]+=get_outline_height(picture_number);
                break;
            }
            case 1:{
                list_height['list1'][0]+=get_outline_height(picture_number);
                break;
            }
            case 2:{
                list_height['list2'][0]+=get_outline_height(picture_number);
                break;
            }
            case 3:{
                list_height['list3'][0]+=get_outline_height(picture_number);
                break;
            }
        }
    }
</script>
<div id="show">

</div>
<?php
error_reporting(0);
require_once('php/10001.php');
$link=mysqli_connect($mysql_server_name,$mysql_user,$mysql_password);
if ($link->connect_error) {die("error ");}
$databasers=mysqli_select_db($link,'picture');
$sql='SELECT*FROM (SELECT picture_id FROM picture_like_data ORDER BY like_number DESC) AS tmp LIMIT 40';
$que=mysqli_query($link,$sql);
if (mysqli_num_rows($que) > 0) {
    while($row = mysqli_fetch_assoc($que)) {
        $n=$row['picture_id'];
        echo "<script>add_a_picture($n);</script>";
    }
} else {
    echo "0 结果";
}
?>
<div id="menu">
    <pre id="placeholder">
  提
  示

  仅
  展
  示
  前
  4
  0
  张
  图
        </pre>
    <a href="index.php"><img src="img/home.png" alt="加载失败"/></a>
</div>
</body>
</html>
<!doctype html>
<script>
    var mobile_bs = {
        versions: function() {
            var u = navigator.userAgent;
            return {
                trident: u.indexOf('Trident') > -1, //IE内核
                presto: u.indexOf('Presto') > -1,  //opera内核
                webKit: u.indexOf('AppleWebKit') > -1,  //苹果、谷歌内核
                gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1,  //火狐内核
                mobile: !! u.match(/AppleWebKit.*Mobile.*/) || !! u.match(/AppleWebKit/) && u.indexOf('QIHU') && u.indexOf('QIHU') > -1 && u.indexOf('Chrome') < 0,  //是否为移动终端
                ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),  //ios终端
                android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1,  //android终端或者uc浏览器
                iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1,   //是否为iPhone或者QQHD浏览器
                iPad: u.indexOf('iPad') > -1,     //是否iPad
                webApp: u.indexOf('Safari') == -1   //是否web应该程序，没有头部与底部
            }
        } ()
    };
    if (!mobile_bs.versions.mobile) {
        window.location.href = "index.php";
    }
</script>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon2.ico"/>
    <title>星空枯萎漫图站</title>
    <style>
        #show{width:80%;position: absolute;left: 10.2%;margin: 0;top:45px}
        #refresh{background: rgba(164, 221, 255, 0.71);position: fixed;bottom: 0;z-index: 999;width: 100%;height: 28px;text-align: center}
        body{margin: 0;border: 0;padding: 0}
        .outline{width:48%;height:auto;position: absolute;margin:3px;padding: 0;border: 1px #96ddff solid;border-radius: 16px}
        .picture{width:100%;border-radius: 16px ;margin: 0;border: 0;padding: 0}
        .img_bottom{width:100%;position:absolute;bottom:4px;border-radius:0 0 16px 16px;height: 30px;background: rgba(197, 243, 255, 0.5);margin: 0;border: 0;padding: 0}
        .like_img{width: 18%;}
        .data_img{font-size: 60%;position: absolute;margin: 0 0 60px 15%;top:4px}
        #menu{position: fixed;width:8%;height: 100%}
        #menu_img_1{position: fixed;left:0;top:48%;width: 10%}
        #menu_img_2{position: fixed;left:0;top:55%;width: 10%;}
        input::-webkit-input-placeholder{color: #ff3c54;font-size: 14px;font-weight:300;}
        #search input{width: 100%;height: 100%;border-radius: 18px;border:1px solid;outline:none;letter-spacing:1px;padding: 10px;font-size:16px}
        #search{position: absolute;top:0;width:77%;height:18px;left:9.5%;z-index: 10001}
        #search_img{width: 80%;z-index: 1000;border-radius: 20px;overflow: hidden;object-fit: cover;margin-top: 48px}
        #show_search{width: 100%;display: none;z-index: 1000;position:fixed;left:11%}
        #placeholder{font-size: 10px;margin-top: 10px}
    </style>
    <script>
        var list_height=new Array();//列高数据
        function randomNum(minNum,maxNum){//随机函数
            switch(arguments.length){
                case 1:
                    return parseInt(Math.random()*minNum+1,10);
                    break;
                case 2:
                    return parseInt(Math.random()*(maxNum-minNum+1)+minNum,10);
                    break;
                default:
                    return 0;
                    break;
            }
        }
        function get_like_number(id) {//获取点赞数
            var xml=new XMLHttpRequest();
            xml.open('post','php/get_like_number.php',false);
            xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xml.send('picture_id='+id);
            return xml.responseText;
        }
        function like_picture(id){//点赞
            var xml=new XMLHttpRequest();
            xml.open('post','php/like_picture.php',false);
            xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xml.send('picture_id='+id);
            var img_id_s=document.getElementById(id);
            img_id_s.src='img/like.png';
        }
        function get_outline_height(img_number) {//获取外边框高度
            var window_width = window.screen.width;
            var xml = new XMLHttpRequest();
            xml.open('get','php/get_outline_height.php?window_width='+window_width+'&img_number='+img_number,false);
            xml.send();
            return parseFloat(xml.responseText);
        }
        function add_a_picture() {//随机添加一张图片
            var list_width=(window.screen.width)*0.384+10;
            var new_list=new Array();
            var last_list_top='';
            var last_list_left='';
            var last_list_name=0;
            for(i=0;i<2;i++){
                var alist_height_1=list_height['list'+i];
                new_list[i]=alist_height_1[0];
            }
            new_list.sort(function (a,b){return a-b;});
            for (i=0;i<2;i++){
                if(new_list[0]===list_height['list'+i][0]){last_list_top=list_height['list'+i][0]+'px';last_list_left=list_width*i+'px';last_list_name=i}
            }
            var picture_number=randomNum(1,5895);
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
                    list_height['list0'][0]+=get_outline_height(picture_number)*2-10;
                    break;
                }
                case 1:{
                    list_height['list1'][0]+=get_outline_height(picture_number)*2-10;
                    break;
                }
            }
        }
        function add_picture() {//添加8张图片
            var list_width=(window.screen.width)*0.384+10;
            for(i=0;i<2;i++){
                var picture_number=randomNum(1,5895);
                var show=document.getElementById('show');
                var new_div=document.createElement('div');
                var img_url='thumbnail/'+picture_number+'.jpg';
                var inner_html='<a href="source/'+picture_number+'.jpg" target="_blank"><img alt="加载失败" src="'+img_url+'" class="picture"></a>\n' +
                    '        <div class="img_bottom">\''+
                    '            <img src="img/no_like.png" id="'+picture_number+'" onclick="like_picture('+picture_number+')"  class="like_img" alt="加载失败">'+
                    get_like_number(picture_number)+
                    '            <a class="data_img">id'+picture_number+'</a>\n' +
                    '        </div>';
                new_div.innerHTML=inner_html;
                new_div.className='outline';
                new_div.style.top='0px';
                new_div.style.left=i*list_width+'px';
                show.appendChild(new_div);
                switch (i) {
                    case 0:{
                        var new_arr=new Array();
                        new_arr[0]=get_outline_height(picture_number)*2-10;
                        list_height['list0']=new_arr;
                        break;
                    }
                    case 1:{
                        var new_arr=new Array();
                        new_arr[0]=get_outline_height(picture_number)*2-10;
                        list_height['list1']=new_arr;
                        break;
                    }
                }
            }
            for(x=0;x<8;x++){
                add_a_picture();
            }
        }
        function refresh(){//手动刷新
            add_a_picture();
            add_a_picture();
            add_a_picture();
            add_a_picture();
        }
        function search(id) {//查找
            var search_img=document.getElementById('search_img');
            search_img.src='http://192.168.1.5/source/'+id.value+'.jpg';
            var show_search=document.getElementById('show_search').style.display='block';
            search_img.style.display='block';
            document.getElementById('show').style.display='none';
            document.getElementById('refresh').style.display='none';
            document.getElementById('placeholder').innerText='\n'+
                '  提\n'+
                '  示\n'+
                '\n'+
                '  请\n'+
                '  点\n'+
                '  击\n'+
                '  图\n'+
                '  片\n'+
                '  返\n'+
                '  回';
        }
        function hide_search_img(){//隐藏查找的图片
            var search_img=document.getElementById('search_img').style.display='none';
            var show_search=document.getElementById('show_search').style.display='none';
            document.getElementById('show').style.display='block';
            document.getElementById('refresh').style.display='block';
            document.getElementById('placeholder').innerText='\n'+
                '  提\n'+
                '  示\n'+
                '\n' +
                '  点\n'+
                '  击\n'+
                '  图\n'+
                '  片\n'+
                '  查\n'+
                '  看\n'+
                '  原\n'+
                '  图';
        }
        window.onscroll = function (){//加载
            var marginBot = 0;
            if (document.documentElement.scrollTop){
                marginBot = document.documentElement.scrollHeight - (document.documentElement.scrollTop+document.body.scrollTop)-document.documentElement.clientHeight;
            } else {
                marginBot = document.body.scrollHeight - document.body.scrollTop- document.body.clientHeight;
            }
            if(marginBot<=100) {
                add_a_picture();
                add_a_picture();
                add_a_picture();
            }
        }
    </script>
</head>
<body>
<img src="img/like.png" style="display: none">
<div id="show">
</div>
<div id="menu">
        <pre id="placeholder">
  提
  示

  点
  击
  图
  片
  查
  看
  原
  图
        </pre>
    <a href="rank_pe.php" target="_blank"><img id="menu_img_1" src="img/ranking_list.png" alt="加载失败"/></a>
    <a href="bh3.html" target="_blank"><img id="menu_img_2" src="https://uploadstatic.mihoyo.com/bh3/upload/officialsites/201909/game-tion-2-logo_1568108157_3779.png" alt="加载失败"/></a>
</div>
<div id="search">
    <input type="text" onchange="search(this)" placeholder="请输入图片ID（数字） 下次搜索前请清空输入框" />
</div>
<div id="show_search">
    <img id="search_img" src="" alt="该图不存在，或加载失败，点击返回" onclick="hide_search_img()" />
</div>
<div onclick="refresh()" id="refresh">
    点我手动加载图片,如遇到卡住,请先上滑一些再滑动到底部。免责声明：本站所有图片均来源于网络收集整理，仅供学习交流，版权归原作者所有。本站将不承担任何法律责任，如果有侵犯到您的权利，请及时联系我们删除。
</div>
<script>
    window.onload=add_picture();
</script>
</body>
</html>
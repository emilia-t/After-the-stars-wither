<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.ico"/>
    <title>在星空枯萎之后</title>
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
        if(isPC){
            window.location.href = 'bh3_source.php' //跳转到电脑端首页面
        }
    </script>
    <style>
        /**/
        html body{padding: 0;margin: 0}
        /*table{table-layout:fixed;}*/
        table{border-spacing: 0px;table-layout:fixed;border-collapse: collapse;line-height: 20px;letter-spacing: 2px;margin:5px 0 2px 40px;float: left}
        th{font-size:16px;font-weight:bold;}
        td{font-size:16px;height:30px;}
        th,td{border: solid 1px black;text-align:center;}
        /**/
        .in{position:fixed;top:30px;left:20px}
        #night{color: white;background: black;position: fixed;top:120px;left:20px;border:0;}
        .tx{width:40px;height:40px;padding: 0;border-radius:40px;margin-top: 3px }
        .pcr{color: white;background: black;position: fixed;top:150px;left:20px;border:0;}
        /**/
        a{text-decoration:none}
        a:link {color: white}
        a:visited {color: white}
        a:hover {color: white}
        a:active {color: white}
        /*table_td*/
        .time_li{width: 112px}
        .left_title{position: fixed;left: 0;width: 40px;background: white;margin:0}
        .left_title_1{height: 100px}
        .left_title_2{height: 100px}
        .left_title_3{height: 100px}
        .left_title_4{height: 100px}
        .left_title_5{height: 100px}
        .left_title_6{height: 100px}
        .left_title_7{height: 60px}
        .left_title_8{height: 40px}
        /*menu*/
        #menu{width: 100%;height: 80px;position: fixed;z-index: 999}
        #menu_text{text-align: center;background: white}
        input, button {border: none;outline: none;}
        .tl-price-input{
            width: 100%;
            border: 1px solid #ccc;
            padding: 7px 0;
            background: #F4F4F7;
            border-radius: 3px;
            padding-left:5px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s}
        .tl-price-input:focus{
            border-color: #66afe9;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)
        }
        #menu_content{display: none;background: rgba(255, 255, 255, 0.51);text-align: center;width: 100%;height: 80px;position: fixed;z-index: 999}
        .ant-btn {height: 30px;line-height: 1.499;position: relative;display: inline-block;font-weight: 400;white-space: nowrap;text-align: center;background-image: none;border: 1px solid transparent;-webkit-box-shadow: 0 2px 0 rgba(0,0,0,0.015);box-shadow: 0 2px 0 rgba(0,0,0,0.015);cursor: pointer;-webkit-transition: all .3s cubic-bezier(.645, .045, .355, 1);transition: all .3s cubic-bezier(.645, .045, .355, 1);-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;-ms-touch-action: manipulation;touch-action: manipulation;padding: 0 15px;font-size: 14px;border-radius: 4px;color: rgba(0,0,0,0.65);background-color: #fff;border-color: #d9d9d9;}
        .ant-btn-red {color: #fff;background-color: #FF5A44;border-color: #FF5A44;text-shadow: 0 -1px 0 rgba(0,0,0,0.12);-webkit-box-shadow: 0 2px 0 rgba(0,0,0,0.045);box-shadow: 0 2px 0 rgba(0,0,0,0.045);}
        #close_menu{width: 30px;height: 30px;top:10px;right: 10px;position: fixed}
        #go_home{width: 32px;height: 32px;top:44px;right: 9px;position: fixed}
    </style>
</head>
<body>
<div id="menu">
    <div id="menu_text" >
        点击<span style="color: red">顶部</span>任意位置唤出<span style="color: red">菜单</span> 4 秒
    </div>
</div>
<div style="width: 100%;height: 26px;background:  rgba(71,129,255,0.21);text-align: center;position: fixed;top: 0">
    <img src="https://www.easyicon.net/api/resizeApi.php?id=1233029&amp;size=16" style="display: inline-block">
    <p style="color: #4058ff;display: inline-block;margin: 1px;border: 0;padding: 0">：.. .-.. --- ...- . -.-- --- ..-
    </p>
</div>
<div id="menu_content">
        <div style="width: 144px;float: left;position: fixed;top:8px;left: 2px"><input id="qq_number" class="tl-price-input" type="text" placeholder="请输入QQ号后点击查找"></div>
        <div style="width: 60px;float: left;position: fixed;top:8px;left: 156px"><button class="ant-btn ant-btn-red" onclick="find(document.getElementById('qq_number').value)">查找</button></div>
        <div style="width: 100px;float: left;position: fixed;top:42px;left: 2px"><a id="oder_a" href="?oder=time_asc"><button  id="oder_button" class="ant-btn ant-btn-red">按时间升序</button></a></div>
        <div  style="width: 100px;float: left;position: fixed;top:42px;left: 114px"><a href="?"><button class="ant-btn ant-btn-red">按默认排序</button></a></div>
        <a href="menu.php"><img id="go_home" src="img/bh3_sheet/go_home.png"></a>
        <img id="close_menu" src="img/bh3_sheet/close_button.png" />
</div>
<script>
    var menu_text=document.getElementById("menu_text");
    window.setTimeout("menu_text.style.display='none'",4000);
    window.setTimeout("menu_text.innerHTML='点击<span style=\"color: red\">顶部</span>任意位置唤出<span style=\"color: red\">菜单</span> 3 秒'",1000);
    window.setTimeout("menu_text.innerHTML='点击<span style=\"color: red\">顶部</span>任意位置唤出<span style=\"color: red\">菜单</span> 2 秒'",2000);
    window.setTimeout("menu_text.innerHTML='点击<span style=\"color: red\">顶部</span>任意位置唤出<span style=\"color: red\">菜单</span> 1 秒'",3000);
    var menu=document.getElementById("menu");
    var menu_content=document.getElementById("menu_content");
    menu.addEventListener('click',function () {
        if(menu_content.style.display==="none"){
            menu_content.style.display="block"
        }else{
            menu_content.style.display="none"
        }
    });
    var close_menu=document.getElementById("close_menu");
    close_menu.addEventListener('click',function () {
        menu_content.style.display="none"
    });
</script>
<table style="margin-top: 30px">
    <tbody>
    <tr>
        <td class="left_title left_title_1">
            头像
        </td>
            <?php
            require('php/10002.php');
            @$link=mysqli_connect($mysql_server_name,$mysql_user,$mysql_password,$db_name1);//连接数据库
            if (!$link) {die("错误1");}//连接失败则退出
            //检测有无设置排序规则
            if(isset($_GET['oder'])){
                switch ($_GET['oder']){
                    case 'time_asc':{
                        @$sql_s_0="SELECT*FROM bh3_data_sheet a WHERE a.insert_time !='2030-01-01 00:00:00' ORDER BY a.insert_time ASC";
                        echo"<script>document.getElementById('oder_a').setAttribute('href','?oder=time_des');document.getElementById('oder_button').innerText='按时间降序';</script>";
                        break;
                    }
                    case 'time_des':{
                        @$sql_s_0="SELECT*FROM bh3_data_sheet a WHERE a.insert_time !='2030-01-01 00:00:00' ORDER BY a.insert_time DESC";
                        echo"<script>document.getElementById('oder_a').setAttribute('href','?oder=time_asc');document.getElementById('oder_button').innerText='按时间升序';</script>";
                        break;
                    }
                    default:{
                        @$sql_s_0="SELECT * FROM bh3_data_sheet a ORDER BY a.serial_number";
                    }
                }
            }else{
                @$sql_s_0="SELECT * FROM bh3_data_sheet a ORDER BY a.serial_number";//获取全部数据
            }
            @$sql_c_0=mysqli_query($link,$sql_s_0);//获取数据资源
            if(mysqli_affected_rows($link)<=0){die("错误2");}//查询不到结果则退出
            $data=mysqli_fetch_all($sql_c_0,MYSQLI_NUM);//从结果集中取得所有行保存为关联数组
            $length=count($data);//数据条数
            mysqli_close($link);//关闭连接
            for($i=0;$i<floor($length/2);$i++){
            echo "<td id='{$data[$i][2]}'><img alt=\"加载失败\" class=\"tx\" src=\"http://q.qlogo.cn/g?b=qq&amp;nk={$data[$i][2]}&amp;s=640&amp;mType=friendlist\"></td>";
            }
            ?>
    </tr>
    <tr>
        <td class="left_title left_title_1">
            序号
        </td>
            <?php
            for($i=0;$i<floor($length/2);$i++){
                //$temp = (int)$data[$i][1] - 1;
                $insert_number=(int)$i+1;
                echo "<td id=\"$insert_number\">{$insert_number}</td>";
            }
            ?>
    </tr>
    <tr id="insert_time">
        <td class="left_title left_title_2">
            入时群间
        </td>
            <?php
            for($i=0;$i<floor($length/2);$i++){
                echo "<td><div class='time_li'>{$data[$i][0]}</div></td>";
            }
            ?>
    </tr>
    <tr>
        <td class="left_title left_title_3">
            QQ
        </td>
            <?php
            for($i=0;$i<floor($length/2);$i++){
                echo "<td>{$data[$i][2]}</td>";
            }
            ?>
    </tr>
    <tr>
        <td class="left_title left_title_4">
            群内昵称
        </td>
            <?php
            for($i=0;$i<floor($length/2);$i++){
                echo "<td>{$data[$i][3]}</td>";
            }
            ?>
    </tr>
    <tr>
        <td class="left_title left_title_5">
            UID
        </td>
            <?php
            for($i=0;$i<floor($length/2);$i++){
                echo "<td>{$data[$i][4]}</td>";
            }
            ?>
    </tr>
    <tr>
        <td class="left_title left_title_6">
            游戏昵称
        </td>
            <?php
            for($i=0;$i<floor($length/2);$i++){
                echo "<td>{$data[$i][5]}</td>";
            }
            ?>
    </tr>
    <tr>
        <td class="left_title left_title_7">
            惯称
        </td>
            <?php
            for($i=0;$i<floor($length/2);$i++){
                echo "<td>{$data[$i][6]}</td>";
            }
            ?>
    </tr>
    <tr>
        <td class="left_title left_title_8">
            备注
        </td>
            <?php
            for($i=0;$i<floor($length/2);$i++){
                echo "<td>{$data[$i][7]}</td>";
            }
            ?>
    </tr>
    </tbody
</table>
<table>
    <tbody>
    <tr>
        <td class="left_title left_title_1">
            头像
        </td>
        <?php
        for($i=$length-ceil($length/2);$i<$length;$i++){
            echo "<td id='{$data[$i][2]}'><img alt=\"加载失败\" class=\"tx\" src=\"http://q.qlogo.cn/g?b=qq&amp;nk={$data[$i][2]}&amp;s=640&amp;mType=friendlist\"></td>";
        }
        ?>
    </tr>
    <tr>
        <td class="left_title left_title_1">
            序号
        </td>
        <?php
        for($i=$length-ceil($length/2);$i<$length;$i++){
            //$temp = (int)$data[$i][1] - 1;
            $insert_number=(int)$i+1;
            echo "<td id=\"$insert_number\">{$insert_number}</td>";
        }
        ?>
    </tr>
    <tr id="insert_time">
        <td class="left_title left_title_2">
            入时群间
        </td>
        <?php
        for($i=$length-ceil($length/2);$i<$length;$i++){
            echo "<td><div class='time_li'>{$data[$i][0]}</div></td>";
        }
        ?>
    </tr>
    <tr>
        <td class="left_title left_title_3">
            QQ
        </td>
        <?php
        for($i=$length-ceil($length/2);$i<$length;$i++){
            echo "<td>{$data[$i][2]}</td>";
        }
        ?>
    </tr>
    <tr>
        <td class="left_title left_title_4">
            群内昵称
        </td>
        <?php
        for($i=$length-ceil($length/2);$i<$length;$i++){
            echo "<td>{$data[$i][3]}</td>";
        }
        ?>
    </tr>
    <tr>
        <td class="left_title left_title_5">
            UID
        </td>
        <?php
        for($i=$length-ceil($length/2);$i<$length;$i++){
            echo "<td>{$data[$i][4]}</td>";
        }
        ?>
    </tr>
    <tr>
        <td class="left_title left_title_6">
            游戏昵称
        </td>
        <?php
        for($i=$length-ceil($length/2);$i<$length;$i++){
            echo "<td>{$data[$i][5]}</td>";
        }
        ?>
    </tr>
    <tr>
        <td class="left_title left_title_7">
            惯称
        </td>
        <?php
        for($i=$length-ceil($length/2);$i<$length;$i++){
            echo "<td>{$data[$i][6]}</td>";
        }
        ?>
    </tr>
    <tr>
        <td class="left_title left_title_8">
            备注
        </td>
        <?php
        for($i=$length-ceil($length/2);$i<$length;$i++){
            echo "<td>{$data[$i][7]}</td>";
        }
        ?>
    </tr>
    </tbody
</table>
<script>
    var x=1;
    function night(){
        if(x%=2){
            document.body.style="background:#3f3f3f;color:white";
            document.getElementById("night").style.background="red";
            document.getElementById("night").innerText="瞎眼♀模式";
            x++;
        }else{
            document.body.style="background:white;color:block";
            document.getElementById("night").style.background="black";
            document.getElementById("night").innerText="暗黑♂模式";
            x++;
        }
    }
    function find(values){
        if(document.getElementById(values)){
            let node=document.getElementById(values);
            let num=node.cellIndex;
            let table=node.parentElement.parentElement;
            alert("序号："+table.children[1].children[num].innerText+"\n入群时间："+table.children[2].children[num].innerText+"QQ："+table.children[3].children[num].innerText+"\n群内昵称："+table.children[4].children[num].innerText+"\nUID："+table.children[5].children[num].innerText+"\n游戏昵称："+table.children[6].children[num].innerText+"\n惯称："+table.children[7].children[num].innerText+"\n备注："+table.children[8].children[num].innerText);
            console.log();
        }else{
            alert("无法找到："+values)
        }
    }
</script>
</body>
</html>

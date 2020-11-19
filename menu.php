<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="description" content="ATSW在星空枯萎之后，是一个查询ATSW成员资料信息的官方网站，任何游戏中，若您看到这个标志，也就意味着您可以在此站查询该玩家的资料。">
	<meta name="keywords" content="ATSW,atsw,临冉,在星空枯萎之后,玩家资料收集,qq查询">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.ico">
    <title>在星空枯萎之后-大厅</title>
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
            window.location.href = 'menu_pe.php' //跳转到手机端页面
        }
    </script>
    <script src="js/vue.js"></script>
	<script src="js/config_1.js"></script>
    <script src="js/diary_data_v_1.js"></script>
    <style>
        /*PE*/
        a:link{text-decoration: none;color: #ff979b}
        a:visited{text-decoration: none;color: #ff979b}
        a:hover{text-decoration: none;color: #ff5f67}
        a:active{text-decoration: none;color: #ff979b}
        html,body{width: 100%;height: 100%;margin: 0;padding: 0}
        body{}
        .menu_p{margin: 4px 0}
        .menu{width: 100%;min-height: 110px;display: flex;flex-direction: row;flex-wrap: wrap;justify-content:center}
        .card{width: 60px;height: 60px;background:#fff5fa;margin: 10px  28px;text-align: center;border-radius: 5px}
        .menu_img{width: 60px;height: 60px;object-fit: cover;border-radius: 5px;box-shadow: 4px 4px 4px #ceb0b5;transition: 0.2s}
        .menu_img:hover{box-shadow: 6px 6px 6px #ceb0b5}
        /*搜索层*/
        #search{width:100%;height:30px;display: flex;justify-content: center;margin: 10px 0 10px 0}
        #input_text{width: 48%;height:100%;margin: 0;padding: 0;border:#FFC6D0 solid;border-radius: 20px;background: #ffa6ca;color: white;outline: none}
        /*星星下落*/
        #special_effects_layer{}
        .stars{z-index: -10}
        /*日志*/
        .outline{width:100%;background: rgba(254, 246, 255, 0.51);border: 1px #ff97ab solid;border-radius: 5px;margin: 10px 0 10px 0;transition:0.3s;}
        .outline:hover{margin-top: 6px;width: 100%;margin-bottom:4px;border:2px solid #ff9095;box-shadow:13px 13px 20px #fab5ba;background: #ffffff}
        .hover{margin-top: 6px;width: 82.5%;margin-bottom:4px;border:2px solid #ff9095;box-shadow:13px 13px 20px #fab5ba;background: #ffffff}
        .img_div{width: inherit;text-align: center;}
        .img{max-height: 700px;border-radius: 5px;max-width: 90%}
        .date{text-align: center;line-height: 20px;font-size: 20px;margin: 10px 0 0 0}
        .text{text-indent:2em;font-size: 16px;margin: 0 6px 6px 6px;}
        /*资讯层*/
        #news_layer{width: 100%;display: flex;justify-content: center;flex-wrap: wrap;}
        .new_p{width: 50%;height: 60px;background: rgba(254, 246, 255, 0.51);border: 1px #ff97ab solid;border-radius: 5px;margin: 10px 0 10px 0;font-size: 14px}
        .new_log{width: 50%;}
        .new_head{width: 50%;height: 24px;background: rgba(254, 246, 255, 0.51);border: 1px #ff97ab solid;border-radius: 5px;margin: 10px 0 10px 0}
        .head_img{width: 50px;height:50px;margin: 5px;border-radius: 5px;float: left}
        /*悬浮按钮层*/
        #img_float{width: 30px;height: 30px;border-radius: 15px;position: fixed;top: 40%;right: 5px;border:1px solid white;transition: 0.4s}
        /*底部*/
        #foot{text-align: center;}
        /*动画*/
        @keyframes star_die {from{opacity:1;}to{opacity:0;}}
        @keyframes blur {from{-webkit-filter: blur(1px);filter: blur(1px)} to{-webkit-filter: blur(6px);filter: blur(6px)}}
    </style>
</head>
<body>
<!--特效层-->
<img src="img/stars1.png" style="display: none" alt="星">
<div id="blur" style="animation: blur 1s linear;transition: 1s;background: url('img/zxkkwzh_log.png') no-repeat center;width: 100%;height: 100px;position: absolute;top: 330px;left: 0;z-index: -20;-webkit-filter: blur(6px);filter: blur(6px)"></div>
<div id="special_effects_layer">
</div>
<!--搜索层-->
<div id="search">
    <input title="" placeholder="按QQ输入QQ号 | 按UID输入UID并加上前缀uid" type="text" name="word" id="input_text"
           onfocus="this.style.border='#FF8C93 solid';document.getElementById('blur').style.filter='blur(1px)';document.getElementById('blur').style.webkitFilter='blur(1px)'"
           onblur="this.style.border='#FFC6D0 solid';document.getElementById('blur').style.filter='blur(6)';document.getElementById('blur').style.webkitFilter='blur(6px)'">
    <img alt="搜索" style="width: 36px;height:36px;background-repeat:no-repeat;" src="img/sousuo.png" onclick="find_qq(document.getElementById('input_text').value)">
</div>
    <!--右侧悬浮按钮层-->
    <img src="http://q.qlogo.cn/g?b=qq&nk=1077365277&s=640&mType=friendlist" id="img_float"/>
    <!--菜单层-->
    <div class="menu">
        <div class="card">
            <a href="bh3.html" target="_self">
                <img alt="加载失败" id="img2" class="menu_img" src="">
                <p class="menu_p">崩坏三</p>
            </a>
        </div>
        <div class="card">
            <a href="ys.html" target="_self">
                <img alt="加载失败" id="img4" class="menu_img" src="img/sheet.png">
                <p class="menu_p">原神</p>
            </a>
        </div>
        <div class="card">
            <a href="pcr.html" target="_self">
                <img alt="加载失败" id="img3" class="menu_img" src="img/sheet.png">
                <p class="menu_p">PCR</p>
            </a>
        </div>
        <div class="card">
            <a href="index.php" target="_self">
                <img alt="加载失败" id="img1" class="menu_img" src="">
                <p class="menu_p">看涩兔</p>
            </a>
        </div>
        <div class="card">
            <a href="diary.html"  target="_self">
                <img alt="加载失败" class="menu_img" src="img/dairy.png">
                <p class="menu_p">日志</p>
            </a>
        </div>
        <div class="card">
            <a href="about.html"  target="_self">
                <img alt="加载失败" class="menu_img" src="img/about.png">
                <p class="menu_p">关于</p>
            </a>
        </div>
    </div>
    <!--资讯层-->
    <div id="news_layer">
        <div class="new_head" id="search_error" style="display: none">
            <b>&nbsp;未查询到任何信息</b>
        </div>
        <div class="new_head" id="search_content" style="display: none">
            <b>&nbsp;查询到以下信息：</b>
        </div>
        <div class="new_p" style="display: none" id="bh3_search">
            <img src="" class="head_img" id="bh3_search_img">
            <div id="bh3_search_div">
            </div>
        </div>
        <div class="new_p" style="display: none" id="pcr_search">
            <img src="" class="head_img" id="pcr_search_img">
            <div id="pcr_search_div">
            </div>
        </div>
        <div class="new_p" style="display: none" id="ys_search">
            <img src="" class="head_img" id="ys_search_img">
            <div id="ys_search_div">
            </div>
        </div>
        <div class="new_head">
            <b>&nbsp;资料表新增数据：</b>
        </div>
        <div class="new_bh3 new_p">
            <img :src="'http://q.qlogo.cn/g?b=qq&nk='+datas[0].bh3_qq_id+'&s=640&mType=friendlist'" class="head_img">
            <div>
                Nick-name : {{datas[0].bh3_group_nickname}}
                <br>
                GameType : BH3
                <br>
                UID : {{datas[0].bh3_game_id}}&nbsp;&nbsp;QQ : {{datas[0].bh3_qq_id}}
            </div>
        </div>
        <div class="new_bh3 new_p">
            <img :src="'http://q.qlogo.cn/g?b=qq&nk='+datas[0].pcr_qq_id+'&s=640&mType=friendlist'" class="head_img">
            <div>
                Nick-name : {{datas[0].pcr_group_nickname}}
                <br>
                GameType : PCR
                <br>
                UID : {{datas[0].pcr_game_id}}&nbsp;&nbsp;QQ : {{datas[0].pcr_qq_id}}
            </div>
        </div>
        <div class="new_bh3 new_p">
            <img :src="'http://q.qlogo.cn/g?b=qq&nk='+datas[0].ys_qq_id+'&s=640&mType=friendlist'" class="head_img">
            <div>
                Nick-name : {{datas[0].ys_group_nickname}}
                <br>
                GameType : 原神
                <br>
                UID : {{datas[0].ys_game_id}}&nbsp;&nbsp;QQ : {{datas[0].ys_qq_id}}
            </div>
        </div>
        <!--新的日志-->
        <div class="new_head">
            <b>&nbsp;日志新增数据：</b>
        </div>
        <div class="new_log" id="flex" draggable="false">
            <div class="outline" id="outline" v-for="(diary,i) in list" v-if="i===list.length - 1"><!--单个日志-->
                <div class="date"><!--时间及类型-->
                    {{diary.time.year}}年{{diary.time.month}}月{{diary.time.day}}日{{diary.time.hours}}时{{diary.time.minute}}分({{diary.type}})
                </div>
                <div class="content" v-for="(diary_content,c) in diary.content"><!--内容---->
                    <div class="text" v-if="create_text(diary_content[1])">
                        <p v-html="diary_content[0]"></p>
                    </div>
                    <div class="img_div" v-if="create_img(diary_content[1])">
                        <img draggable="false" class="img" :src="diary_content[0]">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--底部-->
    <div id="foot">
        <p>在星空枯萎之后@2020 | 临冉 | QQ : 1658548955</p>
    </div>
    <script>
        /*按钮层*/
        var img_float=document.getElementById('img_float');
        img_float.addEventListener('click',function () {
            if(this.style.border==='1px solid white'){
                this.style.border='1px solid #FF5B67';
            }else {
                this.style.border='1px solid white';
            }
        });
        /*控制层-日志*/
        let diary=new Vue({
            el:'#flex',
            data:diary_data,
            methods:{
                /*创建一个text的节点*/
                create_text:function(type){
                    if(type==='text'){
                        return true
                    }
                },
                /*创建一个img的节点*/
                create_img:function(type){
                    if(type==='img'){
                        return true
                    }
                }
            }
        });
        //判断是否为数组
        function isArray(arr){
            return Object.prototype.toString.call(arr)== '[object Array]';
        }
        //查找QQ
        /*控制层-查找*/
        function find_qq(qq) {
            if(qq.substr(0,3)==='UID' || qq.substr(0,3)==='uid'){
                qq=qq.substr(3);
                let is_exist=false;
                let new_ajax=new XMLHttpRequest();
                new_ajax.open('GET','http://'+server_address+'/php/api/public/int_mysql_get_data_sheet.php?game_name=bh3&search_uid='+qq);
                new_ajax.send();
                new_ajax.onreadystatechange=function () {
                    if(new_ajax.readyState===4 && new_ajax.status===200){
                        let data=(eval(new_ajax.responseText));
                        if(data!==undefined){
                            //显示查询结果层
                            is_exist=true;
                            if(document.getElementById('bh3_search').style.display==='none'){document.getElementById('bh3_search').style.display='block'}
                            document.getElementById('bh3_search_img').src='http://q.qlogo.cn/g?b=qq&nk='+data[0][2]+'&s=640&mType=friendlist';
                            document.getElementById('bh3_search_div').innerHTML="" +
                                "Nick-name : "+data[0][3]+"\n" +
                                "            <br>\n" +
                                "            GameType : BH3\n" +
                                "            <br>\n" +
                                "            UID : "+data[0][4]+"&nbsp;&nbsp;QQ : "+data[0][2];
                        }else {//显示查询无果层
                            if(document.getElementById('bh3_search').style.display==='block'){document.getElementById('bh3_search').style.display='none'}
                            document.getElementById('bh3_search_img').src='';
                            document.getElementById('bh3_search_div').innerHTML="";
                        }
                    }
                };
                let new_ajax2=new XMLHttpRequest();
                new_ajax2.open('GET','http://'+server_address+'/php/api/public/int_mysql_get_data_sheet.php?game_name=pcr&search_uid='+qq);
                new_ajax2.send();
                new_ajax2.onreadystatechange=function () {
                    if(new_ajax2.readyState===4 && new_ajax2.status===200){
                        let data=(eval(new_ajax2.responseText));
                        if(data!==undefined){
                            //显示查询结果层
                            is_exist=true;
                            if(document.getElementById('pcr_search').style.display==='none'){document.getElementById('pcr_search').style.display='block'}
                            document.getElementById('pcr_search_img').src='http://q.qlogo.cn/g?b=qq&nk='+data[0][2]+'&s=640&mType=friendlist';
                            document.getElementById('pcr_search_div').innerHTML="" +
                                "Nick-name : "+data[0][3]+"\n" +
                                "            <br>\n" +
                                "            GameType : PCR\n" +
                                "            <br>\n" +
                                "            UID : "+data[0][4]+"&nbsp;&nbsp;QQ : "+data[0][2];
                        }else {//显示查询无果层
                            if(document.getElementById('pcr_search').style.display==='block'){document.getElementById('pcr_search').style.display='none'}
                            document.getElementById('pcr_search_img').src='';
                            document.getElementById('pcr_search_div').innerHTML="";
                        }
                    }
                };
                let new_ajax3=new XMLHttpRequest();
                new_ajax3.open('GET','http://'+server_address+'/php/api/public/int_mysql_get_data_sheet.php?game_name=ys&search_uid='+qq);
                new_ajax3.send();
                new_ajax3.onreadystatechange=function () {
                    if(new_ajax3.readyState===4 && new_ajax3.status===200){
                        let data=(eval(new_ajax3.responseText));
                        if(data!==undefined){
                            //显示查询结果层
                            is_exist=true;
                            if(document.getElementById('ys_search').style.display==='none'){document.getElementById('ys_search').style.display='block'}
                            document.getElementById('ys_search_img').src='http://q.qlogo.cn/g?b=qq&nk='+data[0][2]+'&s=640&mType=friendlist';
                            document.getElementById('ys_search_div').innerHTML="" +
                                "Nick-name : "+data[0][3]+"\n" +
                                "            <br>\n" +
                                "            GameType : 原神\n" +
                                "            <br>\n" +
                                "            UID : "+data[0][4]+"&nbsp;&nbsp;QQ : "+data[0][2];
                        }else {//显示查询无果层
                            if(document.getElementById('ys_search').style.display==='block'){document.getElementById('ys_search').style.display='none'}
                            document.getElementById('ys_search_img').src='';
                            document.getElementById('ys_search_div').innerHTML="";
                        }
                    }
                    setTimeout(function () {
                        if(is_exist){
                            document.getElementById('search_content').style.display='block';
                            document.getElementById('search_error').style.display='none'
                        }else {
                            document.getElementById('search_content').style.display='none';
                            document.getElementById('search_error').style.display='block'
                        }
                    },100)
                };
            }else {
                let is_exist=false;
                let new_ajax=new XMLHttpRequest();
                new_ajax.open('GET','http://'+server_address+'/php/api/public/int_mysql_get_data_sheet.php?game_name=bh3&search_qq='+qq);
                new_ajax.send();
                new_ajax.onreadystatechange=function () {
                    if(new_ajax.readyState===4 && new_ajax.status===200){
                        let data=(eval(new_ajax.responseText));
                        if(data!==undefined){
                            //显示查询结果层
                            is_exist=true;
                            if(document.getElementById('bh3_search').style.display==='none'){document.getElementById('bh3_search').style.display='block'}
                            document.getElementById('bh3_search_img').src='http://q.qlogo.cn/g?b=qq&nk='+data[0][2]+'&s=640&mType=friendlist';
                            document.getElementById('bh3_search_div').innerHTML="" +
                                "Nick-name : "+data[0][3]+"\n" +
                                "            <br>\n" +
                                "            GameType : BH3\n" +
                                "            <br>\n" +
                                "            UID : "+data[0][4]+"&nbsp;&nbsp;QQ : "+data[0][2];
                        }else {//显示查询无果层
                            if(document.getElementById('bh3_search').style.display==='block'){document.getElementById('bh3_search').style.display='none'}
                            document.getElementById('bh3_search_img').src='';
                            document.getElementById('bh3_search_div').innerHTML="";
                        }
                    }
                };
                let new_ajax2=new XMLHttpRequest();
                new_ajax2.open('GET','http://'+server_address+'/php/api/public/int_mysql_get_data_sheet.php?game_name=pcr&search_qq='+qq);
                new_ajax2.send();
                new_ajax2.onreadystatechange=function () {
                    if(new_ajax2.readyState===4 && new_ajax2.status===200){
                        let data=(eval(new_ajax2.responseText));
                        if(data!==undefined){
                            //显示查询结果层
                            is_exist=true;
                            if(document.getElementById('pcr_search').style.display==='none'){document.getElementById('pcr_search').style.display='block'}
                            document.getElementById('pcr_search_img').src='http://q.qlogo.cn/g?b=qq&nk='+data[0][2]+'&s=640&mType=friendlist';
                            document.getElementById('pcr_search_div').innerHTML="" +
                                "Nick-name : "+data[0][3]+"\n" +
                                "            <br>\n" +
                                "            GameType : PCR\n" +
                                "            <br>\n" +
                                "            UID : "+data[0][4]+"&nbsp;&nbsp;QQ : "+data[0][2];
                        }else {//显示查询无果层
                            if(document.getElementById('pcr_search').style.display==='block'){document.getElementById('pcr_search').style.display='none'}
                            document.getElementById('pcr_search_img').src='';
                            document.getElementById('pcr_search_div').innerHTML="";
                        }
                    }
                };
                let new_ajax3=new XMLHttpRequest();
                new_ajax3.open('GET','http://'+server_address+'/php/api/public/int_mysql_get_data_sheet.php?game_name=ys&search_qq='+qq);
                new_ajax3.send();
                new_ajax3.onreadystatechange=function () {
                    if(new_ajax3.readyState===4 && new_ajax3.status===200){
                        let data=(eval(new_ajax3.responseText));
                        if(data!==undefined){
                            //显示查询结果层
                            is_exist=true;
                            if(document.getElementById('ys_search').style.display==='none'){document.getElementById('ys_search').style.display='block'}
                            document.getElementById('ys_search_img').src='http://q.qlogo.cn/g?b=qq&nk='+data[0][2]+'&s=640&mType=friendlist';
                            document.getElementById('ys_search_div').innerHTML="" +
                                "Nick-name : "+data[0][3]+"\n" +
                                "            <br>\n" +
                                "            GameType : 原神\n" +
                                "            <br>\n" +
                                "            UID : "+data[0][4]+"&nbsp;&nbsp;QQ : "+data[0][2];
                        }else {//显示查询无果层
                            if(document.getElementById('ys_search').style.display==='block'){document.getElementById('ys_search').style.display='none'}
                            document.getElementById('ys_search_img').src='';
                            document.getElementById('ys_search_div').innerHTML="";
                        }
                    }
                    setTimeout(function () {
                        if(is_exist){
                            document.getElementById('search_content').style.display='block';
                            document.getElementById('search_error').style.display='none'
                        }else {
                            document.getElementById('search_content').style.display='none';
                            document.getElementById('search_error').style.display='block'
                        }
                    },100)
                };
            }
        }
        //资讯层
        var datas=[];
        var news=new Vue({
            el:'#news_layer',
            data:{datas:[
                    {bh3_game_id: "加载中"},
                    {bh3_group_nickname: "加载中"},
                    {bh3_qq_id: "1077365277"},
                    {pcr_game_id: "加载中"},
                    {pcr_group_nickname: "加载中"},
                    {pcr_qq_id: "1077365277"},
                    {ys_game_id: "加载中"},
                    {ys_group_nickname: "加载中"},
                    {ys_qq_id: "1077365277"},
                ]}
        });
        //获取最新成员信息
        function get_new_player() {
            let new_ajax=new XMLHttpRequest();
            new_ajax.open('GET','http://'+server_address+'/php/api/public/int_mysql_select_new_data.php?sheet_name=all',true);
            new_ajax.send();
            new_ajax.onreadystatechange=function (){
                if(new_ajax.readyState===4 && new_ajax.status===200){
                    news.datas=datas=eval(new_ajax.responseText)
                }
            }
        }
        get_new_player();
        //星星动画
        /*特效层*/
        var star_disappear_time=1;//设定星星逐渐消失的时间秒
        var star_life_cycle_max=8;//设定星星的生命周期最大值秒
        var star_life_cycle_min=2;//设定星星的生命周期最小值秒
        var stars_id=1;
        var window_width=window.innerWidth * 2.2;//设定顶部的left最大值
        var special_effects_layer=document.getElementById('special_effects_layer');
        function creat_stars() {
            var new_img=document.createElement('img');
            new_img.src='img/stars1.png';
            new_img.style.width='20px';
            new_img.style.height='20px';
            new_img.style.position='fixed';
            //设置初始位置(random,-30px)
            var left=randomNum(40,window_width);
            var top=-30;
            new_img.style.left=left+'px';
            new_img.style.top=top+'px';
            new_img.className='stars';
            new_img.id=''+stars_id;
            special_effects_layer.appendChild(new_img);//添加星星
            stars_move(document.getElementById(""+stars_id),randomNum(star_life_cycle_min*100,star_life_cycle_max*800));//移动星星，设置在多少秒内消失，给予初始位置
            stars_id++;
        }
        //随机函数
        function randomNum(minNum,maxNum){
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
        //移动星星
        function stars_move(el,time) {
            //不断移动星星
            for(let x=0;x<=time;x++){
                setTimeout(function () {
                    el.style.left=(parseInt(el.style.left)-5)+'px';
                    el.style.top=(parseInt(el.style.top)+5)+'px'
                },20*x);
            }
            //设定逐渐消失
            setTimeout(function () {
                try {
                    el.style.animation='star_die '+star_disappear_time+'s forwards ';
                }catch (e) {
                    el.style.webkitAnimation='star_die '+star_disappear_time+'s forwards ';
                }
            },time-(star_disappear_time*1000));
            //定时删除星星
            setTimeout(function () {
                try{el.parentNode.removeChild(el);}catch (e) {
                    console.log('删除错误:'+e);
                }
            },time);
        }
        setInterval('creat_stars()',2500);
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
        var number=randomNum(1,6200);
        var img1=document.getElementById('img1');
        img1.src='http://'+server_address+'/thumbnail/'+number+'.jpg';
        var everybody=[2120420179,848490694,3539438185,1272602352,2774767237,1612675488,1365264810,2843599260,2647910435,1753492785,2081618670,2081618670,805258120,1348479725,1961706345,1658548955,2795732614,848688381,824822765,3361577961,997509742,2192680130,2496779165,2746853534,811592290,162295994,1269317054,1763844244,2964607609,961060863,1369392718,857626943,1581182597,1743939852,3103945871,575716004,1152070902,2987594236,2393493189,1804294850,791015206,1304676898,1753563708,1763123826,1554382747,2532565023,2540965410,3225128687,1786802842,2926301302,1559244914,3536860773,1301071923,335446283,714934085];
        var qq=randomNum(1,everybody.length-1);
        var img2=document.getElementById('img2');
        img2.src='http://q.qlogo.cn/g?b=qq&nk='+everybody[qq]+'&s=640&mType=friendlist';
        var pcr_everybody=[1658548955,811592290,979835838,1348479725,2964607609,2746853534,1961706345,1418129774,568869676,2821845085,2924319834,2339711851];
        var qq2=randomNum(1,pcr_everybody.length-1);
        img3=document.getElementById('img3');
        img3.src='http://q.qlogo.cn/g?b=qq&nk='+pcr_everybody[qq2]+'&s=640&mType=friendlist';
        var ys_everybody=[1658548955,979835838,1961706345,1369392718,2339711851,2604239337,2924319834,2994792337,335446283,162295994,1348479725,1554382747,1763123826,2647910435];
        var qq3=randomNum(1,ys_everybody.length-1);
        img4=document.getElementById('img4');
        img4.src='http://q.qlogo.cn/g?b=qq&nk='+ys_everybody[qq3]+'&s=640&mType=friendlist';
    </script>
</body>
</html>
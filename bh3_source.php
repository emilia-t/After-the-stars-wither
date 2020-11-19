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
        if(!isPC){
            window.location.href = 'bh3_source_pe.php' //跳转到电脑端首页面
        }
    </script>
  <style>
    /*table{table-layout:fixed;}*/
    tr:hover{background: #e2efff;color: #ff3845;}
    th{font-size:16px;font-weight:bold;}
    td{font-size:16px;height:40px;}
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
  </style>
</head>
<body>
<div style="width: 100%;height: 26px;background: rgba(71,129,255,0.21);text-align: center">
    <img src="https://www.easyicon.net/api/resizeApi.php?id=1233029&size=16" style="display: inline-block"/>
    <p style="color: #4058ff;display: inline-block;margin: 1px;border: 0;padding: 0">：.. .-.. --- ...- . -.-- --- ..-
    </p>
</div>
<div class="buttons">
<button onclick="night()" id="night">暗黑♂模式</button>
<button onclick="" id="pcr" class="pcr"><a href="pcr.html">公主连结资料</a></button>
</div>
<div>
<p class="in">输入QQ号进行查找<br>完成后点击空白处<br>
  <input type="text" onchange="find(this)" placeholder="下次查找时清空输入框" id="input_1"/>
</p>
</div>
<div><!--难道这就是你分手的借口~~--><!--获得成就:没事看看源代码--><!--本页面由临冉制作-->
  <div class="data">
    <table id="table" border="0" cellpadding="0" cellspacing="0" align="center">
      <tbody id="tbody">
	  <tr>
		<td colspan="1"><a href="?"><button>按插入顺序排序</button></a></td>
        <td colspan="8" style="text-align:left">&nbsp;更新时间:2020年10月3日&nbsp;欢迎补充与指正&nbsp;<span style="color:red;">群昵称与游戏昵称映射表</span></td>
      </tr>
      <tr>
          <td style="width: 80px"><a id="oder_a" href="?oder=time_asc"><button id="oder_button">按入群时间升序</button></a></td>
          <td style="width: 40px"></td>
          <td style="width: 40px"></td>
          <td style="width: 80px"></td>
          <td style="width: 120px"></td>
          <td style="width: 100px"></td>
          <td style="width: 100px"></td>
          <td style="width: 100px"></td>
          <td style="width: 110px"></td>
      </tr>
      <tr>
          <td>入群时间</td>
          <td>序号</td>
          <td>头像</td>
          <td>QQ号</td>
          <td>群昵称</td>
          <td>游戏id</td>
          <td>游戏昵称</td>
          <td>惯称或者别称</td>
          <td>其他信息</td>
      </tr>
      <?php
      require('php/10002.php');
      @$link=mysqli_connect($mysql_server_name,$mysql_user,$mysql_password,$db_name1);//连接数据库
      if (!$link) {die("错误1");}//连接失败则退出
      if(isset($_GET['oder'])){
          switch ($_GET['oder']){
              case 'time_asc':{
                  @$sql_s_0="SELECT*FROM bh3_data_sheet a WHERE a.insert_time !='2030-01-01 00:00:00' ORDER BY a.insert_time ASC";
                  echo"<script>document.getElementById('oder_a').setAttribute('href','?oder=time_des');document.getElementById('oder_button').innerText='按入群时间降序';</script>";
                  break;
              }
              case 'time_des':{
                  @$sql_s_0="SELECT*FROM bh3_data_sheet a WHERE a.insert_time !='2030-01-01 00:00:00' ORDER BY a.insert_time DESC";
                  echo"<script>document.getElementById('oder_a').setAttribute('href','?oder=time_asc');document.getElementById('oder_button').innerText='按入群时间升序';</script>";
                  break;
              }
              default:{
                  @$sql_s_0="SELECT * FROM bh3_data_sheet a ORDER BY a.serial_number";
              }
          }
      }else{
          @$sql_s_0="SELECT * FROM bh3_data_sheet a ORDER BY a.serial_number";//获取全部数据
      }
      @$sql_c_0=mysqli_query($link,$sql_s_0);
      if(mysqli_affected_rows($link)<=0){die("错误2");}//查询不到结果则退出
      $data=mysqli_fetch_all($sql_c_0,MYSQLI_NUM);
      $length=count($data);
      for($i=0;$i<$length;$i++){
          $insert_number=(int)$i+1;
          echo "
       <tr id=\"{$data[$i][2]}\">
       <td>{$data[$i][0]}</td>
       <td id=\"{$insert_number}\">$insert_number</td>
       <td><img alt=\"加载失败\" class=\"tx\" src=\"http://q.qlogo.cn/g?b=qq&nk={$data[$i][2]}&s=640&mType=friendlist\"/></td>
       <td>{$data[$i][2]}</td>
       <td>{$data[$i][3]}</td>
       <td>{$data[$i][4]}</td>
       <td>{$data[$i][5]}</td>
       <td>{$data[$i][6]}</td>
       <td>{$data[$i][7]}</td>
     </tr>";
      }
      mysqli_close($link);
?>
      <tr>
        <td  colspan="9"><span style="color:#dd2033">请注意！信息来自各位群员自主告知或本人透露(如游戏截图)，真实性自行斟酌，希望各位切勿冒充他人，更不得冒充他人发表不当言论！ </span></td>
      </tr>
	  </tbody>
    </table>
  </div>
</div>
<script>
var x=1;
var oder=1;
/*reverse_order已弃用*/
function reverse_order(num) {
    var i=num;
    if(oder%2===0){
      for(i ; i !== -1; i --){
        var tbody=document.getElementById("tbody");
        var id=document.getElementById(i);
        var qq=id.parentNode.id;
        var tr=document.getElementById(qq);
        var new_tr=document.createElement("tr");
        new_tr.id=qq;
        new_tr.innerHTML=tr.innerHTML;
        tr.parentNode.removeChild(tr);
        tbody.insertBefore(new_tr,tbody.childNodes[6]);//修改此项可以改变插入的位置
      }
      oder++;
    }else{
      for(x=0;x<=num;x++){
        var tbody=document.getElementById("tbody");
        var id=document.getElementById(x);
        var qq=id.parentNode.id;
        var tr=document.getElementById(qq);
        var new_tr=document.createElement("tr");
        new_tr.id=qq;
        new_tr.innerHTML=tr.innerHTML;
        tr.parentNode.removeChild(tr);
        tbody.insertBefore(new_tr,tbody.childNodes[6]);
      }
      oder++;
    }
  }
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
    let qq=values.value;
    if(document.getElementById(qq)){
        let text=document.getElementById(qq);
        console.log(text);
        alert("序号："+text.children[1].innerText+"\n入群时间："+text.children[0].innerText+"\nQQ："+text.children[3].innerText+"\n群昵称："+text.children[4].innerText+"\nUID："+text.children[5].innerText+"\n游戏昵称："+text.children[6].innerText+"\n惯称："+text.children[7].innerText+"\n备注："+text.children[8].innerText)
    }else{
        alert("无法找到："+qq)
    }
}
</script>
</body>
</html>

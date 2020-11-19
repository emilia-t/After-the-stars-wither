<?php
/*严格模式:任何传入值不是按规定的传值则直接退出程序*/
if(!isset($_GET['game_name'])){exit();}//如果没有传入必要参数直接退出
$game_name=['bh3','pcr','ys'];//规定游戏名称
$oder_by=['time_asc','time_des','serial_asc','serial_des'];//规定排序方式
//设置查询表游戏名
if(!in_array($_GET['game_name'],$game_name)){
    exit();//仅接收崩坏三和pcr的查询
}else{
    $game=$_GET['game_name'];
}
//设置查询时排序方式
if(isset($_GET['oder_by'])){
    if(!in_array($_GET['oder_by'],$oder_by)){
        exit();//仅接受按时间和按序号排序
    }else{
        $oder=$_GET['oder_by'];
    }
}else{
    $oder='serial_number ASC';//默认按序号升序
}
//设置查找的UID号
if(isset($_GET['search_uid'])){
    if(preg_match('/^[1-9][0-9]*$/',$_GET['search_uid'])){
        $search="game_id={$_GET['search_uid']}";
    }else{
        exit();//传入的值不是UID号直接退出
    }
}
//设置查找的qq号或UID（优先QQ号，若传入了QQ和UID则只考虑QQ）
elseif(isset($_GET['search_qq'])){
    if(preg_match('/^[1-9][0-9]*$/',$_GET['search_qq'])){
        $search="qq_id={$_GET['search_qq']}";
    }else{
        exit();//传入的值不是qq号直接退出
    }
}else{
    $search='1=1';//默认值
}
//设置是否排除错误的日期
if(isset($_GET['exclude_error'])){
    $_GET['exclude_error']==='exclude'?$exclude="insert_time!='2030-01-01 00:00:00'":$exclude='1=1';
}else{
    $exclude='1=1';
}
//构造sql语句
switch ($game){
    case 'bh3' : {$game='bh3_data_sheet';break;}
    case 'pcr' : {$game='pcr_data_sheet';break;}
    case 'ys' : {$game='ys_data_sheet';break;}
    default:{$game='bh3_data_sheet';}
}
switch ($oder){
    case 'time_asc' : {$oder='insert_time ASC';break;}
    case 'time_des' : {$oder='insert_time DESC';break;}
    case 'serial_asc' : {$oder='serial_number ASC';break;}
    case 'serial_des' : {$oder='serial_number DESC';break;}
    default:{$oder='serial_number ASC';}
}
$sql="SELECT * FROM {$game} WHERE  {$exclude} and {$search} ORDER BY {$oder}";
require_once "../../10002.php";//获取数据库账号密码
@$link=mysqli_connect($mysql_server_name,$mysql_user,$mysql_password,$db_name1);//连接数据库
if (!$link) {die('error');}//连接失败则退出
@$sql_c=mysqli_query($link,$sql);
if(mysqli_affected_rows($link)<=0){die(null);}//查询不到结果则退出
$data=mysqli_fetch_all($sql_c,MYSQLI_NUM);//从结果集中取得所有行保存为关联数组
mysqli_close($link);//关闭连接
echo json_encode($data);//返回json
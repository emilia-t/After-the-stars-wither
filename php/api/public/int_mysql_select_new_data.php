<?php
/*严格模式:任何传入值不是按规定的传值则直接退出程序*/
if(!isset($_GET['sheet_name'])){exit();}//如果没有传入必要参数直接退出
$sheet_name=['bh3','pcr','ys','all'];//规定查询的表名称
//设置查询表游戏名
if(!in_array($_GET['sheet_name'],$sheet_name)){
    exit();//仅接收崩坏三和pcr的查询
}else{
    $sheet=$_GET['sheet_name'];
}
//构造sql语句
switch ($sheet){
    case 'bh3' : {$sql='SELECT * FROM bh3_data_sheet WHERE insert_time!="2030-01-01 00:00:00" ORDER BY insert_time desc LIMIT 1';break;}
    case 'pcr' : {$sql='SELECT * FROM pcr_data_sheet WHERE insert_time!="2030-01-01 00:00:00" ORDER BY insert_time desc LIMIT 1';break;}
    case 'ys' : {$sql='SELECT * FROM ys_data_sheet WHERE insert_time!="2030-01-01 00:00:00" ORDER BY insert_time desc LIMIT 1';break;}
    case 'all' : {$sql='SELECT * FROM ve_new_insert_data_sheet';break;}
    default:{$sql='SELECT * FROM ve_new_insert_data_sheet';}
}
require_once "../../10002.php";//获取数据库账号密码
@$link=mysqli_connect($mysql_server_name,$mysql_user,$mysql_password,$db_name1);//连接数据库
if (!$link) {die('error');}//连接失败则退出
@$sql_c=mysqli_query($link,$sql);
if(mysqli_affected_rows($link)<=0){die(null);}//查询不到结果则退出
$data=mysqli_fetch_all($sql_c,MYSQLI_ASSOC);//从结果集中取得所有行保存为关联数组
mysqli_close($link);//关闭连接
echo json_encode($data);//返回json
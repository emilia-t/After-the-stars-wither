<?php
error_reporting(0);
if(!isset($_POST['picture_id'])){exit('error');}
require_once('10001.php');
$link=mysqli_connect($mysql_server_name,$mysql_user,$mysql_password);//连接数据库
if ($link->connect_error) {die("error ");}
$databasers=mysqli_select_db($link,'picture');//连接库
$picture_id=(int)$_POST['picture_id'];
//判断是否为首赞
$sql_is_set="SELECT like_number FROM picture_like_data WHERE picture_id=$picture_id";
$sql_insert="INSERT INTO picture_like_data(picture_id,like_number)VALUES($picture_id,1)";
$sql_update="UPDATE picture_like_data SET like_number = like_number +1 WHERE picture_id=$picture_id";
$que_is_set=mysqli_query($link,$sql_is_set);
if(mysqli_num_rows($que_is_set)==0){
    $que_is_set=mysqli_query($link,$sql_insert);
    //if(mysqli_num_rows($que_is_set)==0){echo 'error';}else{echo 'yes';}
}else{
    $que_update=mysqli_query($link,$sql_update);
    //if(mysqli_num_rows($que_update)==0){echo 'error';}else{echo 'yes';}
}
?>

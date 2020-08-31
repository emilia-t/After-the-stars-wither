<?php
error_reporting(0);
if(!isset($_POST['picture_id'])){exit();}
require_once('10001.php');
$link=mysqli_connect($mysql_server_name,$mysql_user,$mysql_password);//连接数据库
if ($link->connect_error) {die("error ");}
$databasers=mysqli_select_db($link,'picture');//连接库
$picture_id=(int)$_POST['picture_id'];
$sql_like_number="SELECT like_number FROM picture_like_data WHERE picture_id =$picture_id";
$que_like_number=mysqli_query($link,$sql_like_number);
if(mysqli_num_rows($que_like_number)!==0){
    $row=mysqli_fetch_assoc($que_like_number);
    echo $row["like_number"];
}else{echo '0';}

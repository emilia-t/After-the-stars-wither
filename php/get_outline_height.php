<?php
if(!isset($_GET['window_width'])){exit();}
if(!isset($_GET['img_number'])){exit();}
$window_width=(int)$_GET['window_width']*0.192;
$file='http://172.16.0.2/thumbnail/'.$_GET['img_number'].'.jpg';
$picture=getimagesize($file);
echo (((int)$window_width/$picture[0])*$picture[1]+12);
?>
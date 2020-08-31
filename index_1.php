<?php
session_start();
$lifeTime = 336 * 3600;
setcookie(session_name(),session_id(),time()+$lifeTime,"/");
?>
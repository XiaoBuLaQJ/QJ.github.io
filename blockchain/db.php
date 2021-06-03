<?php

header("Content-type:text/html;charset=utf-8");
$db = mysqli_connect('localhost','root','qjly7559','blockchain_cwgl');
if (!$db) {
    die("连接失败:".mysqli_connect_error());
}
?>
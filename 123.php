<?php
// 创建连接
$conn = new mysqli("localhost", "root", "qjly7559");
// 检测连接
if ($conn->connect_error)
{
    die("连接失败: " . $conn->connect_error);}
// 创建数据库
$sql = "CREATE DATABASE test";
if ($conn->query($sql) === TRUE)
{
    echo "数据库创建成功";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();
?>


感谢宝贵意见！
<?php
session_start();
header("Content-type:text/html;charset=utf-8");
$link = mysqli_connect('localhost','root','qjly7559','blockchain_cwgl');
if (!$link) {
    die("连接失败:".mysqli_connect_error());
}
$qx_num = $_POST['qx_num'];
$email = $_POST['email'];
$message = $_POST['message'];
//if($qx_num == "" || $message == "" )
//{
//    echo "<script>alert('填一个名字吧！');window.location.href='index.html'</script>";
//} elseif ((strlen($qx_num) < 3)||(!preg_match('/^\w+$/i', $qx_num))) {
//    echo "<script>alert('用户名至少3位且不含非法字符！重新填写');window.location.href='index'</script>";
//    //判断用户名长度
//}elseif(strlen($password) < 5){
//    echo "<script>alert('密码至少5位！重新填写');window.location.href='zhuce.html'</script>";
//    //判断密码长度
//}elseif($password != $confirm) {
//    echo "<script>alert('两次密码不相同！重新填写');window.location.href='zhuce.html'</script>";
//    //检测两次输入密码是否相同
//} elseif (!preg_match('/^[\w\.]+@\w+\.\w+$/i', $email)) {
//    echo "<script>alert('邮箱不合法！重新填写');window.location.href='zhuce.html'</script>";
//    //判断邮箱格式是否合法
//} elseif(mysqli_fetch_array(mysqli_query($link,"select * from login where username = '$username'"))){
//    echo "<script>alert('用户名已存在');window.location.href='zhuce.html'</script>";
//} else{
    $sql= "insert into blog(name, email, message)values('$qx_num','$email','$message')";
    //插入数据库
    if(!(mysqli_query($link,$sql))){
        echo "<script>alert('数据插入失败');window.location.href='index.html'</script>";
    }else{
        echo "<script>alert('感谢您的意见！)</script>";
    }
//}
?>

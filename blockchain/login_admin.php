<?php
session_start();
header("Content-type:text/html;charset=utf-8");
include ('db.php');

$qx_num = $_POST['qx_num'];
$password = $_POST['password'];

if($qx_num == "" || $password == "" )
{
    echo "<script>alert('信息不能为空！重新填写');window.location.href='login_admin.html'</script>";
} else {
    $sql = "select * from qx WHERE qx_num='{$qx_num}' AND password='{$password}' AND qx_name='管理员'";

$result = $db->query($sql);
//判断结果集的记录数是否大于0
if ($result->num_rows > 0) {
    $_SESSION['qx_num'] = $qx_num;
    header("location:sys_admin/sys_admin.php");
} else {
    echo "<script>alert('用户名或密码错误，请重试！');window.location.href='login_admin.html'</script>";
}

}


?>
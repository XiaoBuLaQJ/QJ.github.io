<?php

session_start();
header("Content-type:text/html;charset=utf-8");
include('../db.php');

if (@$_POST['qx_num'] == null or @$_POST['password'] == null) {
    echo "<script>alert('信息为空请重新输入');window.location.href='sys_new_jzy.html'</script>";
} else {
    @$qx_num = $_POST['qx_num'];
    @$password = $_POST['password'];
    if ($qx_num != "" and $password != "") {
        $sql = "select * from qx WHERE qx_num='{$qx_num}'";
        $result = $db->query($sql);
//判断结果集的记录数是否大于0
        if ($result->num_rows > 0) {
            echo "<script>alert('用户名存在，请重新填写');window.location.href='sys_new_jzy.html'</script>";
        } else {
            $sql = "insert into qx(qx_num, password, qx_name)values('$qx_num','$password','注册_记账员')";
            $result = $db->query($sql);
            echo "<script>alert('注册成功！等待审核');window.location.href='sys_new.html'</script>";
        }

    }
}





?>
<?php
session_start();
header("Content-type:text/html;charset=utf-8");
$link = mysqli_connect('localhost','root','qjly7559','blockchain_cwgl');
if (!$link) {
    die("连接失败:".mysqli_connect_error());
}

$qx_num = $_POST['qx_num'];
$password = $_POST['password'];

if($qx_num == "" || $password == "" )
{
    echo "<script>alert('信息不能为空！重新填写');window.location.href='login_admin.html'</script>";
} else {
    $sql = "select * from qx WHERE qx_num='{$qx_num}' AND password='{$password}' AND qx_name='管理员'";
//    $mysqli_result = $db->query($sql);//得到对象
//    $row = $mysqli_result->fetch_array(MYSQLI_ASSOC);//转为数组
//    if (!(mysqli_query($link,$sql))) {
//        die("账号或密码错误");
//
//    } else {
//        header("location:../345.html");
////        die("账号或密码错误");
//    }
//}

$result = $link->query($sql);
//判断结果集的记录数是否大于0
if ($result->num_rows > 0) {
    $_SESSION['qx_num'] = $qx_num;
    // 输出每行数据
//    while($row = $result->fetch_assoc()) {
//        echo '<p>' . $row['student_nbr'] . '<br/>' . $row['student_name'] . '(' . $row['sex'] . ')' . '<br/>' . $row['class'] . '<br/>' . $row['major'].'</p>';
//        // <p><img src="student_images/CLASS/STUDENT_NBR.jpg" /></p>
//        echo '<p><img src="student_images/' . $row['class'] . '/' . $row['student_nbr'] . '.jpg" /></p>';
//    }
    header("location:../345.html");
} else {
    echo "<script>alert('用户名或密码错误，请重试！');window.location.href='login_admin.html'</script>";
}
$link->close();
}

//
//    $sql= "insert into login(username, password, confirm, email)values('$username','$password','$confirm','$email')";
//    //插入数据库
//    if(!(mysqli_query($link,$sql))){
//        echo "<script>alert('数据插入失败');window.location.href='zhuce.html'</script>";
//    }else{
//        echo "<script>alert('注册成功！)</script>";
//    }
//}
//session_start();
//
//include('blockchain/config.php');
//
//if ($input->get('do') == 'check') {
//    $auser = $input->post('auser');
//    $apass = $input->post('apass');
//    $sql = "select * from qx WHERE qx_num='{$auser}' AND password='{$apass}'";
//    $mysqli_result = $db->query($sql);//得到对象
//    $row = $mysqli_result->fetch_array(MYSQLI_ASSOC);//转为数组
//    if (is_array($row)) {
//        $_SESSION['aid'] = $row['aid'];
//        header("location:home.php");
//    } else {
//        die("账号或密码错误");
//    }
//}
?>
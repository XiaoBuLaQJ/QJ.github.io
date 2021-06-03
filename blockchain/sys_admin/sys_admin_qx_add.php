<?php
session_start();
header("Content-type:text/html;charset=utf-8");
include('../db.php');
$qx_name='qx_name';
$qx_num='qx_num';




?>
<!DOCTYPE HTML>
<html>
<head>
    <title>区块链财务管理系统</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../../assets/css/main2.css" />
    <noscript><link rel="stylesheet" href="../../assets/css/noscript.css" /></noscript>
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.js"></script>
</head>
<body class="is-preload">

<!-- Header -->
<header id="header">
    <a href="sys_admin.php" class="title">管理员系统</a>
    <nav>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="sys_admin_qx.php">权限管理<span class="sr-only">(current)</span></a></li>
            <li><a href="sys_admin_cw/sys_admin_cw.php">财务管理</a></li>
            <li><a href="sys_admin_gz/sys_admin_gz.php">工资管理</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">您好，管理员(<?php echo $_SESSION['qx_num']?>)<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../login_admin.html">退出</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>

<div id="wrapper">

    <section id="main" class="wrapper heise">
        <div class="inner">
            <h1 class="major">添加权限</h1>
            <blockquote class="success">请创建新的权限！</blockquote>


    <section>
        <form method="post" action="#">
            <div class="row gtr-uniform">
                <div class="col-6 col-12-xsmall">
                    <input type="text" name="qx_num"  value="" placeholder="用户名" />
                </div>
                <div class="col-6 col-12-xsmall">
                    <input type="text" name="password" value="" placeholder="密码" />
                </div>
                <div class="col-12">
                    <select name="qx_name" >
                        <option value="">- 请选择身份 -</option>
                        <option value="管理员">管理员</option>
                        <option value="记账员">记账员</option>
                        <option value="其他">其他</option>
                    </select>
                </div>
                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" value="提交！" class="primary" /></li>
                    </ul>
                </div>
            </div>
        </form>
    </section>
        </div>
    </section>
</div>
<?php
            if(@$_POST['qx_name']==null and @$_POST['qx_num']==null)
            {
                $_POST['qx_name']=" ";
                $_POST['qx_num']=" ";

            }else {
                $qx_name = $_POST['qx_name'];
                $password =$_POST['password'];
                $qx_num = $_POST['qx_num'];
                if($qx_num == "" || $qx_name == "" ) {
                    echo "<script>alert('信息不能为空！重新填写');window.location.href='sys_admin_qx_add.php'</script>";
                } else {
                    if (mysqli_fetch_array(mysqli_query($db,"select * from qx where qx_num = '$qx_num'"))) {
                        echo "<script>alert('已有该用户！重新填写');window.location.href='sys_admin_qx_add.php'</script>";
                    } else {
                        $sql = "insert into qx(qx_num, password, qx_name)values('$qx_num','$password','$qx_name')";
                        //插入数据库
                        mysqli_query($db, $sql);
                        echo "<script>alert('添加成功！');window.location.href='sys_admin_qx.php'</script>";
                    }
                }
            }
            ?>

        <!-- Footer -->
        <footer id="footer" class="wrapper hei-huise">
            <div class="inner">
                <ul class="menu">
                    <li>&copy; Qu Jiang (小布啦). All rights reserved.</li><li>Design: <a href="#three">小布啦</a></li>
                </ul>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="../../assets/js/jquery.min.js"></script>
        <script src="../../assets/js/jquery.scrollex.min.js"></script>
        <script src="../../assets/js/jquery.scrolly.min.js"></script>
        <script src="../../assets/js/browser.min.js"></script>
        <script src="../../assets/js/breakpoints.min.js"></script>
        <script src="../../assets/js/util.js"></script>
        <script src="../../assets/js/main.js"></script>

</body>

</html>
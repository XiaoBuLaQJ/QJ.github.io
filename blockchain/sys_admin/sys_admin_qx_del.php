<?php
session_start();
header("Content-type:text/html;charset=utf-8");
include('../db.php');
include ('input.php');
$input = new input();
$qx_num = $input->get('qx_num');
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
            <h1 class="major">删除用户</h1>
            <h2>您要删除用户为：<?php echo $qx_num ?></h2>
            <?php

                echo "<blockquote class=\"success\">请输入该账户的密码：</blockquote>
<section>
<form method=\"post\" action=\"#\">
                <div class=\"row gtr-uniform\">
                        <div class=\"col-6 col-12-xsmall\" >
                            <input type = \"password\" name = \"password\"  value = \"\" placeholder = \"密码\" />
                        </div >
                        <div class=\" col-12\" >
                            <ul class=\"actions\" >
                                <li ><input type = \"submit\" value = \"确定\" class=\"primary\" /></li >
                            </ul >
                        </div >
                        
                 
</div >
</form >
</section> ";
                if(@$_POST['password']==null)
                {
                    $_POST['password']=" ";

                }else {
                    $password = $_POST['password'];
                }
                if( @$password != "" )
                {
                    @$sql = "select * from qx WHERE password='{$password}'AND qx_num='{$qx_num}'";
                    $result = $db->query($sql);
                    if ($result->num_rows > 0)
                    {
                        if ($qx_num == $_SESSION['qx_num'])
                        {//检验,不能删除自己
                            die("不能删除自己");
                        }else
                            {
                            $sql = "delete from qx where qx_num='{$qx_num}'";
                            $is = $db->query($sql);
                            if ($is) {
                                echo "<script>alert('删除成功');window.location.href='sys_admin_qx.php'</script>";

                            } else
                                {
                                die("删除失败");
                                }
                        }

                    } else
                        {
                        echo "<script>alert('用户名或密码错误，请重试！');window.location.href='sys_admin_qx.php'</script>";
                        }

                }



            ?>
        </div>
    </section>
</div>



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
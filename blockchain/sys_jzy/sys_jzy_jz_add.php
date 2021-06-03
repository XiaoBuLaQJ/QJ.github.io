<?php
session_start();
header("Content-type:text/html;charset=utf-8");
include('../db.php');





?>
<!DOCTYPE HTML>
<html>
<head>
    <title>区块链财务管理系统</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../../assets/css/main4.css" />
    <noscript><link rel="stylesheet" href="../../assets/css/noscript.css" /></noscript>
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.js"></script>
</head>
<body class="is-preload">

<!-- Header -->
<header id="header">
    <a href="sys_jzy_jz.php" class="title">记账系统</a>
    <nav>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">您好，记账员(<?php echo $_SESSION['qx_num']?>)<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="sys_jzy_login.html">退出</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<div id="wrapper">

    <!-- Main -->
    <section id="main" class="wrapper heise">
        <div class="inner">
            <h1 class="major">添加交易信息</h1>

            <blockquote class="success">请添加最新的交易信息！</blockquote>
            <section>
                <form method="post" action="sys_jzy_jz_add.php">
                    <div class="row gtr-uniform">
                        <div class="col-3 col-12-xsmall">
                            <input type="text" name="lsh" value="" placeholder="流水号" />
                        </div>
                        <div class="col-2 col-12-xsmall">
                            <input type="text" name="jy_name" value="" placeholder="交易名称" />
                        </div>
                        <div class="col-3 col-12-xsmall">
                            <input type="text" name="jy_money" value="" placeholder="交易金额" />
                        </div>
                        <div class="col-2 col-12-xsmall">
                            <input type="text" name="jy_information" value="" placeholder="记账员备注" />
                        </div>
                        <div class="col-2 col-12-xsmall">
                            <ul class="actions">
                                <li><input type="submit" value="添加" class="primary" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </section>

        </div>
    </section>
</div>
<?php
if(@$_POST['lsh']==null and @$_POST['jy_name']==null and @$_POST['jy_money']==null and @$_POST['jy_information'])
{
    $_POST['lsh']=" ";
    $_POST['jy_name']=" ";
    $_POST['jy_money']=" ";
    $_POST['jy_information']=" ";
}else {
    @$lsh = $_POST['lsh'];
    @$jy_name = $_POST['jy_name'];
    @$jy_money = $_POST['jy_money'];
    @$jy_information = $_POST['jy_information'];
    if (@$lsh != null and @$jy_name != null and @$jy_money != null and @$jy_information != null) {
        $sql = "insert into Financial_statements(lsh, jy_name, jy_money,jy_information)values('$lsh','$jy_name','$jy_money','$jy_information')";
        //插入数据库
        mysqli_query($db, $sql);
        echo "<script>alert('添加成功！');window.location.href='sys_jzy_jz.php'</script>";

    } else
    {
//                    echo "<script>alert('信息不能为空！重新填写');window.location.href='sys_admin_cw_add.php'</script>";
        die("<h3 align=\"center\"请在框内填写完整信息！</h3>");
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

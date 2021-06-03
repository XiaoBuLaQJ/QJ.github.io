<?php
session_start();
header("Content-type:text/html;charset=utf-8");
include('../../db.php');
$lsh = 'lsh';
$qx_num = 'qx_num';
$Remuneration = 'Remuneration';
$Note = 'Note';




?>
<!DOCTYPE HTML>
<html>
<head>
    <title>区块链财务管理系统</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../../../assets/css/main2.css" />
    <noscript><link rel="stylesheet" href="../../../assets/css/noscript.css" /></noscript>
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/js/bootstrap.js"></script>
</head>
<body class="is-preload">

<!-- Header -->
<header id="header">
    <a href="../sys_admin.php" class="title">管理员系统</a>
    <nav>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="../sys_admin_qx.php">权限管理<span class="sr-only">(current)</span></a></li>
            <li><a href="../sys_admin_cw/sys_admin_cw.php">财务管理</a></li>
            <li><a href="sys_admin_gz.php">工资管理</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">您好，管理员(<?php echo $_SESSION['qx_num']?>)<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../../login_admin.html">退出</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>


<div id="wrapper">

    <!-- Main -->
    <section id="main" class="wrapper heise">
        <div class="inner">
            <h1 class="major">添加工资信息</h1>

            <blockquote class="success">请添加最新的交易信息！</blockquote>
            <section>
                <form method="post" action="sys_admin_gz_add.php">
                    <div class="row gtr-uniform">
                        <div class="col-3 col-12-xsmall">
                            <input type="text" name="lsh" value="" placeholder="流水号" />
                        </div>
                        <div class="col-2 col-12-xsmall">
                            <input type="text" name="qx_num" value="" placeholder="用户名" />
                        </div>
                        <div class="col-3 col-12-xsmall">
                            <input type="text" name="Remuneration" value="" placeholder="报酬" />
                        </div>
                        <div class="col-2 col-12-xsmall">
                            <input type="text" name="Note" value="" placeholder="备注" />
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
if(@$_POST['lsh']==null and @$_POST['qx_num']==null and @$_POST['Remuneration']==null and @$_POST['Note'])
{
    $_POST['lsh']=" ";
    $_POST['qx_num']=" ";
    $_POST['Remuneration']=" ";
    $_POST['Note']=" ";
}else {
    @$lsh = $_POST['lsh'];
    @$qx_num = $_POST['qx_num'];
    @$Remuneration = $_POST['Remuneration'];
    @$Note = $_POST['Note'];
    if ($lsh != null and $qx_num != null and $Remuneration != null ) {
        $sql = "insert into Bookkeeping_remuneration(lsh, qx_num, Remuneration,Note)values('$lsh','$qx_num','$Remuneration','$Note')";
        //插入数据库
        mysqli_query($db, $sql);
        echo "<script>alert('添加成功！');window.location.href='sys_admin_gz.php'</script>";

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
<script src="../../../assets/js/jquery.min.js"></script>
<script src="../../../assets/js/jquery.scrollex.min.js"></script>
<script src="../../../assets/js/jquery.scrolly.min.js"></script>
<script src="../../../assets/js/browser.min.js"></script>
<script src="../../../assets/js/breakpoints.min.js"></script>
<script src="../../../assets/js/util.js"></script>
<script src="../../../assets/js/main.js"></script>
</body>


</html>

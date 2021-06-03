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
<body>
<body class="is-preload">

<!-- Header -->
<header id="header">
    <a href="" class="title">管理员系统</a>
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

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <section id="main" class="wrapper heise">
        <div class="inner">
            <h1 class="major">请选择管理系统</h1>
            <section>
                <div class="row">
                    <div class="col-6 col-12-medium">
                        <h3>权限管理</h3>
                        <blockquote>对账号和权限进行管理<br>
                            进入后对权限数据进行添加、查看、修改和删除<br>
                            <a href="sys_admin_qx.php" class="button primary small">进入</a>
                        </blockquote>
                        <h3>工资管理</h3>
                        <blockquote>对记账员的工资进行管理<br>
                            进入后对工资数据进行添加、查看和修改<br>
                            <a href="sys_admin_gz/sys_admin_gz.php" class="button primary small">进入</a>
                        </blockquote>
                    </div>
                    <div class="col-6 col-12-medium">
                        <h3>财务管理</h3>
                        <blockquote>对财务系统进行管理<br>
                            进入后对财务数据进行添加、查看和修改<br>
                            <a href="sys_admin_cw/sys_admin_cw.php" class="button primary small">进入</a>
                        </blockquote>
                        <h2>Contact</h2>
                        <p>如果遇到任何问题，可以通过以下方式联系我！</p>
                        <ul class="icons">
                            <li><a href="https://im.qq.com/" class="icon brands fa-qq"><span class="label">QQ</span></a></li>
                            <li><a href="https://weixin.qq.com/" class="icon brands fa-weixin"><span class="label">Weixin</span></a></li>
                            <li><a href="https://www.google.com/" class="icon brands fa-google"><span class="label">Google</span></a></li>
                            <li><a href="https://github.com/" class="icon brands fa-github"><span class="label">Github</span></a></li>
                            <li><a href="https://wwd.com/tag/instagram/" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                        </ul>
                    </div>
                </div>
            </section>
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

</body>

</html>
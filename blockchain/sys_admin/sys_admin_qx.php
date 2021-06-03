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

    <!-- Main -->
    <section id="main" class="wrapper heise">
        <div class="inner">
            <h1 class="major">权限管理
                <small class="pull-right"><a class="btn-default" href="sys_admin_qx_add.php">添加权限</a></small>
            </h1>

            <blockquote class="success">请输入需要查询的信息！</blockquote>


    <section>
        <form method="post" action="sys_admin_qx.php">
            <div class="row gtr-uniform">
                <div class="col-5 col-12-xsmall">
                    <input type="text" name="qx_num" value="" placeholder="用户名" />
                </div>
                <div class="col-5 col-12-xsmall">
                    <input type="text" name="qx_name" value="" placeholder="权限名称" />
                </div>
                <div class="col-2 col-12-xsmall">
                    <ul class="actions">
                        <li><input type="submit" value="查询" class="primary" /></li>
                    </ul>
                </div>
            </div>
        </form>
    </section>

    <?php
    if(@$_POST['qx_name']==null and @$_POST['qx_num']==null)
    {
        $_POST['qx_name']=" ";
        $_POST['qx_num']=" ";

    }else {
        $qx_name = $_POST['qx_name'];
        $qx_num = $_POST['qx_num'];
    }
    //    $qx_zhu = array('qx_num'=>'','qx_name'=>'');
    if($qx_num != "" || $qx_name != "" ) {
//        $sql = "select * from qx WHERE qx_num='{$qx_num}' or qx_name='{$qx_name}' ";
//        $res = $db->query($sql);
//        $qx_zhu = $res->fetch_array(MYSQLI_ASSOC);

        $sql = "select * from qx WHERE qx_num='{$qx_num}' or qx_name='{$qx_name}'";
        $result = $db->query($sql);

        $rows = array();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

            $rows[] = $row;
        }

    }
    else{
        $sql = "select * from qx ";
        $result = $db->query($sql);

        $rows = array();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $rows[] = $row;
        }
    }
    ?>
    <h3>查询结果</h3>
    <div class="table-wrapper">
        <table class="alt">
            <thead>
            <tr>
                <th>用户名</th>
                <th>身份权限</th>
                <th>管理</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row):?>
                <tr>
                    <td><?php echo $row['qx_num']?></td>
                    <td><?php echo $row['qx_name']?></td>
                    <td>
                        <a href="sys_admin_qx_alter.php?qx_num=<?php echo $row['qx_num'];?>">修改</a>
                        <a href="sys_admin_qx_del.php?qx_num=<?php echo $row['qx_num'];?>">删除</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
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

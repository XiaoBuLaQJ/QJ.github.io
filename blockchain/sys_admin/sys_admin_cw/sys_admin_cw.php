<?php
session_start();
header("Content-type:text/html;charset=utf-8");
include('../../db.php');
$lsh = 'lsh';
$jy_name = 'jy_name';
$jy_money = 'jy_money';
$jy_information = 'jy_information';




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
            <li><a href="sys_admin_cw.php">财务管理</a></li>
            <li><a href="../sys_admin_gz/sys_admin_gz.php">工资管理</a></li>
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
            <h1 class="major">财务管理
                <small class="pull-right"><a class="btn-default" href="sys_admin_cw_add.php">添加交易信息</a></small>
            </h1>

            <blockquote class="success">请输入需要查询的信息！</blockquote>


            <section>
                <form method="post" action="">
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
                                <li><input type="submit" value="查询" class="primary" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </section>

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
            }


            if($lsh != "" || $jy_name != ""|| $jy_money != ""|| $jy_information != "") {

                $sql = "select * from Financial_statements WHERE lsh='{$lsh}' or jy_name='{$jy_name}' or jy_money='{$jy_money}' or jy_information='{$jy_information}' ";
                $result = $db->query($sql);

                $rows = array();
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

                    $rows[] = $row;
                }

            }
            else{
                $sql = "select * from Financial_statements ";
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
                        <th>流水号</th>
                        <th>交易名称</th>
                        <th>交易金额</th>
                        <th>记账员备注</th>
                        <th>管理</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rows as $row):?>
                        <tr>
                            <td><?php echo $row['lsh']?></td>
                            <td><?php echo $row['jy_name']?></td>
                            <td><?php echo $row['jy_money']?></td>
                            <td><?php echo $row['jy_information']?></td>
                            <td>
                                <a href="sys_admin_cw_alter.php?lsh=<?php echo $row['lsh'];?>">修改</a>
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
<script src="../../../assets/js/jquery.min.js"></script>
<script src="../../../assets/js/jquery.scrollex.min.js"></script>
<script src="../../../assets/js/jquery.scrolly.min.js"></script>
<script src="../../../assets/js/browser.min.js"></script>
<script src="../../../assets/js/breakpoints.min.js"></script>
<script src="../../../assets/js/util.js"></script>
<script src="../../../assets/js/main.js"></script>
</body>


</html>

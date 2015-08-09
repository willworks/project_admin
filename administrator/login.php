<?php 
//session验证登录，每一个前缀带"admin_"都要
require_once('data/session.php'); 
require_once('data/sysinfo.php'); 
require_once('data/visit.php'); 
header("Content-Type: text/html; charset=utf-8");

?>
<html lang="cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta name="keywords" content="广州唯量工控技术有限公司,winner,唯量,MEMS,质量流量计,流量计,MEMS氧气质量流量计,自动切换装置,TM2000,储罐,储罐自动切换装置,热式流量计,远程监控,数据采集器,液罐远程监控TM2000数据采集器"/>
        <meta name="description" content="广州唯量工控技术有限公司" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="广州唯量工控技术有限公司">
        <meta name="author" content="广州唯量工控技术有限公司">
        <link rel="icon" href="images/favicon.ico">
        <title>广州唯量工控技术有限公司</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/form_login.css" rel="stylesheet">
    </head>
<!--main-->
    <body>
        <div class="container">

            <form class="form-signin" role="form" method="post" action="check.php">
                <h2 class="form-signin-heading">广州唯量网站后台登录</h2>
                    <input type="email" class="form-control" name="name" placeholder="帐号" required autofocus>
                    <input type="password" class="form-control" name="password" placeholder="密码" required>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" value="remember-me"> 记住我
                    </label>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block">登录</button>
            </form>

        </div> <!-- /container -->        
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
<!--main-->
</html>
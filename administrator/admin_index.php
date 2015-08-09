<?php
//session验证登录，每一个前缀带"admin_"都要
require_once('data/session.php'); 
require_once('data/sysinfo.php'); 
require_once('data/visit.php'); 
?>
<!DOCTYPE html>
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
        <link href="css/dashboard.css" rel="stylesheet">
        
    </head>
<!--main-->
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#top">广州唯量工控技术有限公司</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="admin_index.php">主页</a></li>
                    <li><a href="admin_product_microelectronics.php">公司产品</a></li>
                    <li><a href="admin_project_industry.php">工程案例</a></li>
                    <li><a href="admin_file.php">资料管理</a></li>
                    <li><a href="logout.php">退出登录</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                    <li class="active"><a href="admin_index.php">数据统计</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-8 col-md-offset-3 main">
                    <div class="row">
                        <div class="col-xs-12">

                            <hr class="featurette-divider">
                                <div class="row featurette">
                                    <div class="col-md-3">
                                        <img class="featurette-image img-responsive" src="images/info_1.png">
                                    </div>
                                    <div class="col-md-9">
                                        <p class="lead" style="font-size: 18px;">操作系统：<?php echo $system_info['os_s']," ",$system_info['os_r']; ?></p>
                                        <p class="lead" style="font-size: 18px;">服务器软件：<?php echo $system_info['web_server']; ?></p>
                                        <p class="lead" style="font-size: 18px;">PHP 版本：<?php echo $system_info['php_ver']; ?></p>
                                        <p class="lead" style="font-size: 18px;">MySQL 版本：<?php echo $system_info['mysql_ver']; ?></p>
                                    </div>
                                </div>

                            <hr class="featurette-divider">
                                <div class="row featurette">
                                    <div class="col-md-3">
                                        <img class="featurette-image img-responsive" src="images/info_2.png">
                                    </div>
                                    <div class="col-md-9">
                                        <p class="lead" style="font-size: 18px;">总访问量：<?php echo $system_info['visit']; ?></p>
                                        <p class="lead" style="font-size: 18px;">最新访客ip：<?php echo $system_info['visit_ip']; ?></p>
                                        <p class="lead" style="font-size: 18px;">最新访问时间：<?php echo $system_info['visit_time']; ?></p>
                                        <p class="lead" style="font-size: 18px;">网站历史首次访问记录：<?php echo $system_info['visit_time_before']; ?></p>
                                    </div>
                                </div>

                            <hr class="featurette-divider">
                        </div>



                    <div class="row footer-top" style="padding-top: 80px;">
                        <hr class="featurette-divider">
                        <div class="row footer-bottom">
                        <ul class="list-inline text-center">
                        <li>Copyright © Etomato 2014 All Right Reserved</li>
                        <a href="#top" style="float:right"><img src="images/toTop.png"></a>
                        <p>
                        <li><a href="http://www.miibeian.gov.cn/" target="_blank"><?php require_once('data/config.php'); echo $record; ?></a></li>
                        </p>
                        </ul>
                    </div> 
                                    
                </div>

            </div>
        </div>  
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/docs.min.js"></script>
    </body>
<!--main-->
</html>
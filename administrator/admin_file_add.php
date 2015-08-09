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
        <link href="css/form_upload.css" rel="stylesheet">
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
                    <li><a href="admin_index.php">主页</a></li>
                    <li><a href="admin_product_microelectronics.php">公司产品</a></li>
                    <li><a href="admin_project_industry.php">工程案例</a></li>
                    <li class="active"><a href="admin_file.php">资料管理</a></li>
                    <li><a href="logout.php">退出登录</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                    <li><a href="admin_file.php">文件管理</a></li>
                    <li class="active"><a href="admin_file_add.php">上传文件</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-8 col-md-offset-3 main" style="padding-top: 50px">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">

                                <div class="file-box"> 
                                    <form form action="upload.php" method="post" enctype="multipart/form-data"> 

                                        <!--提示框-->
                                        <div class="alert alert-info fade in" style="text-align:center">
                                            <h4>温馨提示</h4>
                                            <p>尽量选择比较小的文件，以防止上传失败</p>

                                        </div>

                                        <div class="col-md-12">
                                            <div style="text-align: center">
                                                <h3><span style="text-align: center" id="upfileResult"></span></h3>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="col-md-5">
                                            <div class="fileInput" style="float:right">
                                                <input type="file" name="upfile" id="upfile" class="upfile" onchange="document.getElementById('upfileResult').innerHTML=this.value"/>
                                                <input class="upFileBtn" type="button" value="上传文件" onclick="document.getElementById('upfile').click()" />
                                            </div>                           
                                        </div>

                                        <div class="col-md-2">
                                        </div>

                                        <div class="col-md-5">
                                            <div class="fileSubmit">
                                                <input class="SubmitBtn" type="submit" name="upfile" class="btn btn-default"/>
                                            </div>
                                            
                                        </div>

                                    </form> 
                                </div> 
                        </div>
                    </div>
            </div>

                    <div class="row footer-top">
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
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
        <link rel="icon" href="../images/favicon.ico">
        <title>广州唯量工控技术有限公司</title>
        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/dashboard.css" rel="stylesheet">
        
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
                    <li><a href="../admin_index.php">主页</a></li>
                    <li><a href="../admin_product_microelectronics.php">公司产品</a></li>
                    <li class="active"><a href="../admin_project_industry.php">工程案例</a></li>
                    <li><a href="../admin_file.php">资料管理</a></li>
                    <li><a href="../logout.php">退出登录</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                    
                    <li class="active"><a href="../admin_project_industry.php">案例管理</a></li>
                    <li><a href="../admin_project_add.php">新增案例</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-8 col-md-offset-3 main">
                    
                    <div class="row">
<!--
                        <div class="span6">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="../admin_project_industry.php">工业案例</a></li> 
                                <li><a href="../admin_project_civil.php">民用案例</a></li>
                                <li><a href="../admin_project_other.php">其他案例</a></li> 
                            </ul>
                        </div>
-->

                        <div class="col-md-12">
                            
                                <div class="row">
                                    <div class="col-xs-12">

                                    <?php
                                    //----------------------------------------------------------------------------------------------------------------------------------------------------
                                        
                                        $title = $_POST['title'];
                                        $images = $_POST['images'];
                                        /*
                                        header("Content-Type: text/html; charset=utf-8");
                                        require_once('../data/config.php'); 
                                        $mysqli = new mysqli($hostname, $username, $password, $database); 
                                        //检查连接是否成功 
                                        if (mysqli_connect_errno()){ 
                                        //注意mysqli_connect_error()新特性 
                                        echo"数据库链接失败！";
                                        die('Unable to connect!'). mysqli_connect_error(); 
                                        }  
                                        //获取数据库project每一列的数据
                                        $sql = "SELECT * FROM project WHERE project_title = '$title' AND project_image = '$images'";
                                        $res = mysqli_query($mysqli, $sql);
                                        if ($res) { 
                                            $row = $res->fetch_row();
                                            $content = htmlspecialchars_decode($row[4]);
                                        }
                                        $res->free();
                                        $mysqli->close();
                                        */
                                        header("Content-Type: text/html; charset=utf-8");
                                        require_once('../data/config.php'); 
                                        $con = mysql_connect($hostname,$username,$password);
                                        if (!$con){
                                          die('Could not connect: ' . mysql_error());
                                        }
                                        else{
                                          mysql_select_db($database, $con);
                                          //--------------------------------------------------
                                          //解决php和html以及连接数据库时的乱码问题
                                          mysql_query('SET NAMES UTF8');
                                          //--------------------------------------------------
                                          $res = mysql_query("SELECT * FROM project WHERE project_title = '$title' AND project_image = '$images'");
                                          if ($res) { 
                                              $row = mysql_fetch_row($res);
                                              $content = htmlspecialchars_decode($row[4]);
                                          }
                                        }
                                        mysql_free_result($res); 
                                        mysql_close($con);
                                    ?>

                                        <!--文本格式规定-->
                                        <div class="blog-header">
                                            <h2 class="blog-title"><?php echo $title ?></h2>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-12 blog-main">
                                                <div class="blog-post">
                                                    <img class="featurette-image img-responsive" src="../project_images/<?php echo $images ?>" style="width: 795px; height: 477px">
                                                </div><!-- /.blog-post -->
                                            </div><!-- /.blog-main -->
                                        </div><!-- /.row -->
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-12 blog-main">
                                                <div class="blog-post">
                                                    <p><?php echo $content ?></p>
                                                </div><!-- /.blog-post -->
                                            </div><!-- /.blog-main -->
                                        </div><!-- /.row -->
                                        <!--文本格式规定-->



                                    </div>
                                </div>
                            
                        </div>
                    </div>

                    <div class="row footer-top">
                        <hr class="featurette-divider">
                        <div class="row footer-bottom">
                        <ul class="list-inline text-center">
                        <li>Copyright © Etomato 2014 All Right Reserved</li>
                        <a href="#top" style="float:right"><img src="../images/toTop.png"></a>
                        <p>
                        <li><a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo $record; ?></a></li>
                        </p>
                        </ul>
                    </div>                         
                </div>

            </div>
        </div>  
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/docs.min.js"></script>
    </body>
<!--main-->
</html>
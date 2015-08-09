<?php
//session验证登录，每一个前缀带"admin_"都要
require_once('../data/session.php'); 
header("Content-Type: text/html; charset=utf-8");
//--------------------------------------------------------------------------------------
$title = $_POST['title'];
$images = $_POST['images'];
$type = $_POST['type'];
//--------------------------------------------------------------------------------------
require_once('../data/config.php'); 
$con = mysql_connect($hostname,$username,$password);
if (!$con){
  die('Could not connect: ' . mysql_error());
}
//将等待删除的文件在数据库中匹配，如果存在，就删除，失败就返回提示
mysql_select_db($database, $con);
//--------------------------------------------------
//解决php和html以及连接数据库时的乱码问题
mysql_query('SET NAMES UTF8');
//--------------------------------------------------
$res = mysql_query("UPDATE project SET del_flag = '1' WHERE project_title = '$title' AND project_image = '$images'");
if($res){
    //文件存在，可以执行删除
    echo"删除成功！";
    if ($type == 'a') {
    	echo"<script language='javascript'> setTimeout(window.location.href='../admin_project_industry.php',30); </script> ";
    }
    elseif ($type == 'b') {
    	echo"<script language='javascript'> setTimeout(window.location.href='../admin_project_civil.php',30); </script> ";
    }
    elseif ($type == 'c') {
    	echo"<script language='javascript'> setTimeout(window.location.href='../admin_project_other.php',30); </script> ";
    }

}
else{
    //文件不存在，也就表示存在错误，无法删除
    echo"删除失败！";
    if ($type == 'a') {
    	echo"<script language='javascript'> setTimeout(window.location.href='../admin_project_industry.php',30); </script> ";
    }
    elseif ($type == 'b') {
    	echo"<script language='javascript'> setTimeout(window.location.href='../admin_project_civil.php',30); </script> ";
    }
    elseif ($type == 'c') {
    	echo"<script language='javascript'> setTimeout(window.location.href='../admin_project_other.php',30); </script> ";
    }
}
mysql_close($con);
?>
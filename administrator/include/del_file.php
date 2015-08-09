<?php
//session验证登录，每一个前缀带"admin_"都要
require_once('../data/session.php'); 
header("Content-Type: text/html; charset=utf-8");
//--------------------------------------------------------------------------------------
$name = $_POST['name'];
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
$res = mysql_query("UPDATE upload_file SET del_flag = '1' WHERE file_name = '$name'");
if($res){
    //文件存在，可以执行删除
    echo"删除成功！";
    echo"<script language='javascript'> setTimeout(window.location.href='../admin_file.php',30); </script> ";
}
else{
    //文件不存在，也就表示存在错误，无法删除
    echo"删除失败！";
    echo"<script language='javascript'> setTimeout(window.location.href='../admin_file.php',30); </script> ";
}
mysql_close($con);
?>
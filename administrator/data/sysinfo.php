<?php
header("Content-Type: text/html; charset=utf-8");
//---------------------------------------------------------------------------------
//创建对象并打开连接，最后一个参数是选择的数据库名称 
require_once('data/config.php'); 
$con = mysql_connect($hostname,$username,$password);
if (!$con){
  die('Could not connect: ' . mysql_error());
}

//---------------------------------------------------------------------------------
$system_info['os_s'] = php_uname('s');
$system_info['os_r'] = php_uname('r');

$system_info['web_server'] = $_SERVER['SERVER_SOFTWARE'];
$system_info['php_ver'] = PHP_VERSION;

mysql_select_db($database, $con);
//--------------------------------------------------
//解决php和html以及连接数据库时的乱码问题
mysql_query('SET NAMES UTF8');
//--------------------------------------------------
$res = mysql_query("select VERSION()");
$row = mysql_fetch_row($res);
$system_info['mysql_ver'] = $row[0];

mysql_free_result($res); 
mysql_close($con);
?>
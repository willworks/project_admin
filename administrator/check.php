<?php 
header("Content-Type: text/html; charset=utf-8");
if(!isset($_POST['submit'])){
    header("Location: relogin.php");
}
//--------------------------------------------------------------------------------------------------------------------
//设置session
//启动session
session_start();
//声明一个admin变量，用于后期判读是否登录，并且赋空值
$_SESSION["admin"] = null;
$_SESSION["login_fail"] = null;
//---------------------------------------------------------------------------------------------------------------------


//获得验证的用户名和密码
$ADMIN_NAME=md5($_POST['name']);
$ADMIN_PASSWORD=md5($_POST['password']);
//和数据库内的进行比对
//创建对象并打开连接，最后一个参数是选择的数据库名称 
require_once('data/config.php'); 
$con = mysql_connect($hostname,$username,$password);
if (!$con){
  die('Could not connect: ' . mysql_error());
}

mysql_select_db($database, $con);
//--------------------------------------------------
//解决php和html以及连接数据库时的乱码问题
mysql_query('SET NAMES UTF8');
//--------------------------------------------------
$res = mysql_query("SELECT * FROM webmaster WHERE admin_name='$ADMIN_NAME' and admin_password='$ADMIN_PASSWORD'");
$row = mysql_fetch_row($res);
if($row){
    //-----------------------------------------------------------------------------------------------------------------
    //验证通过后，启动session
    session_start();
    //登录成功后admin的值设为真
    $_SESSION["admin"] = true;
    //----------------------------------------------------------------------------------------------------------------- 
    header("Location: admin_index.php");
}
else{
	session_start();
	$_SESSION["login_fail"] = true;
    header("Location: relogin.php");
}

mysql_free_result($res); 
mysql_close($con);
?>
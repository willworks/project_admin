<?php 
header("Content-Type: text/html; charset=utf-8");
//--------------------------------------------------------------------------------------------------------
//启动session
session_start();
//将原来注册的$_SESSION["admin"]变量销毁
unset($_SESSION['admin']);
unset($_SESSION['login_fail']);
//销毁整个session文件
session_destroy();
header("Location: relogin.php");
//-------------------------------------------------------------------------------------------------------
?>
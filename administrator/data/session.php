<?php 
header("Content-Type: text/html; charset=utf-8");
//--------------------------------------------------------------------------------------------------------
//验证session
//防止全局变量造成安全隐患
$admin = false;
$login_fail = false;
//启动session
session_start();
//判断是否登录
if (isset($_SESSION["admin"]) and $_SESSION["admin"] === true) {
}
else{
    //验证失败，强制把$_SESSION["admin"]设为false
    $_SESSION["admin"] = false;
    header("Location: relogin.php");
}
//-------------------------------------------------------------------------------------------------------
?>
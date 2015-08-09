<?php
//header("Content-Type: text/html; charset=utf-8");
#$upload_path = $_SERVER['DOCUMENT_ROOT']."/administrator/upload/";
require_once('data/session.php'); 
require_once('data/sysinfo.php'); 
require_once('data/visit.php'); 
$upload_path = "upload/";
require_once('data/config.php'); 
//session验证登录，每一个前缀带"admin_"都要
//$_FILES["upfile"]["name"] = iconv("UTF-8","GB2312//IGNORE",$_FILES["upfile"]["name"]); //把utf-8转为中文gb2312 "//IGNORE"表示屏蔽错误继续执行
//------------------------------------------------------------------------------
//获取文件后缀名
function get_extension($file)
{
    return pathinfo($file, PATHINFO_EXTENSION);
}
//------------------------------------------------------------------------------
$con = mysql_connect($hostname,$username,$password);
if (!$con){
  echo"数据库连接错误，请检查端口和数据库连接账号密码";
  echo"<script language='javascript'> setTimeout(window.location.href='admin_file_add.php',30); </script> ";
  die('Could not connect: ' . mysql_error());
}


if (isset($_FILES["upfile"])) {
    if ($_FILES["upfile"]["size"] > 8192000/*限制文件大小小于8m，数值的单位是b*/){
        echo"文件大于8m，请将文件处理缩小后再上传";
        echo"<script language='javascript'> setTimeout(window.location.href='admin_file_add.php',30); </script> ";
    }
    else{
        if ($_FILES["upfile"]["error"] > 0)
        {
        	echo $_FILES["upfile"]["error"];
            echo"文件出错，请重新选择文件";
            echo"<script language='javascript'> setTimeout(window.location.href='admin_file_add.php',30); </script> ";
        }
        else
        {
            if (file_exists($upload_path . $_FILES["upfile"]["name"]))
            {
                echo $_FILES["upfile"]["name"] . "已经存在，请选择其他文件或者将文件重命名再上传";
                echo"<script language='javascript'> setTimeout(window.location.href='admin_file_add.php',30); </script> ";
            }
            else
            {
                if(move_uploaded_file($_FILES["upfile"]["tmp_name"], mb_convert_encoding($upload_path . $_FILES["upfile"]["name"],"gbk", "utf-8"))){
                	//中文转换mb_convert_encoding($upload_path . $_FILES["upfile"]["name"],"gbk", "utf-8")
                    $_FILES["upfile"]["extension"] = get_extension($upload_path . $_FILES["upfile"]["name"]);
                    //----------------------------------------------------------------------------------
                    //将上传文件的信息插入数据库保存
                    $file_type = $_FILES["upfile"]["extension"];
                    $file_name = $_FILES["upfile"]["name"];
                    $del_flag = 0;
                    mysql_select_db($database, $con);
                    //--------------------------------------------------
                    //解决php和html以及连接数据库时的乱码问题
                    mysql_query('SET NAMES UTF8');
                    //--------------------------------------------------
                    $res = mysql_query("INSERT INTO upload_file(file_type, file_name, del_flag) VALUE('$file_type', '$file_name', '$del_flag')");   
                    if ($res){
                       echo"文件上传成功";
                       echo"<script language='javascript'> setTimeout(window.location.href='admin_file.php',30); </script> ";
                    }
                    else{
                       echo"文件信息插入数据库出错，请重新上传文件，若不行请联系技术人员";
                       echo"<script language='javascript'> setTimeout(window.location.href='admin_file_add.php',30); </script> ";             
                    }
                }
                else{
                    echo"文件移动出错，请重新上传文件";
                    echo"<script language='javascript'> setTimeout(window.location.href='admin_file_add.php',30); </script> ";
                }

                //----------------------------------------------------------------------------------
            }
        }
    }
}
else{
    echo"文件不能为空，请重新选择再上传";
    echo"<script language='javascript'> setTimeout(window.location.href='admin_file_add.php',30); </script> ";
}


mysql_close($con);           
//--------------------------------------------------------------------------------------------------------------------------
//解决中文无法插入的问题mb_convert_encoding($upload_path . $_FILES["upfile"]["name"],"gbk", "utf-8")
//--------------------------------------------------------------------------------------------------------------------------
?>
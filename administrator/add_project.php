<?php
//session验证登录，每一个前缀带"admin_"都要
require_once('data/session.php'); 
require_once('data/sysinfo.php'); 
require_once('data/visit.php'); 

#$upload_path = $_SERVER['DOCUMENT_ROOT']."/administrator/project_images/";

$upload_path = "project_images/";

require_once('data/config.php'); 
$con = mysql_connect($hostname,$username,$password);
if (!$con){
  echo"数据库连接错误，请检查端口和数据库连接账号密码";
  echo"<script language='javascript'> setTimeout(window.location.href='admin_project_add.php',30); </script> ";
  die('Could not connect: ' . mysql_error());
} 
//-------------------传递单选按钮的值------------------------------------------------------------------------------------------------
if (isset($_POST['optionsRadios']) && !empty($_POST['optionsRadios'])) {
    //-------------------传递所选择图片的值------------------------------------------------------------------------------------------------
    if (isset($_FILES["file"])) {
        if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/PJPEG") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/JPEG") || ($_FILES["file"]["type"] == "image/JPG") || ($_FILES["file"]["type"] == "image/GIF") || ($_FILES["file"]["type"] == "image/PNG")) && ($_FILES["file"]["size"] < 2048000/*限制文件大小小于2m，数值的单位是b*/)){
                if ($_FILES["file"]["error"] > 0)
                {
                    echo"案例图片出错，请重新选择图片";
                    echo"<script language='javascript'> setTimeout(window.location.href='admin_project_add.php',30); </script> ";
                }
                else
                {
                    if (file_exists($upload_path . $_FILES["file"]["name"]))
                    {
                        echo $_FILES["file"]["name"] . "已经存在，请选择其他图片或者将图片重命名再上传";
                        echo"<script language='javascript'> setTimeout(window.location.href='admin_project_add.php',30); </script> ";
                    }
                    else
                    {
                        if(move_uploaded_file($_FILES["file"]["tmp_name"], mb_convert_encoding($upload_path . $_FILES["file"]["name"],"gbk", "utf-8"))){
                            if (isset($_POST['textarea']) && !empty($_POST['textarea'])) {
                                if(isset($_POST['title']) && !empty($_POST['title'])){
                                    if(isset($_POST['textarea_brief']) && !empty($_POST['textarea_brief'])){

                                        //---------------------------核心数据插入功能-----------------------------------------------------------------------------------------------------------
                                        //-------------------------------------------------------------------------------------------------------------------------------------------------------
                                        //将上传文件的信息插入数据库保存
                                        $project_type = $_POST['optionsRadios'];
                                        $project_title = $_POST['title'];
                                        $project_image = $_FILES["file"]["name"];
                                        $project_text_brief = $_POST['textarea_brief'];
                                        //$project_text = $_POST['textarea'];
                                        $project_text = '';
                                        if (!empty($_POST['textarea'])) {
                                            if (get_magic_quotes_gpc()) {
                                                $project_text = stripslashes($_POST['textarea']);
                                            } else {
                                                $project_text = $_POST['textarea'];
                                            }
                                        }
                                        //-------------------------------！！！！！！！！！！-----------------------------
                                        $project_text = addslashes($project_text);//转义问题，需要和存入数据库时先 addslashes()读出数据库先  htmlspecialchars_decode()
                                        //--------------------------------------------------------------------------------
                                        $del_flag = 0;
                                        mysql_select_db($database, $con);
                                        //--------------------------------------------------
                                        //解决php和html以及连接数据库时的乱码问题
                                        mysql_query('SET NAMES UTF8');
                                        //--------------------------------------------------
                                        $res = mysql_query("INSERT INTO project(project_type, project_title, project_image, project_text_brief, project_text, del_flag) VALUE('$project_type', '$project_title', '$project_image', '$project_text_brief', '$project_text', '$del_flag')");
                                        //--------------------------------------------------------------------------------------------------------------------------------------------------------

                                        if ($res){
                                           echo"案例添加成功！";
                                           if ($project_type == 'a') {
                                            echo"<script language='javascript'> setTimeout(window.location.href='admin_project_industry.php',30); </script> ";
                                           }
                                           elseif ($project_type == 'b') {
                                            echo"<script language='javascript'> setTimeout(window.location.href='admin_project_civil.php',30); </script> ";
                                           }
                                           elseif ($project_type == 'c') {
                                            echo"<script language='javascript'> setTimeout(window.location.href='admin_project_other.php',30); </script> ";
                                           }
                                        }
                                        else{
                                           echo"案例具体信息插入数据库出错，请重新添加产品，若不行请联系技术人员";
                                           echo"<script language='javascript'> setTimeout(window.location.href='admin_project_add.php',30); </script> ";              
                                        }
                                        //--------------------------------------------------------------------------------------------------------------------------------------------------------
                                    }
                                    else{
                                        echo"案例简介不能为空，请重新填写";
                                        echo"<script language='javascript'> setTimeout(window.location.href='admin_project_add.php',30); </script> ";
                                    }
                                }
                                else{
                                    echo"案例标题不能为空，请重新填写";
                                    echo"<script language='javascript'> setTimeout(window.location.href='admin_project_add.php',30); </script> ";
                                }
                            }
                            else{
                                echo"案例详细介绍不能为空，请重新填写";
                                echo"<script language='javascript'> setTimeout(window.location.href='admin_project_add.php',30); </script> ";
                            }
                        }
                        else{
                            echo"案例图片移动出错，请重新上传图片";
                            echo"<script language='javascript'> setTimeout(window.location.href='admin_project_add.php',30); </script> ";
                        }
                    }
                }
            }
            else{
                echo"案例图片大于应该小于2m，图片类型为jpg、png或gif，请重新处理图片再上传";
                echo"<script language='javascript'> setTimeout(window.location.href='admin_project_add.php',30); </script> ";
            }
    }
    else{
        echo"产品图片不能为空，请重新上传";
        echo"<script language='javascript'> setTimeout(window.location.href='admin_project_add.php',30); </script> ";
    }
}
else{
    echo"请选择案例所属领域，再重新上传";
    echo"<script language='javascript'> setTimeout(window.location.href='admin_project_add.php',30); </script> ";
}

mysql_close($con);           
?>



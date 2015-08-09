<?php
//session验证登录，每一个前缀带"admin_"都要
require_once('data/session.php'); 
require_once('data/sysinfo.php'); 
require_once('data/visit.php'); 
?>
<style type="text/css">
    .btn-default{color:#fff;background-color:#479AC7;border-color:#ccc;}
</style>
<div class="row featurette">
    <div class="col-md-3">
        <img class="featurette-image img-responsive" src=<?php $img_src="images/{$images}.png";echo $img_src;?>>
    </div>
    <div class="col-md-9">
        <h2><?php echo $name;?></h2>
        <p>
        <!--很巧妙的方法，本人用post传值，先给各个表单的控件赋值，但是实际上把表单隐藏起来，这个归功于css的style="display:none"，既无占用隐藏-->
        <div>
            <form form action="include/del_file.php" method="post" enctype="multipart/form-data">
                <input  style="display:none" id="name" name="name" value="<?php echo "$name" ?>">
                <input type="submit" class="btn btn-default" role="button" value="删除文件">
            </form>
        </div>
    </div>
</div>
<hr>
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
    <div class="col-md-5">
        <img class="featurette-image img-responsive" src=<?php $img_src="product_images/{$images}";echo $img_src;?> style="width: 325px; height: 195px">
    </div>
    <div class="col-md-7">
        <h3><?php echo $name;?></h3>
        <p><?php echo $introduction_brief;?></p>
        <!--很巧妙的方法，本人用post传值，先给各个表单的控件赋值，但是实际上把表单隐藏起来，这个归功于css的style="display:none"，既无占用隐藏-->
        <div class="row featurette">
            <div class="col-md-2">
                <form form action="include/product.php" method="post" enctype="multipart/form-data">
                    <input  style="display:none" id="name" name="name" value="<?php echo "$name" ?>">
                    <input  style="display:none" id="images" name="images" value="<?php echo "$images" ?>">
                    <input  style="display:none" id="introduction_brief" name="introduction_brief" value="<?php echo "$introduction_brief" ?>">
                    <input type="submit" class="btn btn-default" role="button" value="查看">
                </form>
            </div>
            <div class="col-md-2">
                <form form action="include/del_product.php" method="post" enctype="multipart/form-data">
                    <input  style="display:none" id="name" name="name" value="<?php echo "$name" ?>">
                    <input  style="display:none" id="type" name="type" value="<?php echo "$type" ?>">
                    <input  style="display:none" id="images" name="images" value="<?php echo "$images" ?>">
                    <input type="submit" class="btn btn-default" role="button" value="删除">
                </form>
            </div>
        </div>
    </div>
</div>
<hr class="featurette-divider">
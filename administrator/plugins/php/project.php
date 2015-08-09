<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="plugins/themes/default/default.css" />
	<link rel="stylesheet" href="plugins/plugins/code/prettify.css" />
	<script charset="utf-8" src="plugins/kindeditor.js"></script>
	<script charset="utf-8" src="plugins/lang/zh_CN.js"></script>
	<script charset="utf-8" src="plugins/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="textarea"]', {
				cssPath : 'plugins/plugins/code/prettify.css',
				uploadJson : 'plugins/php/upload_json.php',
				fileManagerJson : 'plugins/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
</head>
<body>
		<form name="example" method="post" action="../administrator/add_project.php" enctype="multipart/form-data">
		<!--案例领域-->
		<div class="alert alert-info fade in">
		    <p>请选择案例所属领域</p>
		
		    <div class="radio">
		        <label>
		            <input type="radio" name="optionsRadios" id="optionsRadios" 
		            value="a" checked> 工业领域
		        </label>
		    </div>
		    <div class="radio">
		        <label>
		        <input type="radio" name="optionsRadios" id="optionsRadios" 
		        value="b"> 民用领域
		        </label>
		    </div>
		    <div class="radio">
		        <label>
		        <input type="radio" name="optionsRadios" id="optionsRadios" 
		        value="c"> 其他
		        </label>
		    </div>                                        
		</div>
		<!--文本-->
		<div class="alert alert-info fade in">
		    <p>请输入案例标题</p>                                    
		    <br>
		    <div class="form-group">
		       <input type="text" class="form-control" name="title" id="title">
		   </div>
		</div>


		<!--选择配图-->
		<div class="alert alert-info fade in">
		    <p>请选择案例配图</p>                                    
		    <br>
		    <div class="form-group">
		        <label class="sr-only" for="file">文件输入</label>
		        <input type="file" id="file"  name="file">
		    </div>
		</div>

		<!--文本-->
		<div class="alert alert-info fade in">
		    <p>请输入案例简介，控制在100字左右</p>                                    
		    <br>
		    <div class="form-group">
		        <textarea class="form-control" rows="3" name="textarea_brief" id="textarea_brief"></textarea>
		    </div>
		</div>


		<!--文本-->
		<div class="alert alert-info fade in">
		    <p>请输入案例详细内容</p>                                    
		    <br>
		    <div class="form-group">
		        <textarea name="textarea" style="width:700px;height:200px;visibility:hidden;"><?php echo htmlspecialchars($htmlData); ?></textarea>
		    </div>
		</div>
		<!--提交按钮-->
		<div>
		    <input type="submit" name="file" class="btn btn-default" value="提交" />
		</div>
		<br />
		
	</form>
</body>
</html>



<!--form-->
<script language="JavaScript" type="text/javascript" src="js/form.js"></script>
<script language="JavaScript" type="text/javascript" src="js/lib/jquery.validate.js"></script>

<!--file-->
<script type="text/javascript" src="js/lib/jquery.flash.js"></script>
<script type="text/javascript" src="js/lib/jquery.jqUploader.js"></script>


<script language="JavaScript" type="text/javascript">
	$(document).ready(function(){			
		//image	
		$("#image-uploader").jqUploader({
			uploadScript:	"<?=$module->AJAX_URL;?>/addsect_image.php",
			allowedExt:     "*.jpg; *.png; *.gif",
			allowedExtDescr:"Форматы (*.jpg; *.png; *.gif)"
		});
		
		//addsect	
		validator = $("form[name='addsect']").validate(); 
		$("form[name='addsect']").submit(function (){		
			submit_form('addsect','<?=$module->NAME;?>',back);
			return false;
		});	
	});
</script>

<form name="addsect" action="" method="post" enctype="multipart/form-data" class="form">
	<label for="title">Название:</label>
	<input type="text" name="title" value="" maxlength="255" class="required" />
	<label for="text">Описание:</label>
	<textarea name="text" rows="10" cols="17"></textarea>
	<label for="image">Изображение:</label>
	<div class="upload">
		<div id="image-uploader" class="jqUploader">
			<input name="image" id="image" type="file" />
		</div>
	</div>
	<label for="title">Рейтинг:</label>
	<input type="text" name="rate" value="450" maxlength="3" class="digits" />
	<button name="submit" type="submit" class="submit">Добавить</button>
</form>
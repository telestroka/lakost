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
			uploadScript:	"<?=$module->AJAX_URL;?>/addcat_image.php",
			allowedExt:     "*.jpg; *.png; *.gif",
			allowedExtDescr:"Форматы (*.jpg; *.png; *.gif)"
		});
		
		//editcat	
		validator = $("form[name='editcat']").validate(); 
		$("form[name='editcat']").submit(function (){
			submit_form('editcat','<?=$module->NAME;?>',back);
			return false;
		});	
	});
</script>

<form name="editcat" action="" method="post" enctype="multipart/form-data" class="form">
	<input type="hidden" name="cat" value="<?=$cat_info['id'];?>" />
	<label for="title">Название:</label>
	<input type="text" name="title" value="<?=$cat_info['title'];?>" maxlength="255" class="required" />
	<label for="text">Описание:</label>
	<textarea name="text" rows="10" cols="17"><?=$cat_info['text'];?></textarea>
	<label for="image">Изображение:</label>
	<? if ($cat_info['image'] != ''): ?>
	<div id="image-tools" name="image-tools">
		<img src="<?=$module->DATA_URL . '/cats/s_' . $cat_info['image'];?>" alt=""/><br/>
		<a href="#" id="delete-image">удалить</a> | <a href="#" id="change-image">изменить</a>
	</div>
	<div class="upload" style="display: none; margin-top: 10px;">
		<div id="image-uploader" class="jqUploader">
			<input name="image" id="image" type="file" />
		</div>
	</div>
	<script language="JavaScript" type="text/javascript">
		$("#change-image").click(function (){
			$("#image-uploader").parent($(".upload")).show();
			return false;
		});
		$("#delete-image").click(function (){
			$.post("<?=$module->AJAX_URL;?>/deletecat_image.php",{cat:<?=$cat_info['id'];?>}, function(data){
				if (data.result == 'ok')
				{
					$("#image-tools").hide();
					$("#image-uploader").parent($(".upload")).show().attr("style","");
				}
				else
				{
					validator.showErrors({"submit":"Невозможно удалить изображение."});
				}
			},'json');
			return false;
		});
	</script>
	<? else: ?>
	<div class="upload">
		<div id="image-uploader" class="jqUploader">
			<input name="image" id="image" type="file" />
		</div>
	</div>
	<? endif; ?>	
	<label for="title">Рейтинг:</label>
	<input type="text" name="rate" value="<?=$cat_info['rate'];?>" maxlength="3" class="digits" />	
	<? if ($module->LEVEL == 3): ?>
		<label for="sect">Раздел:</label>
		<select name="sect">
			<?
				foreach ($sects as $sect_id=>$sect_params)
				{
					if ($sect_id == $cat_info['sect']) echo '<option value="' . $sect_id . '" selected="selected">' . $sect_params['title'] . '</option>';
					else echo '<option value="' . $sect_id . '">' . $sect_params['title'] . '</option>';
				}
			?>
		</select>
	<? endif; ?>
	<button name="submit" type="submit" class="submit">Изменить</button>
</form>
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
			uploadScript:	"<?=$module->AJAX_URL;?>/add_image.php",
			allowedExt:     "*.jpg; *.png; *.gif",
			allowedExtDescr:"Форматы (*.jpg; *.png; *.gif)"
		});
		
		//edit	
		validator = $("form[name='edit']").validate(); 
		$("form[name='edit']").submit(function (){
			submit_form('edit','<?=$module->NAME;?>',function() {
				window.location = document.referrer + '#item' + <?=$item_info['id'];?>;
			});
			return false;
		});	
	});
</script>

<form name="edit" action="" method="post" enctype="multipart/form-data" class="form">
	<input type="hidden" name="item" value="<?=$item_info['id'];?>" />
	<label for="title">Название:</label>
	<input type="text" name="title" value="<?=$item_info['title'];?>" maxlength="255" class="required" />
	<label for="text">Описание:</label>
	<textarea name="text" rows="10" cols="17"><?=$item_info['text'];?></textarea>
	<label for="price">Цена:</label>
	<input type="text" name="price" value="<?=$item_info['price'];?>" maxlength="10" class="number" />
	<label for="image">Изображение:</label>
	<? if ($item_info['image'] != ''): ?>
	<div id="image-tools" name="image-tools">
		<img src="<?=$module->DATA_ITEMS_URL . '/s_' . $item_info['image'];?>" alt=""/><br/>
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
			$.post("<?=$module->AJAX_URL;?>/delete_image.php",{item:<?=$item_info['id'];?>}, function(data){
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
	<input type="text" name="rate" value="<?=$item_info['rate'];?>" maxlength="3" class="digits" />
	<? if ($module->LEVEL == 2): ?>
		<label for="cat">Рубрика:</label>
		<select name="cat">
			<?
				foreach ($cats as $cat_id=>$cat_params)
				{
					if ($cat_id == $item_info['cat']) echo '<option value="' . $cat_id . '" selected="selected">' . $cat_params['title'] . '</option>';
					else echo '<option value="' . $cat_id . '">' . $cat_params['title'] . '</option>';
				}
			?>
		</select>
	<? endif; ?>
	<? if ($module->LEVEL == 3): ?>
		<label for="sect">Раздел:</label>
		<select name="sect">
			<?
				foreach ($sects as $sect_id=>$sect_params)
				{
					if ($sect_id == $item_info['sect']) echo '<option value="' . $sect_id . '" selected="selected">' . $sect_params['title'] . '</option>';
					else echo '<option value="' . $sect_id . '">' . $sect_params['title'] . '</option>';
				}
			?>
		</select>
		<label for="cat">Рубрика:</label>
		<select name="cat"></select>
		<script language="JavaScript" type="text/javascript">
			function get_cat()
			{
				$.post("<?=$module->AJAX_URL;?>/cats.php", {sect:$("select[name='sect']").val()}, function(data){
					if (data.result == 'ok')
					{
						$("select[name='cat']").html();
						jQuery.each(data.cats, function(id, val) {
							if (id == <?=$item_info['cat'];?>) $("select[name='cat']").append('<option value="'+id+'" selected="selected">'+val+'</option>');
							else $("select[name='cat']").append('<option value="'+id+'">'+val+'</option>');
						});

					}
					else alert(data.result);
				},'json');
				return false;
			}
			$().ready(function(){
				get_cat();
				$("select[name='sect']").change(function ()
				{
					get_cat();
					return false;
				});
			});
		</script>
	<? endif; ?>
	<button name="submit" type="submit" class="submit">Изменить</button>
</form>
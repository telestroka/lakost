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
		
		//add	
		validator = $("form[name='add']").validate(); 
		$("form[name='add']").submit(function (){
			submit_form('add','<?=$module->NAME;?>', function() {
				window.location = document.referrer + '#end';
			});
			return false;
		});	
	});
</script>

<form name="add" action="" method="post" enctype="multipart/form-data" class="form">
	<label for="title">Название:</label>
	<input type="text" name="title" value="" maxlength="255" class="required" />
	<label for="text">Описание:</label>
	<textarea name="text" rows="10" cols="17"></textarea>
	<label for="price">Цена:</label>
	<input type="text" name="price" value="" maxlength="10" class="number" />
	<label for="image">Изображение:</label>
	<div class="upload">
		<div id="image-uploader" class="jqUploader">
			<input name="image" id="image" type="file" />
		</div>
	</div>
	<label for="title">Рейтинг:</label>
	<input type="text" name="rate" value="450" maxlength="3" class="digits" />
	<label for="sect">Раздел:</label>
	<select name="sect">
		<?
			foreach ($sects as $sect_id=>$sect_params)
			{
				if (isset($cat) && $sect_id == $cat_info['sect']) echo '<option value="' . $sect_id . '" selected="selected">' . $sect_params['title'] . '</option>';
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
						<? if (isset($cat)): ?>
						if (id == <?=$cat;?>) $("select[name='cat']").append('<option value="'+id+'" selected="selected">'+val+'</option>');
						else 
						<? endif; ?>
						$("select[name='cat']").append('<option value="'+id+'">'+val+'</option>');
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
	<button name="submit" type="submit" class="submit">Добавить</button>
</form>
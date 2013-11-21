<table cellpadding="0" cellspacing="0" class="data-table">
	<?
		if (count($cats))
		{
			foreach ($cats as $cat_id => $cat_params)
			{
				echo '<tr id="cat' . $cat_id . '">';
				echo '<td class="td-image">';
					if ($cat_params['image'] != '') {
						$image = rawurlencode(iconv("UTF-8", "windows-1251", $cat_params['image'])); 
						echo '<a href="' . $module->DATA_URL . '/cats/' . $image . '" rel="lightbox"><img src="' . $module->DATA_URL . '/cats/s_' . $image . '" alt="" class="image-block"/></a>';
					}
				echo '</td>';
				echo '<td><a href="' . $module->URL . '/items.php?cat=' . $cat_id . '">' . $cat_params['title'] . '</a></td>';
					if ($_SESSION['auth']['access'] > 1 || ( $_SESSION['auth']['access'] > 0 && $item_params['user'] == $_SESSION['auth']['id'])) 
						echo '<td class="right"><a href="' . $module->URL . '/editcat.php?cat=' . $cat_id . '">редактировать</td>
							<td class="right"><a class="delete-cat" href="#">удалить</a></td>
							<td class="comment right">' . $cat_params['rate'] . '</td>';
			}
		}
		else echo '<tr><td>Рубрик нет</td></tr>';
	?>
</table>
<? if (isset($pager))$pager->PagerShow();?>

<? if ($_SESSION['auth']['access'] > 1): ?>
	<div class="separator" style="margin-bottom: 20px; margin-left: -130px;"><span></span></div>
	<a href="<?=$module->URL . '/addcat.php?sect=' . $sect . '';?>">Добавить рубрику</a>
	<script language="JavaScript" type="text/javascript">
		$(".delete-cat").click(function (){
			if ( !confirm('Вы действительно хотите удалить рубрику и все ее содержимое?') ) return false;	
			
			var cat = $(this).parents('tr').attr("id").replace("cat","");
			
			$.post("<?=$module->AJAX_URL;?>/deletecat.php",{cat:cat}, function(data){
				if (data.result == 'ok')
				{
					$("#cat"+cat).hide();
				}
				else
				{
					alert("Невозможно удалить рубрику.");
				}
			},'json');
			return false;
		});
	</script>
<? endif; ?>
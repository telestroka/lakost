<table cellpadding="0" cellspacing="0" class="data-table">
	<?
		if (count($sects))
		{
			foreach ($sects as $sect_id => $sect_params)
			{
				echo '<tr id="sect' . $sect_id . '">';
				echo '<td class="td-image">';
					if ($sect_params['image'] != '') echo '<a href="' . $module->DATA_URL . '/cats/' . $sect_params['image'] . '" rel="lightbox"><img src="' . $module->DATA_URL . '/cats/s_' . $sect_params['image'] . '" alt="" class="image-block"/></a>';
				echo '</td>';
				echo '<td><a href="' . $module->URL . '/cats.php?sect=' . $sect_id . '">' . $sect_params['title'] . '</a></td>';
					if ($_SESSION['auth']['access'] > 1 || ( $_SESSION['auth']['access'] > 0 && $item_params['user'] == $_SESSION['auth']['id'])) 
						echo '<td class="right"><a href="' . $module->URL . '/editsect.php?sect=' . $sect_id . '">редактировать</a></td>
							<td class="right"><a class="delete-sect" href="#">удалить</a></td>
							<td class="comment right">' . $sect_params['rate'] . '</td>';
			}
		}
		else echo '<tr><td>Рубрик нет</td></tr>';
	?>
</table>
<?
	if (isset($pager))$pager->PagerShow();
	if ($_SESSION['auth']['access'] > 1) echo '<div class="separator" style="margin-bottom: 20px; margin-left: -130px;"><span></span></div><a href="' . $module->URL . '/addsect.php">Добавить раздел</a>';
?>

<? if ($_SESSION['auth']['access'] > 1): ?>
	
	<script language="JavaScript" type="text/javascript">
		$(".delete-sect").click(function (){
			if ( !confirm('Вы действительно хотите удалить раздел и все его содержимое?') ) return false;	
			
			var sect = $(this).parents('tr').attr("id").replace("sect","");		
			
			$.post("<?=$module->AJAX_URL;?>/deletesect.php",{sect:sect}, function(data){
				if (data.result == 'ok')
				{
					$("#sect"+sect).hide();
				}
				else
				{
					alert("Невозможно удалить раздел.");
				}
			},'json');
			return false;
		});
	</script>
<? endif; ?>
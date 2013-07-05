<?
	if ($_SESSION['auth']['access'] > 1) echo '<a href="' . $module->URL . '">Редактирование разделов</a><br/><br/><br/>';
?>
<?	
	$sects = $sql->SqlGetRows('SELECT * FROM `catalog_sects` ORDER BY rate desc, id;');
	$date = $sql->SqlGetRow('SELECT MAX(date) FROM `catalog_items`');
	$date = $date['MAX(date)'];
	
	foreach ($sects as $sect_id => $sect_params)
	{
		if (
			($page->NAME == 'cats' && $sect_id == $sect) ||
			($page->NAME == 'items' && $sect_id == $cat_info['sect'])
			) echo '<b style="color: #0093DD;">' . $sect_params['title'] . '</b><br/>';
        else echo '<a href="/catalog/cats.php?sect=' . $sect_id . '">' . $sect_params['title'] . '</a><br/>';
	}
?>
<br/><br/><b>
Цены по состоянию <br/> на ФЕВРАЛЬ 2013</b><!--?=date('m.Y',strtotime($date));?-->
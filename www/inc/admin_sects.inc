<?
	foreach ($sects_info as $id => $sect_params)
	{
		echo '<a href="' . $site->PAGES['admin_goods_sect']['url'] . '?sect=' . $id . '">' . $sect_params['title'] . '</a><br/>';
	}
?>
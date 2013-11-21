<?php
	require_once('init.inc');
	
	//pager
	require_once($site->PATH . '/lib/pager.class');
	
	if ($module->LEVEL > 1)
	{
		if (
			!isset($_GET['cat']) ||
			!preg_match('/^\d+$/',$_GET['cat'])
			)
			$site->SiteGoTo($module->URL);
		
		$cat = $_GET['cat'];
		$cat_info = $sql->SqlGetRow('SELECT * FROM `' . $module->NAME . '_cats` WHERE id = "' . $cat . '";');
		if (!count($cat_info)) $site->SiteGoTo($module->URL);			
		
		//items
		$pager = new Pager($sql->SqlGetCount('SELECT count(id) FROM `' . $module->NAME . '_items` WHERE cat="' . $cat . '"'),100);	
		$items = $sql->SqlGetRows('SELECT * FROM `' . $module->NAME . '_items` WHERE cat="' . $cat . '" ORDER BY rate desc, id LIMIT ' . ($pager->PAGER['start']-1) . ',' . $pager->PAGER['show'] . ';');
		
		$page = new Page('items',$cat_info['title']);
	}
	else
	{
		$pager = new Pager($sql->SqlGetCount('SELECT count(id) FROM `' . $module->NAME . '_items`'),100);	
		$items = $sql->SqlGetRows('SELECT * FROM `' . $module->NAME . '_items` ORDER BY id LIMIT ' . ($pager->PAGER['start']-1) . ',' . $pager->PAGER['show'] . ';');
		
		$page = new Page('items','');
	}
	
	include($site->PATH . '/tpl/main.tpl');
?>
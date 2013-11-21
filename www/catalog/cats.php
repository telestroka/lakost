<?php
	require_once('init.inc');
	
	//pager
	require_once($site->PATH . '/lib/pager.class');	
	
	if ($module->LEVEL > 2)
	{
		if (
			!isset($_GET['sect']) ||
			!preg_match('/^\d+$/',$_GET['sect'])
			)
			$site->SiteGoTo($module->URL);
		
		$sect = $_GET['sect'];
		$sect_info = $sql->SqlGetRow('SELECT * FROM `' . $module->NAME . '_sects` WHERE id = "' . $sect . '";');
		if (!count($sect_info)) $site->SiteGoTo($module->URL);			
		
		//cats
		$pager = new Pager($sql->SqlGetCount('SELECT count(id) FROM `' . $module->NAME . '_cats` WHERE sect="' . $sect . '"'),100);	
		$cats = $sql->SqlGetRows('SELECT * FROM `' . $module->NAME . '_cats` WHERE sect="' . $sect . '" ORDER BY rate desc, id LIMIT ' . ($pager->PAGER['start']-1) . ',' . $pager->PAGER['show'] . ';');
		
		$page = new Page('cats',$sect_info['title']);
	}
	else
	{
		//cats
		$pager = new Pager($sql->SqlGetCount('SELECT count(id) FROM `' . $module->NAME . '_cats`'),100);	
		$cats = $sql->SqlGetRows('SELECT * FROM `' . $module->NAME . '_cats` ORDER BY id LIMIT ' . ($pager->PAGER['start']-1) . ',' . $pager->PAGER['show'] . ';');
			
		$page = new Page('cats','');
	}	
	
	include($site->PATH . '/tpl/main.tpl');
?>
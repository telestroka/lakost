<?php
	require_once('init.inc');
	
	if ( !isset($_GET['item']) || !preg_match('/^\d+$/',$_GET['item']) ) $site->SiteGoTo($module->URL);
	
	$item_info = $sql->SqlGetRow('SELECT * FROM `' . $module->NAME . '_items` WHERE id = "' . $_GET['item'] . '";');
	if (!$item_info) $site->SiteGoTo($module->URL);
		
	$page = new Page('item',$item_info['title']);
	
	include($site->PATH . '/tpl/main.tpl');
?>
<?php
	require_once('init.inc');
	$page = new Page('edit','Редактирование');
	
	require_once($site->PATH . '/lib/fs.class');
	require_once($site->PATH . '/lib/image.class');
		
	if ( !isset($_GET['item']) || !preg_match('/^\d+$/',$_GET['item']) ) $site->SiteGoTo($module->URL);
	
	if ($module->LEVEL == 2) $cats = $sql->SqlGetRows('SELECT * FROM `' . $module->NAME . '_cats`;');
	if ($module->LEVEL == 3) $sects = $sql->SqlGetRows('SELECT * FROM `' . $module->NAME . '_sects`;');	
	$item_info = $sql->SqlGetRow('SELECT * FROM `' . $module->NAME . '_items` WHERE id = "' . $_GET['item'] . '";');
	if (!$item_info) $site->SiteGoTo($module->URL);
	if (!$site->SiteCheckAccess($item_info['user'])) $site->SiteGoTo($module->URL);
	
	foreach ($item_info as $param => $value) $item_info[$param] = htmlspecialchars($value, ENT_QUOTES);
			
	include($site->PATH . '/tpl/main.tpl');            
?>
<?php
	require_once('init.inc');
	$page = new Page('editcat','Редактирование рубрики');
	
	require_once($site->PATH . '/lib/fs.class');
	require_once($site->PATH . '/lib/image.class');
		
	if ( !isset($_GET['cat']) || !preg_match('/^\d+$/',$_GET['cat']) ) $site->SiteGoTo($module->URL);
	if ($module->LEVEL == 3)	$sects = $sql->SqlGetRows('SELECT * FROM `' . $module->NAME . '_sects`;');	
	$cat_info = $sql->SqlGetRow('SELECT * FROM `' . $module->NAME . '_cats` WHERE id = "' . $_GET['cat'] . '";');
	if (!$cat_info) $site->SiteGoTo($module->URL);
	if ($_SESSION['auth']['access'] < 2) $site->SiteGoTo($module->URL);
	
	foreach ($cat_info as $param => $value) $cat_info[$param] = htmlspecialchars($value, ENT_QUOTES);
	
	include($site->PATH . '/tpl/main.tpl');            
?>
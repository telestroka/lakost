<?php
	require_once('init.inc');
	$page = new Page('editsect','Редактирование раздела');
	
	require_once($site->PATH . '/lib/fs.class');
	require_once($site->PATH . '/lib/image.class');
		
	if ( !isset($_GET['sect']) || !preg_match('/^\d+$/',$_GET['sect']) ) $site->SiteGoTo($module->URL);
	$sect_info = $sql->SqlGetRow('SELECT * FROM `' . $module->NAME . '_sects` WHERE id = "' . $_GET['sect'] . '";');
	if (!$sect_info) $site->SiteGoTo($module->URL);
	if ($_SESSION['auth']['access'] < 2) $site->SiteGoTo($module->URL);
	
	foreach ($sect_info as $param => $value) $sect_info[$param] = htmlspecialchars($value, ENT_QUOTES);
	
	include($site->PATH . '/tpl/main.tpl');            
?>
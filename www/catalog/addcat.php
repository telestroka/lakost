<?php
	require_once('init.inc');
	$page = new Page('addcat','Добавление рубрики');
	
	require_once($site->PATH . '/lib/fs.class');
	require_once($site->PATH . '/lib/image.class');
	
	if ($module->LEVEL == 3)	$sects = $sql->SqlGetRows('SELECT * FROM `' . $module->NAME . '_sects`;');
	
	//set sect if defined
	if (isset($_GET['sect']) && preg_match('/^\d+$/',$_GET['sect']))
	{
		$sect_info = $sql->SqlGetRow('SELECT * FROM `' . $module->NAME . '_sects` WHERE id = "' . $_GET['sect'] . '";');
		if (count($sect_info)) $sect = $_GET['sect'];
	}
	
	include($site->PATH . '/tpl/main.tpl');            
?>
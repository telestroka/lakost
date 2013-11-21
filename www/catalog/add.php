<?php
	require_once('init.inc');
	$page = new Page('add','Добавление');
	
	require_once($site->PATH . '/lib/fs.class');
	require_once($site->PATH . '/lib/image.class');
	require_once($site->PATH . '/lib/confirm.class');
	$confirm = new Confirm;
	
	if ($module->LEVEL == 2)	$cats = $sql->SqlGetRows('SELECT * FROM `' . $module->NAME . '_cats`;');
	if ($module->LEVEL == 3)	$sects = $sql->SqlGetRows('SELECT * FROM `' . $module->NAME . '_sects`;');
	
	//set cat if defined
	if (isset($_GET['cat']) && preg_match('/^\d+$/',$_GET['cat']))
	{
		$cat_info = $sql->SqlGetRow('SELECT * FROM `' . $module->NAME . '_cats` WHERE id = "' . $_GET['cat'] . '";');
		if (count($cat_info)) $cat = $_GET['cat'];
	}
	
	include($site->PATH . '/tpl/main.tpl');            
?>
<?php
	require_once('init.inc');
	$page = new Page('sects','');
	
	//pager
	require_once($site->PATH . '/lib/pager.class');
	
	//sects
	$pager = new Pager($sql->SqlGetCount('SELECT count(id) FROM `' . $module->NAME . '_sects`'),100);	
	$sects = $sql->SqlGetRows('SELECT * FROM `' . $module->NAME . '_sects` ORDER BY id LIMIT ' . ($pager->PAGER['start']-1) . ',' . $pager->PAGER['show'] . ';');
	
	include($site->PATH . '/tpl/main.tpl');
?>
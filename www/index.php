<?php
	require_once('inc/init.inc');
	$module = new Module('', '');
	$page = new Page();	
	
	//sql
	require_once($site->PATH . '/lib/sql.class');
	$sql = new Sql;
	
	$sects = $sql->SqlGetRows('SELECT * FROM `catalog_sects` ORDER BY rate desc, id;');
	
	include($site->PATH . '/tpl/first.tpl');
?>
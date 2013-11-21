<?php
	require_once($_SERVER["DOCUMENT_ROOT"] . '/inc/init.inc'); 
	$module = new Module('catalog', 'Каталог', 3);
	
	//sql
	require_once($site->PATH . '/lib/sql.class');
	$sql = new Sql;
?>
<?php
	require_once($_SERVER["DOCUMENT_ROOT"] . '/inc/init.inc'); 
	$module = new Module('users', 'Пользователи');
	
	//sql
	require_once($site->PATH . '/lib/sql.class');
	$sql = new Sql;
?>
<?php
	require_once('init.inc');
	$page = new Page('edit','Редактирование данных пользователя');
	
	if ( $_SESSION['auth']['access'] < 1 ) $site->SiteGoTo('/');
	
	$item_info = $sql->SqlGetRow('SELECT * FROM `' . $module->NAME . '` WHERE id = "' . $_SESSION['auth']['id'] . '";');
	
	foreach ($item_info as $param => $value) $item_info[$param] = htmlspecialchars($value, ENT_QUOTES);
	
	include($site->PATH . '/tpl/main.tpl');            
?>
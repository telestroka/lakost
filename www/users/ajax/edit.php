<?php
	require_once('../init.inc');
	
	if ( $_SESSION['auth']['access'] < 1 ) exit($site->CONFIG['messages']['json_error']);	
	
	$item_info = $sql->SqlGetRow('SELECT * FROM ' . $module->NAME . ' WHERE id = "' . $_SESSION['auth']['id'] . '";');
	if (!$item_info) exit($site->CONFIG['messages']['json_error']);
	
	$field_names = array('title','password','email');
	$required_fields = array('title','email');
	$fields = array();
	
	foreach ($field_names as $field)
	{
		if (!isset($_POST[$field])) exit($site->CONFIG['messages']['json_error']);
		$fields[$field] = $_POST[$field];
	}
	
	//validate
	require_once($site->PATH . '/inc/validate.inc');
	
	//validate user
	$result = $sql->SqlCountRows('SELECT * FROM users WHERE `title`="' . $sql->SqlPrepare($fields['title']) . '" and `id` !="' . $item_info['id'] . '";');
	if ($result) exit('{"result":"error","errors":{"title":"Пользователь с таким логином уже зарегистрирован. Придумайте другой логин."}}');
	
	
	//prepare
	$fields['password'] = ($fields['password'] != '') ? md5($fields['password']) : $item_info['password'];
	
	$values = $params = array();
	foreach ($fields as $param => $value)
	{
		$values[] = '`' . $param . '`="' . $sql->SqlPrepare($value) . '"';
		$_SESSION['auth'][$param] = $value;
	}
		
	$sql->SqlExecute('UPDATE `' . $module->NAME . '` SET ' . implode(',', $values) . ' WHERE id="' . $item_info['id'] . '";');
	
	exit('{"result":"ok"}');
?>
<?php
	require_once('../init.inc');	
	
	$field_names = array('title','password','email');
	$required_fields = array('title','password','email');
	$fields = array();
	
	foreach ($field_names as $field)
	{
		if (!isset($_POST[$field])) exit($site->CONFIG['messages']['json_error']);
		$fields[$field] = $_POST[$field];
	}
	
	//validate
	require_once($site->PATH . '/inc/validate.inc');
	
	//validate user
	$result = $sql->SqlCountRows('SELECT * FROM users WHERE `title`="' . $sql->SqlPrepare($fields['title']) . '";');
	if ($result) exit('{"result":"error","errors":{"title":"Пользователь с таким логином уже зарегистрирован. Придумайте другой логин."}}');
	
	//additional info	
	$fields['ip'] = $_SERVER['REMOTE_ADDR'];
	$fields['date'] = date('Y-m-d');
	
	
	//sql
	$fields['password'] = md5($fields['password']);
	
	$values = $params = array();
	foreach ($fields as $param => $value)
	{
		$values[] = '"' . $sql->SqlPrepare($value) . '"';
		$params[] = '`' . $param . '`';
		$_SESSION['auth'][$param] = $value;
	}
	$sql->SqlExecute('INSERT INTO `' . $module->NAME . '` (' . implode(',', $params) . ') values(' . implode(',', $values) . ');');
	$_SESSION['auth']['access'] = 1;
	$_SESSION['auth']['id'] = $sql->SqlLastId();
		
	exit('{"result":"ok"}');
?>
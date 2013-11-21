<?php
	require_once('../init.inc');	
	
	if ( !isset($_POST['sect']) || !preg_match('/^\d+$/',$_POST['sect']) ) exit($site->CONFIG['messages']['json_error']);
	$sect_info = $sql->SqlGetRow('SELECT * FROM `' . $module->NAME . '_sects` WHERE id = "' . $_POST['sect'] . '";');
	if (!$sect_info) exit($site->CONFIG['messages']['json_error']);
	if ($_SESSION['auth']['access'] < 2) exit($site->CONFIG['messages']['json_error']);
	
	$field_names = array('title','text','image','rate');
	$required_fields = array('title');
	$fields = array();
	
	foreach ($field_names as $field)
	{
		if ($field == 'image')
		{
			if (isset($_POST[$field])) $fields[$field] = md5($_POST[$field]) . '.' . end(explode(".", $_POST[$field]));
			else $fields[$field] = '';
			if ($fields[$field] == '' && $sect_info[$field] != '') $fields[$field] = $sect_info[$field];
		}
		else
		{
			if (!isset($_POST[$field])) exit($site->CONFIG['messages']['json_error']);
			$fields[$field] = $_POST[$field];
		}
	}	
	
	//validate
	require_once($site->PATH . '/inc/validate.inc');
	
	
	//prepare	
	$values = $params = array();
	foreach ($fields as $param => $value)
		$values[] = '`' . $param . '`="' . $sql->SqlPrepare($value) . '"';
		
	$sql->SqlExecute('UPDATE `' . $module->NAME . '_sects` SET ' . implode(',', $values) . ' WHERE id="' . $sect_info['id'] . '";');
	
	exit('{"result":"ok"}');
?>
<?php
	require_once('../init.inc');
	
	$field_names = array('title','text','image','rate');
	$required_fields = array('title');
	$fields = array();
	
	foreach ($field_names as $field)
	{
		if ($field == 'image')
		{
			if (isset($_POST[$field])) $fields[$field] = md5($_POST[$field]) . '.' . strtolower(end(explode(".", $_POST[$field])));
			else $fields[$field] = '';
		}
		else
		{
			if (!isset($_POST[$field])) exit($site->CONFIG['messages']['json_error']);
			$fields[$field] = $_POST[$field];
		}
	}
	
	//validate
	require_once($site->PATH . '/inc/validate.inc');
	
	//additional info	
	if ( !isset($fields['rate']) || $fields['rate'] == '' ) $fields['rate'] = 450;
	
	
	//sql
	$values = $params = array();
	foreach ($fields as $param => $value)
	{
		$values[] = '"' . $sql->SqlPrepare($value) . '"';
		$params[] = '`' . $param . '`';
	}
	$sql->SqlExecute('INSERT INTO `' . $module->NAME . '_sects` (' . implode(',', $params) . ') values(' . implode(',', $values) . ');');
	
	exit('{"result":"ok"}');
?>
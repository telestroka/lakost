<?php
	require_once('../init.inc');
	
	$field_names = array('title','text','price','image','rate');
	$required_fields = array('title');	
	if ($module->LEVEL > 1)
	{
		$field_names[] = 'cat';
		$required_fields[] = 'cat';
	}
	if ($module->LEVEL > 2)
	{
		$field_names[] = 'sect';
		$required_fields[] = 'sect';
	}
	$fields = array();
	
	foreach ($field_names as $field)
	{
		if ($field == 'image' || $field == 'file')
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
	if ($_SESSION['auth']['id'] > 0) $fields['user'] = $_SESSION['auth']['id'];
	$fields['ip'] = $_SERVER['REMOTE_ADDR'];
	if ( isset($fields['date']) && $fields['date'] != '' ) $fields['date'] = date('Y-m-d',strtotime($fields['date']));
	else $fields['date'] = date('Y-m-d');
	if ( !isset($fields['rate']) || $fields['rate'] == '' ) $fields['rate'] = 450;
	
	
	//sql
	if ( isset($fields['url']) )
	{
		$fields['url'] = str_replace('http://', '', $fields['url']);
		if ($fields['url'] != '') $fields['url'] = 'http://' . $fields['url'];
	}
	$values = $params = array();
	foreach ($fields as $param => $value)
	{
		$values[] = '"' . $sql->SqlPrepare($value) . '"';
		$params[] = '`' . $param . '`';
	}
	$sql->SqlExecute('INSERT INTO `' . $module->NAME . '_items` (' . implode(',', $params) . ') values(' . implode(',', $values) . ');');
	
	exit('{"result":"ok"}');
?>
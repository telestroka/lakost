<?php
	require_once('../init.inc');	
	
	if ( !isset($_POST['cat']) || !preg_match('/^\d+$/',$_POST['cat']) ) exit($site->CONFIG['messages']['json_error']);
	$cat_info = $sql->SqlGetRow('SELECT * FROM `' . $module->NAME . '_cats` WHERE id = "' . $_POST['cat'] . '";');
	if (!$cat_info) exit($site->CONFIG['messages']['json_error']);
	if ($_SESSION['auth']['access'] < 2) exit($site->CONFIG['messages']['json_error']);
	
	$field_names = array('title','text','image','rate');
	$required_fields = array('title');
	if ($module->LEVEL > 2)
	{
		$field_names[] = 'sect';
		$required_fields[] = 'sect';
	}
	$fields = array();
	
	foreach ($field_names as $field)
	{
		if ($field == 'image')
		{
			if (isset($_POST[$field])) $fields[$field] = md5($_POST[$field]) . '.' . end(explode(".", $_POST[$field]));
			else $fields[$field] = '';
			if ($fields[$field] == '' && $cat_info[$field] != '') $fields[$field] = $cat_info[$field];
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
		
	$sql->SqlExecute('UPDATE `' . $module->NAME . '_cats` SET ' . implode(',', $values) . ' WHERE id="' . $cat_info['id'] . '";');
	
	exit('{"result":"ok"}');
?>
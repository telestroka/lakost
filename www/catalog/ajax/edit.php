<?php
	require_once('../init.inc');	
	
	if ( !isset($_POST['item']) || !preg_match('/^\d+$/',$_POST['item']) ) exit($site->CONFIG['messages']['json_error']);
	$item_info = $sql->SqlGetRow('SELECT * FROM `' . $module->NAME . '_items` WHERE id = "' . $_POST['item'] . '";');
	if (!$item_info) exit($site->CONFIG['messages']['json_error']);
	if (!$site->SiteCheckAccess($item_info['user'])) exit($site->CONFIG['messages']['json_error']);
	
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
			if (isset($_POST[$field])) $fields[$field] = md5($_POST[$field]) . '.' . end(explode(".", $_POST[$field]));
			else $fields[$field] = '';
			if ($fields[$field] == '' && $item_info[$field] != '') $fields[$field] = $item_info[$field];
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
	if ( isset($fields['url']) )
	{
		$fields['url'] = str_replace('http://', '', $fields['url']);
		if ($fields['url'] != '') $fields['url'] = 'http://' . $fields['url'];
	}
	
	$values = $params = array();
	foreach ($fields as $param => $value)
		$values[] = '`' . $param . '`="' . $sql->SqlPrepare($value) . '"';
		
	$sql->SqlExecute('UPDATE `' . $module->NAME . '_items` SET ' . implode(',', $values) . ' WHERE id="' . $item_info['id'] . '";');
	
	exit('{"result":"ok"}');
?>
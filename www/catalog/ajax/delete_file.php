<?php
	require_once('../init.inc');
			
	if ( !isset($_POST['item']) || !preg_match('/^\d+$/',$_POST['item']) ) exit($site->CONFIG['messages']['json_error']);	
	
	$item_info = $sql->SqlGetRow('SELECT * FROM ' . $module->NAME . ' WHERE id = "' . $_POST['item'] . '";');
	if (!$item_info) exit($site->CONFIG['messages']['json_error']);
	if (!$site->SiteCheckAccess($item_info['user'])) exit($site->CONFIG['messages']['json_error']);
	
	$sql->SqlExecute('UPDATE `' . $module->NAME . '_items` SET file="" WHERE id="' . $_POST['item'] . '";');
	exit('{"result":"ok"}');
?>
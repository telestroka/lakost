<?php
	require_once('../init.inc');
	
	if ( !isset($_POST['cat']) || !preg_match('/^\d+$/',$_POST['cat']) ) exit($site->CONFIG['messages']['json_error']);		
	
	$cat_info = $sql->SqlGetRow('SELECT * FROM `' . $module->NAME . '_cats` WHERE id = "' . $_POST['cat'] . '";');
	if (!$cat_info) exit($site->CONFIG['messages']['json_error']);
	if ($_SESSION['auth']['access'] < 2) exit($site->CONFIG['messages']['json_error']);
	
	$sql->SqlExecute('DELETE FROM `' . $module->NAME . '_items` WHERE cat="' . $_POST['cat'] . '";');
	$sql->SqlExecute('DELETE FROM `' . $module->NAME . '_cats` WHERE id="' . $_POST['cat'] . '";');
	exit('{"result":"ok"}');
?>
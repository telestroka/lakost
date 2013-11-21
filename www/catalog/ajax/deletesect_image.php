<?php
	require_once('../init.inc');
			
	if ( !isset($_POST['sect']) || !preg_match('/^\d+$/',$_POST['sect']) ) exit($site->CONFIG['messages']['json_error']);	
	
	$sect_info = $sql->SqlGetRow('SELECT * FROM `' . $module->NAME . '_sects` WHERE id = "' . $_POST['sect'] . '";');
	if (!$sect_info) exit($site->CONFIG['messages']['json_error']);
	if ($_SESSION['auth']['access'] < 2) exit($site->CONFIG['messages']['json_error']);
	
	$sql->SqlExecute('UPDATE `' . $module->NAME . '_sects` SET image="" WHERE id="' . $_POST['sect'] . '";');
	exit('{"result":"ok"}');
?>
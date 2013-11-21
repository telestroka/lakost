<?php
	require_once('../init.inc');
	
	if ( !isset($_POST['sect']) || !preg_match('/^\d+$/',$_POST['sect']) ) exit;
	$sects = $sql->SqlGetRows('SELECT id,title FROM `' . $module->NAME . '_cats` WHERE sect="' . $_POST['sect'] . '";');
	
	$json = array();
	foreach ( $sects as $id => $param )
		$json[] = '"' . $id . '":"' . htmlspecialchars($param['title']) . '"';	
	
	exit('{"result":"ok",cats:{' . implode(',', $json) . '}}');
?>
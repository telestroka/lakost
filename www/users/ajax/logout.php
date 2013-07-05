<?php
	require_once('../init.inc');	
	
	if ( !isset($_SESSION) ) session_start();
	unset($_SESSION['auth']);
	$_SESSION['auth'] = array ('id' => 0, 'title' => 'Гость', 'access' => '0');	
	exit($site->CONFIG['messages']['json_ok']);
?>
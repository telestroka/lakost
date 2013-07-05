<?php
	require_once('../inc/init.inc');	
	
	$_SESSION['auth'] = array ('id' => 1, 'title' => 'Администратор', 'access' => '2');
	
	$site->SiteGoTo('/catalog/sects.php');
?>
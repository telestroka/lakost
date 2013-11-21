<?php
	require_once('init.inc');
	$page = new Page('addsect','Добавление раздела');
	
	require_once($site->PATH . '/lib/fs.class');
	require_once($site->PATH . '/lib/image.class');
	
	include($site->PATH . '/tpl/main.tpl');            
?>
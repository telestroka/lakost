<?php
	require_once('../init.inc');
	
	if ( 
			!isset($_FILES['Filedata']['name']) ||
			$_FILES['Filedata']['name'] == '' ||
			$_FILES['Filedata']['error'] > 0 ||
			$_FILES['Filedata']['size'] < 1 ||
			$_FILES['Filedata']['size'] > 1048576
		) exit ('0');
		
		$name = md5($_FILES['Filedata']['name']) . '.' . end(explode(".", $_FILES['Filedata']['name']))
			
		move_uploaded_file ($_FILES['Filedata']['tmp_name'], $module->DATA_ITEMS_PATH . '/' . $name);
?>
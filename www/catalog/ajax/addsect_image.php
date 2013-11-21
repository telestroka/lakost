<?php
	require_once('../init.inc');
	
	require_once($site->PATH . '/lib/image.class');
	
	if ( 
			!isset($_FILES['Filedata']['name']) ||
			$_FILES['Filedata']['name'] == '' ||
			$_FILES['Filedata']['error'] > 0 ||
			$_FILES['Filedata']['size'] < 1 ||
			$_FILES['Filedata']['size'] > 1048576 ||
			!Image::ImageType($_FILES['Filedata']['tmp_name'])
		) exit ('0');
	
		$path = $module->DATA_SECTS_PATH . '/';
		$name = md5($_FILES['Filedata']['name']) . '.' . Image::ImageType($_FILES['Filedata']['tmp_name']);
		
		move_uploaded_file ($_FILES['Filedata']['tmp_name'], $path . $name);
		Image::ImageCreatePreview($path . $name, $path . 's_' . $name, 100);	
?>
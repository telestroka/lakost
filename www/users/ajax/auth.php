<?php	require_once('../init.inc');			if ( !isset($_POST['title']) || !isset($_POST['password']) ) exit($site->CONFIG['messages']['json_error']);			$user_info = $sql->SqlGetRow('SELECT * FROM users WHERE `title`="' . $sql->SqlPrepare($_POST['title']) . '" and password="' . md5($_POST['password']) . '";');	if (count($user_info))	{		$_SESSION['auth'] = $user_info;		exit($site->CONFIG['messages']['json_ok']);	}	exit('{"result":"error","errors":{"submit":"Неверный логин или пароль"}}');?>
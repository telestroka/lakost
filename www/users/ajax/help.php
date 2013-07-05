<?php
	require_once('../init.inc');	
	
	if (!isset($_POST['email'])) exit($site->CONFIG['messages']['json_error']);
	$email = $_POST['email'];
	
	//validate
	require_once('../../lib/validate.class');
	$errors = array();
	
	//validate	
	$error = Validate::ValidateEmail($email);
	if ($error) exit('{"result":"error","errors":{"email":"' . $error . '"}}');
		
	$item_info = $sql->SqlGetRow('SELECT * FROM `' . $module->NAME . '` WHERE `email`="' . $sql->SqlPrepare($email) . '";');
	if (!$item_info) exit('{"result":"error","errors":{"email":"Пользователей с таким адресом не зарегистрировано"}}');
		
	$password = mt_rand(0, 9999999999);
	$sql->SqlExecute('UPDATE `' . $module->NAME . '` SET password = "' . md5($password) . '" WHERE id = "' . $item_info['id'] . '";');
	$message = 'Доступ к сайту ' . $_SERVER['HTTP_HOST'] . ': ' . "\r\n\r\n" . 'Логин: ' . $item_info['title'] . "\r\n" . 'Пароль: ' . $password . "\r\n\r\n" . 'После входа, вы можете изменить пароль на странице ' . $module->URL . '/edit.php';
					
	
	require_once($site->PATH . '/lib/mail.class');
	$mail = new Mail;
	$mail->Mailer($email, 'Пароль для ' . $_SERVER['HTTP_HOST'], $message);
		
	exit('{"result":"ok"}');
?>
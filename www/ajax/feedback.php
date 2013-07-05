<?php
	require_once($_SERVER["DOCUMENT_ROOT"] . '/inc/init.inc'); 
	$module = new Module('feedback', 'Обратная связь');	
	
	$field_names = array('title','text','email','code','cipher');
	$required_fields = array('title','text','email','code','cipher');
	$fields = array();
	
	foreach ($field_names as $field)
	{
		if (!isset($_POST[$field])) exit($site->CONFIG['messages']['json_error']);
		$fields[$field] = $_POST[$field];
	}
	
	//validate
	require_once($site->PATH . '/inc/validate.inc');
	
	//confirm
	require_once($site->PATH . '/lib/confirm.class');
	$confirm = new Confirm;
	$error = $confirm->ConfirmValidate($fields['code'], $fields['cipher']);
	if ($error) exit('{"result":"error","errors":{"code":"' . $error . '"}}');
	unset($fields['code']); unset($fields['cipher']);
	
	//additional info	
	if ($_SESSION['auth']['id'] > 0) $fields['user'] = $_SESSION['auth']['id'];
	$fields['ip'] = $_SERVER['REMOTE_ADDR'];	
	
	//mail
	require_once($site->PATH . '/lib/mail.class');
	$mail = new Mail;
	$message = '';
	foreach ($fields as $param => $value) $message .= $value . "\r\n";
	$mail->Mailer($site->EMAIL_OWNER, $site->TITLE . '::' . $module->TITLE, $message, $fields['email']);
	//$mail = new Mail;
	//$mail->Mailer('bvpensk@yandex.ru', $site->TITLE . '::' . $module->TITLE, $message, $fields['email']);
	
	exit('{"result":"ok"}');
?>
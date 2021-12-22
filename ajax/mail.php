<?php
	$username =trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
	$email =trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
	$mess =trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));
	
	$error = '';
	if(strlen($username) <=2)
		$error = 'Введите имя, оно меньше 3 знаков';
	else if(strlen($email) <=7)
		$error = 'Введите email, он меньше 8 знаков';
	else if(strlen($mess) <=2)
		$error = 'Введите само сообщение, оно меньше 3 знаков';
	
	if($error != ''){
		echo $error;
		exit();
	}
	$my_email = "test@mail.ru";
	$subject = "=?utf-8?B?".base64_encode("Новое сообщение с сайта")."?=";
	$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";
	
	mail($my_email, $subject, $mess, $headers);
	
	echo 'Готово';
?>
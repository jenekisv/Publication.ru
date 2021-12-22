<?php
	$username =trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
	$email =trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
	$login =trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
	$pass =trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));
	
	$error = '';
	if(strlen($username) <=2)
		$error = 'Введите имя, оно меньше 3 знаков';
	else if(strlen($email) <=7)
		$error = 'Введите email, он меньше 8 знаков';
	else if(strlen($login) <=2)
		$error = 'Введите login, он меньше 3 знаков';
	else if(strlen($pass) <=7)
		$error = 'Введите пароль, он меньше 8 знаков';
	
	if($error != ''){
		echo $error;
		exit();
	}
	$hash = "jnwyerqpYRQYluhiao76458991";
	$pass = md5($pass . $hash);
	
	include_once '../mysql_connect.php';

	$sql = 'INSERT INTO users(name, email, login, pass) VALUES(?, ?, ?, ?)';
	$query = $pdo->prepare($sql);
	$query->execute([$username, $email, $login, $pass]);
	
	echo 'Готово';
?>
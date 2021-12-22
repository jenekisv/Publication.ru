<?php
	$title =trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
	$intro =trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
	$text =trim(filter_var($_POST['text'], FILTER_SANITIZE_STRING));
	//$text =trim($_POST['text']); // Чтобы можно было использовать html в тексте
	
	$error = '';
	if(strlen($title) <=2)
		$error = 'Введите название статьи, оно меньше 3 знаков';
	else if(strlen($intro) <=14)
		$error = 'Введите интро для статьи, оно меньше 15 знаков';
	else if(strlen($text) <=19)
		$error = 'Введите текст для статьи, он меньше 20 знаков';
	
	if($error != ''){
		echo $error;
		exit();
	}
	
	include_once '../mysql_connect.php';

	$sql = 'INSERT INTO articles(title, intro, text, date, avtor) VALUES(?, ?, ?, ?, ?)';
	$query = $pdo->prepare($sql);
	$query->execute([$title, $intro, $text, time(), $_COOKIE['login']]);
	
	echo 'Готово';
?>
<?php
	$user = 'root';
	$password ='';
	$db ='publication';
	$host ='localhost';
	
	$dsn = 'mysql:host='.$host.';dbname='.$db;
	$pdo = new PDO($dsn, $user, $password);
?>
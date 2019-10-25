<?php
	include('database.php');
	session_start();
	if ($_POST['password_1'] != $_POST['password_2'])
		die("Passwords do not match");
	try {
		$connection = new PDO("mysql:host=$my_server;dbname=$my_db", $my_user, $my_pswd);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "INSERT INTO Users(firstname, lastname, username, email, password) VALUES ('{$_POST[firstname]}', '{$_POST[lastname]}', '{$_POST[username]}', '{$_POST[email]}', '{$_POST[password_1]}')";
		$connection->exec($sql);
	}
	catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	header('Location: ../index.php');
?>
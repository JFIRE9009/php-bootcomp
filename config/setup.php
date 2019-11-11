<?php
	require('./database.php');
	// require('./connect.php');
	session_start();
	try
	{
		$connection = new PDO("mysql:host=$my_server", $my_user, $my_pswd);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE DATABASE $my_db";
		$connection->exec($sql);
		echo "Database created successfully<br>";
	}
	catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}
	try
	{
		$connection = new PDO("mysql:host=$my_server;dbname=$my_db", $my_user, $my_pswd);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE TABLE Users (
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			firstname VARCHAR(100) NOT NULL,
			lastname VARCHAR(100) NOT NULL,
			username VARCHAR(100) UNIQUE NOT NULL,
			email VARCHAR(100) UNIQUE NOT NULL,
			password VARCHAR(100) NOT NULL,
			vkey VARCHAR(32) NOT NULL,
			verified BOOLEAN NOT NULL
			)";
		echo "User table created successfully<br>";
		$connection->exec($sql);
	}
	catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}
	try
	{
		$connection = new PDO("mysql:host=$my_server;dbname=$my_db", $my_user, $my_pswd);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE TABLE Gallery (
			uid INT(11) NOT NULL,
			username VARCHAR(100) NOT NULL,
			imgFullNameGallery LONGTEXT NOT NULL,
			orderGallery LONGTEXT NOT NULL
			)";
		echo "Gallery table created successfully<br>";
		$connection->exec($sql);
	}
	catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}
	try
	{
		$connection = new PDO("mysql:host=$my_server;dbname=$my_db", $my_user, $my_pswd);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE TABLE Likes (
			uid INT(11) NOT NULL,
			likes INT(11) NOT NULL
			)";
		echo "Likes table created successfully<br>";
		$connection->exec($sql);
	}
	catch(PDOException $e)
	{
		echo $sql . "<br>" . $e->getMessage();
	}
	$connection = null;
?>
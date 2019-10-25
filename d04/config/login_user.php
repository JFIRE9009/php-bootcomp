<?php
	include('database.php'); 
	session_start();
	try
	{
		$connection = new PDO("mysql:host=$my_server;dbname=$my_db", $my_user, $my_pswd);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$query = "SELECT * FROM users WHERE username = :username AND password = :password";
		$statement = $connect->prepare($query);

		$statement->execute
		(
			array (
				'username' => trim($_POST['username']),
				'password' => trim($_POST['password'])
			)
		);

		$count = $statement->rowCount();
		if ($count > 0)
		{
			$_SESSION["username"] = $_POST['username'];
			header("location: ../index.php");
		}
		else
		{
			$message = '<label>Wrong Data</label>';
		}
	}
	catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
?>
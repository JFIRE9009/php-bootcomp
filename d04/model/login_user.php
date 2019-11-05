<?php
	require('../config/connect.php');
	session_start();

	try
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "SELECT * FROM users WHERE username = :username AND password = :password";
		$statement = $connection->prepare($query);
		$statement->bindParam(':username', $username);
		$statement->bindParam(':password', $password);
		$statement->execute();

		$count = $statement->rowCount();
		if ($count > 0)
		{
			$_SESSION["loggedin"] = "true";
			$_SESSION["username"] = $username;
			header("location: ../index.php");
		}
		else
		{
			$message = '<label>Wrong Data</label>';
			echo $message;
		}
	}
	catch(PDOException $e) {
		echo "Connecation Failed:" . $sql . "<br>" . $e->getMessage();
	}
	$connection = null;
?>
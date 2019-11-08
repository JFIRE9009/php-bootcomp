<?php
	session_start();
	require('../config/connect.php');

	if (isset($_GET['email']))
	{
		var_dump($vpass = $_GET['hash']);
		var_dump($vkey = $_GET['vkey']);
		var_dump($email = $_GET['email']);

		// $statement = $connection->prepare("UPDATE users SET password = :vpass WHERE email = :email");
		// $statement->bindParam(':password', $vpass);
		// $statement->bindParam(':email', $email);
		// $statement->bindParam(':vkey', $vkey);
		// $statement->execute();
		// header("Location: ../index.php");
		echo "Your password has been changed";
	}
	else
		echo "You doing something dirty?";
?>
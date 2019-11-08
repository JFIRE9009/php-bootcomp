<?php
	session_start();
	require('../config/connect.php');

	if ($_SESSION["loggedin"] = true)
	{
		$vpass = $_GET['hash'];
		$vkey = $_GET['vkey'];
		$email = $_GET['email'];

		$statement = $connection->prepare("UPDATE users SET password = :vpass WHERE email = :email and vkey = :vkey");
		$statement->bindParam(':vpass', $vpass);
		$statement->bindParam(':email', $email);
		$statement->bindParam(':vkey', $vkey);
		$statement->execute();
		// header("Location: ../index.php");
		echo "Your password has been changed";
	}
	else
		header("Location: ../login.php");
?>
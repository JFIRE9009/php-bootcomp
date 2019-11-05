<?php
	session_start();
	require('../config/connect.php');

	if (isset($_SESSION['vpass']) && $_GET['email'])
	{
		$vpass = $_SESSION['vpass'];
		$statement = $connection->prepare("UPDATE users SET password = :password WHERE email = '$_GET[email]'");
		$statement->bindParam(':password', $vpass);
		$statement->execute();
	}
	else
		echo "You doing something dirty?"
?>
<?php
	require('../config/connect.php');
	
	$vpass = $_GET['hash'];
	$vkey = $_GET['vkey'];
	try
	{
		$statement = $connection->prepare("UPDATE `users` SET `password` = :vpass WHERE  `vkey` = :vkey");
		$statement->bindParam(':vpass', $vpass);
		$statement->bindParam(':vkey', $vkey);
		$statement->execute();
	}
	catch (PDOException $e)
	{
		die(http_response_code(204));
	}
	header("Location: ../index.php");
?>
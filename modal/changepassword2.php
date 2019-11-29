<?php
	require('../config/connect.php');
	
	$vpass = $_GET['hash'];
	$vkey = $_GET['vkey'];

	$statement = $connection->prepare("UPDATE `users` SET `password` = :vpass WHERE  `vkey` = :vkey");
	$statement->bindParam(':vpass', $vpass);
	$statement->bindParam(':vkey', $vkey);
	$statement->execute();
	header("Location: ../index.php");
?>
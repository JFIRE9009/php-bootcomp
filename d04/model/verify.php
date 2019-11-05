<?php
	session_start();
	require('../config/connect.php');

	try
	{
		$statement = $connection->prepare("UPDATE users SET verified = 1 WHERE vkey = '$_GET[vkey]'");
		$statement->execute();
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}
?>
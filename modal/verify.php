<?php
	require('../config/connect.php');

	try
	{
		$vkey = $_GET['vkey'];
		$stmt = $connection->prepare("SELECT `verified` FROM `users` WHERE `vkey` = ?");
		$stmt->execute(array($vkey));
		if ($stmt->fetchColumn() == 1)
			echo "Your account is already verified";
		else
		{
			$statement = $connection->prepare("UPDATE `users` SET `verified` = 1 WHERE `vkey` = :vkey");
			$statement->bindParam(':vkey', $vkey);
			$statement->execute();
			$stmt = $connection->prepare("SELECT `verified` FROM `users` WHERE `vkey` = ?");
			$stmt->execute(array($vkey));
			if ($stmt->fetchColumn() == "1")
				header("../gallery.php");
			else
				echo "Something went wrong";
		}
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}
?>
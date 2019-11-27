<?php
	require('../config/connect.php');
	try
	{
		if (!$_SESSION['loggedin'] || $_SESSION['loggedin'] == false)
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$query = $connection->prepare("SELECT * FROM `users` WHERE `username` = ?");
			$query->execute(array($username));
			$result = $query->fetch(PDO::FETCH_ASSOC);
			if (password_verify($password, $result['password']))
			{
				$count = $query->rowCount();
				if ($count > 0)
				{
					if ($result['verified'] === "1")
					{
						$stmt = $connection->prepare("SELECT `id` from `users` WHERE `username` = ?");
						$stmt->execute(array($username));
						$_SESSION["uid"] = $stmt->fetchColumn();
						$_SESSION["loggedin"] = true;
						$_SESSION["username"] = $username;
						header("location: ../index.php");
					}
					else if ($result['verified'] === "0")
						die ("Please verify your account");
				}
				else
				{
					$message = '<label>Wrong Data</label>';
					echo $message;
				}
			}
			else
				echo "Wrong Data";
		}
		else
			echo "You are already logged in";
	}
	catch(PDOException $e) {
		echo "Connecation Failed:" . $sql . "<br>" . $e->getMessage();
	}
	$connection = null;
?>
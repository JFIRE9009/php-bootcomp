<?php
	require('../config/connect.php');
	try
	{
		if (!$_SESSION['loggedin'] || $_SESSION['loggedin'] == false)
		{
			$username = htmlentities($_POST['username']);
			$password = htmlentities($_POST['password']);
			
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
					}
					else if ($result['verified'] === "0")
						die (http_response_code(201)); //verify acc
				}
				else
					die (http_response_code(202)); //Wrong data
			}
			else
				die (http_response_code(202)); //Username / password incorrect
		}
		else
			die (http_response_code(203)); //already logged in
	}
	catch(PDOException $e) {
		echo "Connecation Failed:" . $sql . "<br>" . $e->getMessage();
	}
	$connection = null;
?>
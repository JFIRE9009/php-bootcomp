<?php
	require('./../config/connect.php');
	
	$uid = $_SESSION['uid'];
	$email = htmlspecialchars($_POST['email']);
	$username = htmlspecialchars($_POST['username']);
	$password_1 = $_POST['password_1'];
	$password_2 = $_POST['password_2'];

	if (empty($password_2))
		die (http_response_code(299));
	if (!$username && !$email && !$password_1)
		die (http_response_code(201));
	try
	{
		$stmt = $connection->prepare("SELECT `password` FROM `users` WHERE `id` = ?");
		$stmt->execute(array($uid));

		$hash = $stmt->fetchColumn();
		var_dump(password_verify($password_2, $hash));
		if (!password_verify($password_2, $hash))
			die (http_response_code(202));
	}
	catch (PDOException $e)
	{
		die ($e->getMessage());
	}
	
	if (!empty($username))
	{
		try 
		{
			$stmt = $connection->prepare("UPDATE `users` SET `username` = ? WHERE `id` = ?");
			$stmt->execute(array($username, $uid));
		}
		catch (PDOException $e) 
		{
			if ($e->getCode() == 23000)
				die (http_response_code(203));
			else
				echo $sql . "<br>" . $e->getMessage();
		}
	}
	if (!empty($email))
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			die (http_response_code(204));
		try 
		{
			$stmt = $connection->prepare("UPDATE `users` SET `email` = ? WHERE `id` = ?");
			$stmt->execute(array($email, $uid));
		}
		catch (PDOException $e) 
		{
			if ($e->getCode() == 23000)
				die (http_response_code(206));
			else
				echo $sql . "<br>" . $e->getMessage();
		}
	}
	if (!empty($password_1))
	{
		if (strlen($password_1) < 8)
			die (http_response_code(207));
		$safety1 = preg_match('@[A-Z]@', $password_1);
		$safety2 = preg_match('@[a-z]@', $password_1);
		$safety3 = preg_match('@[0-9]@', $password_1);
		$safety4 = preg_match('@[^\w]@', $password_1);
		if (!$safety1 || !$safety2 || !$safety3 || !$safety4)
			die (http_response_code(208));
		$hash = password_hash($password_1, PASSWORD_BCRYPT);
		try 
		{
			$stmt = $connection->prepare("UPDATE `users` SET `password` = ? WHERE `id` = ?");
			$stmt->execute(array($hash, $uid));
			echo "Password changed";
		}
		catch (PDOException $e) 
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	}
	$connection = null;
?>
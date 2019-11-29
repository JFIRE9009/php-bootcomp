<?php
	require('./../config/connect.php');
	
	$uid = $_SESSION['uid'];
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$password = $_POST['password'];

	if (!$username && !$email && !$password)
		die ("Please edit at least one of the fields");
	
	if ($username)
	{
		try 
		{
			$stmt = $connection->prepare("UPDATE `users` SET `username` = ? WHERE `id` = ?");
			$stmt->execute(array($username, $uid));
			echo "Username changed";
		}
		catch (PDOException $e) 
		{
			if ($e->getCode() == 23000)
				echo "Username already in use\n";
			else
				echo $sql . "<br>" . $e->getMessage();
		}
	}
	if ($email)
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			die ("Please enter a valid E-Mail address");
		try 
		{
			$stmt = $connection->prepare("UPDATE `users` SET `email` = ? WHERE `id` = ?");
			$stmt->execute(array($email, $uid));
			echo "Email changed";
		}
		catch (PDOException $e) 
		{
			if ($e->getCode() == 23000)
				echo "E-Mail already in use";
			else
				echo $sql . "<br>" . $e->getMessage();
		}
	}
	if ($password)
	{
		if (strlen($password) < 8)
			die("Your password is too short!");
		$safety1 = preg_match('@[A-Z]@', $password);
		$safety2 = preg_match('@[a-z]@', $password);
		$safety3 = preg_match('@[0-9]@', $password);
		$safety4 = preg_match('@[^\w]@', $password);
		if (!$safety1 || !$safety2 || !$safety3 || !$safety4)
			die ("Your password must contain at least one lowercase letter, one uppercase letter, and one special character");
		$hash = password_hash($password, PASSWORD_BCRYPT);

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
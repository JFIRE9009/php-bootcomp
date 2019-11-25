<?php
	require('./../config/connect.php');

	$firstname = htmlspecialchars($_POST['firstname']);
	$lastname = htmlspecialchars($_POST['lastname']);
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);

	$hash = password_hash($_POST['password_1'], PASSWORD_BCRYPT);
	$vkey = md5($_POST['username']);
	$img .= "<img src='./../img/profile_pictures/default.png' alt = 'img'/>";
	$img_str = base64_encode($img);

	$message = "
		Thanks for signing up!
		Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
		
		Hi! .$_POST[username].
		E-Mail: '.$_POST[email].'
		..............................
		Please click this link to activate your account:
		http://localhost:8080/camagru/modal/verify.php?vkey=$vkey
	";

	try 
	{
		$sql = "INSERT INTO `users`(`firstname`, `lastname`, `username`, `email`, `password`, `vkey`, `verified`, `notifications`, `dp`) VALUES (:firstname, :lastname, :username, :email, :hash, :vkey, 0, 0, :dp)";
		$statement = $connection->prepare($sql);
		$statement->bindParam(':firstname', $firstname);
		$statement->bindParam(':lastname', $lastname);
		$statement->bindParam(':username', $username);
		$statement->bindParam(':email', $email);
		$statement->bindParam(':hash', $hash);
		$statement->bindParam(':vkey', $vkey);
		$statement->bindParam(':dp', $img_str);
		$statement->execute();
		if ($count = $statement->rowCount())
		{
			session_start();
			$query = $connection->prepare("SELECT `id` FROM `users` WHERE `username` = :username");
			$query->bindParam(":username", $username);
			$query->execute();
			$_SESSION['id'] = $query->fetchColumn();
			$_SESSION['vpass'] = $vkey;
			mail($email, Confirmation, $message, 'From noreply@cascade.com');
			echo "An email with a verification link has been sent to you.";
		}
		else
			echo "Something went wrong";
	}
	catch(PDOException $e) 
	{
		if ($e->getCode() == 23000)
			echo "Duplicate info";
		else
			echo $sql . "<br>" . $e->getMessage();
	}
	/* 
	if ($sql)
		header('Location: ../login.php'); */
	$connection = null;
?>
<?php
	require('./../config/connect.php');
	session_start();
	
	if ($_POST['password_1'] != $_POST['password_2'])
		die("Passwords do not match");

	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	$firstname = htmlspecialchars($_POST['firstname']);
	$email = htmlspecialchars($_POST['email']);
	$lastname = htmlspecialchars($_POST['lastname']);
	$hash = password_hash($_POST['password_1'], PASSWORD_BCRYPT);
	$vkey = md5($_POST['username']);

	$message = "
		Thanks for signing up!
		Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
		
		Hi! .$_POST[username].
		E-Mail: '.$_POST[email].'
		..............................
		Please click this link to activate your account:
		http://localhost:8080/d04/model/verify.php?vkey=$vkey
	";

	try 
	{
		$sql = "INSERT INTO Users(firstname, lastname, username, email, password, vkey, verified) VALUES ('{$_POST[firstname]}', '{$_POST[lastname]}', '{$_POST[username]}', '{$_POST[email]}', '$hash', '$vkey', 0)";
		mail("{$_POST[email]}", Confirmation, $message, 'From noreply@cascade.com');
		$statement = $connection->prepare($sql);
		$statement->bindParam(':username', $username);
		$statement->bindParam(':password', $password);
		$statement->bindParam(':firstname', $firstname);
		$statement->bindParam(':lastname', $lastname);
		$email = htmlspecialchars($_POST['email']);
		$statement->execute();
		echo "An email with a verification link has been sent to you.";
	}
	catch(PDOException $e) {
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
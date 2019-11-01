<?php
	require('./../config/connect.php');
	session_start();
	if ($_POST['password_1'] != $_POST['password_2'])
		die("Passwords do not match");
	$hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$message = "
		Thanks for signing up!
		Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
		
		------------------------
		Username: '.$_POST[username].'
		Password: '.$_POST[password].'
		------------------------
		
		Please click this link to activate your account:
		http://localhost:8080/d04/model/input_user.php?email='.$email.'&hash='.$hash.
	";

	try 
	{
		$sql = "INSERT INTO Users(firstname, lastname, username, email, password) VALUES ('{$_POST[firstname]}', '{$_POST[lastname]}', '{$_POST[username]}', '{$_POST[email]}', '$hash')";
		mail("{$_POST[email]}", Confirmation, $message, 'From noreply@cascade.com');
		$statement = $connection->prepare($sql);
		$statement->bindParam(':username', $username);
		$statement->bindParam(':password', $password);
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
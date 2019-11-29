<?php
	require('./../config/connect.php');
	
	$firstname = htmlspecialchars($_POST['firstname']);
	$lastname = htmlspecialchars($_POST['lastname']);
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$password = $_POST['password_1'];
	$confirmpassword = $_POST['password_2'];
	
	if ($password != $confirmpassword)
		die("Your passwords do not match");
	if (!$username || !$firstname || !$lastname || !$email || !$password || !$confirmpassword)
		die("Please fill in all the fields");
	if (strlen($password) < 8)
		die("Your password is too short!");
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		die ("Please enter a valid E-Mail address");
	$safety1 = preg_match('@[A-Z]@', $password);
	$safety2 = preg_match('@[a-z]@', $password);
	$safety3 = preg_match('@[0-9]@', $password);
	$safety4 = preg_match('@[^\w]@', $password);
	if (!$safety1 || !$safety2 || !$safety3 || !$safety4)
		die ("Your password must contain at least one lowercase letter, one uppercase letter, and one special character");
	$hash = password_hash($password, PASSWORD_BCRYPT);
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
	catch (PDOException $e) 
	{
		if ($e->getCode() == 23000)
			echo "Username or email already in use";
		else
			echo $sql . "<br>" . $e->getMessage();
	}
	$connection = null;
?>
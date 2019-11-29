<?php
	require("../config/connect.php");

	$hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$email = $_POST['email'];
	try
	{
		$stmt = $connection->prepare("SELECT `vkey` FROM `users` WHERE `email` = ?");
		$stmt->execute(array($email));
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}
	$vkey = $stmt->fetchColumn();

	$message = "
	Change password by clicking link.
	------------------------
	E-Mail: ".$email."
	------------------------
	
	Please click this link to change your password:
	'http://localhost:8080/camagru/modal/changepassword2.php?vkey=".$vkey."&hash=".$hash."
	";
	mail($email, Confirmation, $message, 'From noreply@cascade.com');
	echo "<label class = pop>An E-Mail has been sent for confirmation</label>";
?>
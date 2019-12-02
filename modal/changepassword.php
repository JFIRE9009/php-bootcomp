<?php
	require("../config/connect.php");

    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
	if (strlen($password) < 8)
		die (http_response_code(201));
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		die (http_response_code(202));
	$safety1 = preg_match('@[A-Z]@', $password);
	$safety2 = preg_match('@[a-z]@', $password);
	$safety3 = preg_match('@[0-9]@', $password);
	$safety4 = preg_match('@[^\w]@', $password);
	if (!$safety1 || !$safety2 || !$safety3 || !$safety4)
		die (http_response_code(203));

	$hash = password_hash($password, PASSWORD_BCRYPT);
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
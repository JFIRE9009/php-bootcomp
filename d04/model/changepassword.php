<?php
	session_start();
	$_SESSION['vpass'] = $_POST['password'];
	$email = $_POST['email'];
		$message = "
		Change password by clicking link.
		------------------------
		Username: '.$_POST[username].'
		E-Mail: '.$_POST[email].'
		------------------------
		
		Please click this link to activate your account:
		http://localhost:8080/d04/model/changepassword2.php?email=$email
	";
	mail($_POST['email'], Confirmation, $message, 'From noreply@cascade.com');
?>
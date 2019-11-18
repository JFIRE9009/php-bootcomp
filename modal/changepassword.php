<?php
	session_start();
	if (isset($_SESSION["loggedin"]))
	{
		$hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$email = $_POST['email'];
		$vkey = $_SESSION['vpass'];
			$message = "
			Change password by clicking link.
			------------------------
			Username: '.$_POST[username].'
			E-Mail: '.$email.'
			------------------------
			
			Please click this link to change your password:
			http://localhost:8080/camagru/modal/changepassword2.php?email=$email&vkey=$vkey&hash=$hash
		";
		mail($_POST['email'], Confirmation, $message, 'From noreply@cascade.com');
		echo "<label class = pop>An E-Mail has been sent for confirmation</label>";
	}
	else
		echo "You are not logged in";
?>
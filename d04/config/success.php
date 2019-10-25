<?php
	session_start();

	if (isset($_SESSION["username"]))
	{
		echo '<h3>Login Success</h3>'.$_SESSION["username"].'</h3>';
		echo '<br /><a href = "logout.php">Logout</a>';
	}
	else
		header("location:login_user.php");
?>
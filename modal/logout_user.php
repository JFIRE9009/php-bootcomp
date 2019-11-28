<?php
	session_start();
	if (isset($_SESSION["loggedin"]))
	{
		$_SESSION["loggedin"] = false;
		session_destroy();
		echo "You have successfully logged out";
	}
	else
		echo "You are not logged in";
	header("location: ../login.php");
?>
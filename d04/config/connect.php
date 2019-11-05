<?php
	session_start();
	require('database.php');
	$connection = new PDO("mysql:host=$my_server;dbname=$my_db", $my_user, $my_pswd);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
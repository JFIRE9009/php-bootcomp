<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Camagru</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel = "stylesheet" href = "css/main.css">
		<link rel = "stylesheet"  href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel = "stylesheet" href = "https://fonts.googleapis.com/css?family=Liu+Jian+Mao+Cao&display=swap">
		<link rel = "stylesheet"  href = "https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap">
	</head>
	<body>
   		<?php require("header.php"); ?>
		<?php
			if ($_SESSION["username"]) 
				echo "<a class = 'welcome'>Welcome $_SESSION[username]!</a> ";
		?>
	</body>
</html>
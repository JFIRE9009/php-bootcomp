<?php session_start(); ?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>login</title>
		<link rel = "stylesheet" href = "css/main.css">
	</head>
		<body>	
    		<?php require("header.php"); ?>
			<br>
			<form class = "login_form" action = "./modal/login_user.php" method = "POST">
				<table>
					<div class = "container" style = "background-color:#f1f1f1">
						<tr><td><img class ="title" src = "img/randoms/13_profile-512.png"><span class = "br"><input class = "fill" type = "text" placeholder = "Enter Username" name = "username" required></td></tr>
						<tr><td><img  class = "title" src = "img/randoms/21_lock-512.png"><span class = "br"><input class = "fill" placeholder = "Enter Password" type = "password" name = "password" required></td></tr>
					</div>
				</table>
				<button type = "submit" name = "login_btn" class = "login_btn">Login</button>
			</form>
		</body>
	</html>
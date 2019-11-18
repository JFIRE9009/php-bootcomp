<?php session_start(); ?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>login</title>
		<link rel = "stylesheet" href = "css/login.css">
	</head>
		<body>	
    		<?php require("header.php"); ?>
			<br>
			<form action = "./modal/login_user.php" method = "POST">
				<table>
					<div class = "container" style = "background-color:#f1f1f1">
						<tr><td><img class ="title" src = "img/randoms/13_profile-512.png"><label></label><input class = "fill" type = "text" placeholder = "Enter Username" name = "username" required></td></tr>
						<tr><td><img  class = "title" src = "img/randoms/21_lock-512.png"><label></label><input class = "fill" placeholder = "Enter Password" type = "password" name = "password" required></td></tr>
						<tr><td><button type = "submit" name = "login_btn">Login</button></td></tr>
						<tr><td><button type = "button" style.display = "none" class="cancelbtn">Cancel</button></td></tr>
					</div>
				</table>
			</form>
		</body>
	</html>
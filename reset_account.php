<?php require("header.php"); ?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>login</title>
		<link rel = "stylesheet" href = "css/main.css">
	</head>
		<body>	
			<br>
			<form class = "reset_form" action = "./modal/changepassword.php" method = "POST">
				<table>
					<h3>Enter email to change password</h3>
					<div class = "container" style = "background-color:#f1f1f1">
						<tr><td><img class ="title" src = "img/randoms/13_profile-512.png"><input class = "fill" type = "email" placeholder = "Enter Email" name = "email" required></td></tr>
						<tr><td><img  class = "title" src = "img/randoms/21_lock-512.png"><input class = "fill" placeholder = "Enter New Password" type = "password" name = "password" required></td></tr>
						<tr><td><button type = "submit" name = "format_btn"class = "format_btn">Format</button></td></tr>
					</div>
				</table>
			</form>
		</body>
	</html>
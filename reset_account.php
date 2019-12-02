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
			<div class = "reset_form">
				<table>
					<h3>Enter email to change password</h3>
					<div id = "error"> </div>
					<div class = "container" style = "background-color:#f1f1f1">
						<tr><td><img class ="title" src = "img/randoms/13_profile-512.png"><input id = "email" class = "fill" type = "email" placeholder = "Enter Email" name = "email" required></td></tr>
						<tr><td><img  class = "title" src = "img/randoms/21_lock-512.png"><input id = "password" pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title = "Must contain at least eight characters and one number, one uppercase letter, one lowercase letter, and one special character" class = "fill" placeholder = "Enter New Password" type = "password" name = "password" required></td></tr>
						<tr><td><button type = "submit" name = "format_btn" class = "format_btn" onclick = "reset_validate()">Format</button></td></tr>
					</div>
				</table>
			</div>
		</body>
	</html>
<?php require("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel = "stylesheet" href = "css/main.css">
		<script src = './controller/script.js'></script>
		<title>Register</title>
	</head>
	<body>
		<form class = "reg_form" action = "" method = "POST" onsubmit = "register()">
			<table>
				<h2>Sign-Up</h2>
				<tr><td><span class = "br"></span><input placeholder = "Enter Name Here" type = "text" name = "firstname" id = "firstname" required></td></tr>
				<tr><td><span class = "br"></span><input placeholder = "Enter Surname Here" type = "text" name = "lastname" id = "surname" required></td></tr>
				<tr><td><span class = "br"></span><input placeholder = "Enter Username Here" type = "text" name = "username" id = "username" required></td></tr>
				<tr><td><span class = "br"></span><input placeholder = "Enter E-Mail Here" type = "email" name = "email" id = "email" required></td></tr>
				<tr><td><span class = "br"></span><input placeholder = "Enter Password Here" type = "password" id = "password_1" pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title = "Must contain at least eight characters and one number, one uppercase letter, one lowercase letter, and one special character" id = "pass_1" name = "password_1" required></td></tr>
				<tr><td><span class = "br"></span><input placeholder = "Confirm Password" type = "password" id = "password_2" pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title = "Must contain at least eight characters and one number, one uppercase letter, one lowercase letter, and one special character" id = "pass_2" name = "password_2" required></td></tr>
				<tr><td><span class = "br"></span><button class = "reg_btn" type = "submit" id = "register_btn" name = "register_btn">Register</button></td></tr>
				<div class = "reg_submit">
					<label class = "account">Already have an account?</label>
					<button type = "button"><a class = "reg_submit_btn" href = "login.php">Login</a></button>
					<button type = "button"><a class = "reg_submit_btn" href = "./reset_account.php">Forgotten password?</a></button>
				</div>
			</table>
		</form>
	</body>
</html>
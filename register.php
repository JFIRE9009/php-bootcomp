<?php require("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel = "stylesheet" href = "css/main.css">
		<title>Register</title>
	</head>
	<body>
		<form class = "reg_form" action = "./modal/input_user.php" method = "POST">
			<div class = "container"></div>
				<table>
					<h2>Sign-Up</h2>
					<tr><td><br><input placeholder = "Enter Name Here" type = "text" name = "firstname" required></td></tr>
					<tr><td><br><input placeholder = "Enter Surname Here" type = "text" name = "lastname" required></td></tr>
					<tr><td><br><input placeholder = "Enter Username Here" type = "text" name = "username" required></td></tr>
					<tr><td><br><input placeholder = "Enter E-Mail Here" type = "email" name = "email" required></td></tr>
					<tr><td><br><input placeholder = "Enter Password Here" pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})" title = "Must contain at least eight characters and one number, one uppercase letter, one lowercase letter, and one special character" type = "password" id = "pass_1" name = "password_1" required></td></tr>
					<tr><td><br><input placeholder = "Confirm Password" pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})" type = "password" id = "pass_2" name = "password_2" required></td></tr>
					<tr><td><br><button class = "reg_btn" type = "submit" name = "register_btn">Register</button></td></tr>
					<div class = "reg_submit">
						<label class = "">Already have an account?</label>
						<button type = "button"><a class = "reg_submit_btn" href = "login.php">Login</a></button>
						<button type = "button"><a class = "reg_submit_btn" href = "./reset_account.php">Forgotten password?</a></button>
					</div>
				</table>
			</div>
		</form>
		<div class = "footer">Cascade</div>
	</body>
</html>
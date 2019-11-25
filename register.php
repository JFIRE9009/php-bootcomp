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
    	<?php require("header.php"); ?>
		<form class = "reg_form" action = "./modal/input_user.php" method = "POST">
			<table>
				<div class="container">
					<tr><td><label>Name</label><input class = "" type = "text" name = "firstname" required></td></tr>
					<tr><td><label>Surname</label><input class = "" type = "text" name = "lastname" required></td></tr>
					<tr><td><label>Username</label><input class = "" type = "text" name = "username" required></td></tr>
					<tr><td><label>E-mail</label><input class = "" type = "email" name = "email" required></td></tr>
					<tr><td><label>Password</label><input class = "" type = "password" name = "password_1" required></td></tr>
					<tr><td><label>Confirm password</label><input class = "" type="password" name = "password_2" required></td></tr>
					<tr><td><button type="submit" name="register_btn">Register</button></td></tr>
					<div class = "reg_submit">
						<label>Already have an account?</label>
						<button type="button"><a href="login.php">Login</a></button>
						<button type="button"><a href="./reset_account.php">Forgotten password?</a></button>
					</div>
					</tr>
				</div>
			</table>
		</form>
	</body>
</html>
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
			<div class="login_form">
				<table>
					<div id = "error"> </div>
					<div class = "container" style = "background-color:#f1f1f1">
						<tr><td><img class = "title" src = "img/randoms/13_profile-512.png"><span class = "br"><input id = "username" class = "fill" type = "text" placeholder = "Enter Username" name = "username" required></td></tr>
						<tr><td><img  class = "title" src = "img/randoms/21_lock-512.png"><span class = "br"><input id = "password" class = "fill" placeholder = "Enter Password" type = "password" name = "password" pattern = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title = "Must contain at least eight characters and one number, one uppercase letter, one lowercase letter, and one special character" required></td></tr>
						<button type = "submit" name = "login_btn" class = "login_btn" onclick = "login_validate()">Login</button>
					</div>
					<div class = "reg_submit">
						<label class = "account">Need an account?</label>
						<button type = "button"><a class = "reg_submit_btn" href = "register.php">Register</a></button>
						<button type = "button"><a class = "reg_submit_btn" href = "./reset_account.php">Forgotten password?</a></button>
					</div>
				</table>
			</div>
		</body>
	</html>
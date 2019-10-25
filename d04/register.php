<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register</title>
</head>
<body>
	<form action = "./config/input_user.php" method = "POST">
		<table>
			<tr><td><label>Name</label><input type="text" name = "firstname" required></td></tr>
			<tr><td><label>Surname</label><input type="text" name = "lastname" required></td></tr>
			<tr><td><label>Username</label><input type="text" name = "username" required></td></tr>
			<tr><td><label>E-mail</label><input type="text" name = "email" required></td></tr>
			<tr><td><label>Password</label><input type="password" name = "password_1" required></td></tr>
			<tr><td><label>Confirm password</label><input type="password" name = "password_2" required></td></tr>
			<tr><td><button type="submit" name="register_btn">Register</button></td></tr>
			<label>Already have an account?</label>
			<button type="button"><a href="login.php">Login</a></button>
			<button type="button"><a href="./config/reset_account.php">Forgotten password?</a></button>
			</tr>
		</table>
	</form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel = "stylesheet" href = "css/login.css">
		<title>Register</title>
	</head>
	<body>
		<header class = "header">
				<nav class = "nav_links">
					<ul>
					<li><a href = "index.php">Home</a></li>
					<li><a href = "gallery.php">Gallery</a></li>
					<li><a href = "profile.php">Profile</a></li>
					<li class = "Logo"><a href = "index.php"><img src = "img/randoms/Birdy.png" alt = " " class = "White"><img class = "Black" src = "img/Birdy.png" alt = ""></a></li>
					<li><a href = "#">Register</a></li>
					<li><?php if (!$_SESSION['loggedin'] || $_SESSION['loggedin'] === false){ echo "<a href = 'login.php'>Login</a>";}; ?></li>
					<li><?php if ($_SESSION['loggedin'] && $_SESSION['loggedin'] === true){ echo "<a href = './model/logout_user.php'>Logout</a>";}; ?></li>
					<li><a href = "#">Settings</a></li>
					</ul>
					<a class = "nav_icon" href = ""><span></span><span></span><span></span></a>
				</nav>
			</header>
			<form class = "reg_form" action = "./model/input_user.php" method = "POST">
				<table>
					<div class="container">
						<tr><td><label class = "">Name</label><input class = "" type = "text" name = "firstname" required></td></tr>
						<tr><td><label class = "">Surname</label><input class = "" type = "text" name = "lastname" required></td></tr>
						<tr><td><label class = "">Username</label><input class = "" type = "text" name = "username" required></td></tr>
						<tr><td><label class = "">E-mail</label><input class = "" type = "email" name = "email" required></td></tr>
						<tr><td><label class = "">Password</label><input class = "" type = "password" name = "password_1" required></td></tr>
						<tr><td><label class = "">Confirm password</label><input class = "" type="password" name = "password_2" required></td></tr>
						<tr><td><button type="submit" name="register_btn">Register</button></td></tr>
						<label>Already have an account?</label>
						<button type="button"><a href="login.php">Login</a></button>
						<button type="button"><a href="./reset_account.php">Forgotten password?</a></button>
						</tr>
					</div>
				</table>
			</form>
	</body>
</html>
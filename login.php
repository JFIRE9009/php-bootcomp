<?php session_start(); ?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>login</title>
		<link rel = "stylesheet" href = "css/login.css">
	</head>
		<body>	
		<header class = "header">
			<nav class = "nav_links">
				<ul>
					<li><a href = "index.php">Home</a></li>
					<li><a href = "gallery.php">Gallery</a></li>
					<li><a href = "profile.php">Profile</a></li>
					<li class = "Logo"><a href = "index.php"><img src = "img/randoms/Birdy.png" alt = " " class = "White"><img class = "Black" src = "img/Birdy.png" alt = ""></a></li>
					<li><a href = "register.php">Register</a></li>
					<li><a href = "#">Login</a></li>
					<li><a href = "#">Settings</a></li>
					<!-- <li><a href = "./model/logout_user.php">Logout</a></li> -->
				</ul>
				<a class = "nav_icon" href = ""><span></span><span></span><span></span></a>
			</nav>
		</header>
			<br>
			<form action = "./model/login_user.php" method = "POST">
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
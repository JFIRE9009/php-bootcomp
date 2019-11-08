<?php
	if ($_SESSION['loggedin'] = false)
	{
		die ("You must be logged in to view this page");
	}
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel = "stylesheet" href = "css/style.css">
		<title>Document</title>
	</head>
	<body>
		<header class = "header">
				<nav class = "nav_links">
					<ul>
						<li><a href = "index.php">Home</a></li>
						<li><a href = "">Gallery</a></li>
						<li><a href = "profile.php">Profile</a></li>
						<li class = "Logo"><a href = "index.php"><img src = "img/Birdy.png" alt = " " class = "White"><img class = "Black" src = "img/Birdy.png" alt = ""></a></li>
						<li><a href = "login.php">Login</a></li>
						<li><a href = "register.php">Register</a></li>
						<li><a href = "./model/logout_user.php">Logout</a></li>
					</ul>
					<a class = "nav_icon" href = ""><span></span><span></span><span></span></a>
				</nav>
		</header>
		<h1>Snap an Image!</h1>
		<div class = "wc_header"></div>
		<div class = "wc_top_container">
			<video id = "video">Not available...</video>
			<button id = "photo_button" class = "btn_dark">Take Photo</button>
			<button id = "clear_button">Clear</button>
			<canvas id = "canvas"></canvas>
		</div>
		<div class = "bottom_container">
			<div id = "photos"></div>
		</div>
		<script src = "./controller/main.js"></script>
	</body>
</html>
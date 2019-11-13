<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Camagru</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel = "stylesheet" href = "css/style.css">
		<link rel = "stylesheet"  href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel = "stylesheet" href = "https://fonts.googleapis.com/css?family=Liu+Jian+Mao+Cao&display=swap">
		<link rel = "stylesheet"  href = "https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap">
	</head>
	<body>
	<header class = "header">
			<nav class = "nav_links">
				<ul>
					<li><a href = "#">Home</a></li>
					<li><a href = "gallery.php">Gallery</a></li>
					<li><a href = "profile.php">Profile</a></li>
					<li class = "Logo"><a href = "index.php"><img src = "img/randoms/Birdy.png" alt = " " class = "White"><img class = "Black" src = "img/Birdy.png" alt = ""></a></li>
					<li><a href = "register.php">Register</a></li>
					<li><?php if (!$_SESSION['loggedin'] || $_SESSION['loggedin'] === false){ echo "<a href = 'login.php'>Login</a>";}; ?></li>
					<li><?php if ($_SESSION['loggedin'] && $_SESSION['loggedin'] === true){ echo "<a href = './model/logout_user.php'>Logout</a>";}; ?></li>
					<li><a href = "#">Settings</a></li>
				</ul>
				<a class = "nav_icon" href = ""><span></span><span></span><span></span></a>
			</nav>
		</header>
		<?php
			session_start();
			if ($_SESSION["username"]) 
				echo "<a class = 'welcome'>Welcome $_SESSION[username]!</a> ";
		?>
		<div style = "height: 500px;"></div>
		<div class = "side_nav">
			<div class = "side_logo"><a href = ""><img src = "img/random/Birdy.png" alt = ""></a></div>
			<nav class = "nav_links2">
				<ul>
					<li><a href = ""><span>01.</span>Home</a></li>
					<li><a href = ""><span>02.</span>Gallery</a></li>
					<li><a href = ""><span>03.</span>Profile</a></li>
					<li><a href = ""><span>04.</span>Settings</a></li>
				</ul>
			</nav>                                                                                                                                                                                                                                                                              
			<ul class="social_icons list_inline">
				<li><a href = ""><i class = "fa fa-facebook"></i></a></li>
				<li><a href = ""><i class = "fa fa-twitter"></i></a></li>
				<li><a href = ""><i class = "fa fa-instagram"></i></a></li>
			</ul>
			<div class="corner_circle"> 
				<a href = "" class = "nav_close "><span></span><span></span></a>
			</div>
		</div>
		<script src = "php/edits.js"></script>
		<script src = "https://code.jquery.com/jquery-3.4.1.js"></script>
	</body>
</html>
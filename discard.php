<?php session_start(); ?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel = "stylesheet" href = "css/main.css">
		<title>Document</title>
	</head>
	<body>
   		<?php require("header.php"); ?>
		<?php
			session_start();
			if (!$_SESSION['loggedin'] || $_SESSION['loggedin'] == false)
			{
				echo "
					<form action = ./modal/login_user.php method = POST>
						<table>
							<div class = 'container style' =' background-color:#f1f1f1'>
								<tr><td><img class = title src = 'img/randoms/13_profile-512.png'><label></label><input class = 'fill' type = text placeholder = 'Enter Username name' = username required></td></tr>
								<tr><td><img  class = title src = 'img/randoms/21_lock-512.png'><label></label><input class = 'fill' placeholder = 'Enter Password type' = password name = password required></td></tr>
								<tr><td><button type = submit name = login_btn>Login</button></td></tr>
								<tr><td><button type = button style.display = none class=cancelbtn>Cancel</button></td></tr>
							</div>
						</table>
					</form>
				";
			}
			elseif ($_SESSION['loggedin'] && $_SESSION['loggedin'] == true)
			{
				echo "
					<h1>Snap an Image!</h1>
					<div class = 'wc_header'></div>
					<div class = 'wc_top_container'>
						<video id = video>Not available...</video>
						<button id = 'photo_button' class = 'btn_dark'>Take Photo</button>
						<button id = 'clear_button'>Clear</button>
						<canvas id = 'canvas'></canvas>
					</div>
					<div class = 'bottom_container'>
						<div id = 'photos'></div>
					</div>
				";
			}
		?>
	</body>
</html>
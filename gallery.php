<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel = "stylesheet" href = "css/login.css">
		<title>Gallery</title>
	</head>
	<body>
		<header class = "header">
				<nav class = "nav_links">
					<ul>
					<li><a href = "index.php">Home</a></li>
					<li><a href = "#">Gallery</a></li>
					<li><a href = "profile.php">Profile</a></li>
					<li class = "Logo"><a href = "index.php"><img src = "img/Birdy.png" alt = " " class = "White"></a></li>
					<li><a href = "login.php">Login</a></li>
					<li><a href = "register.php">Register</a></li>
					<li><a href = "./model/logout_user.php">Logout</a></li>
					</ul>
					<a class = "nav_icon" href = ""><span></span><span></span><span></span></a>
				</nav>
        </header>
		<section class = "gallery_links">
			<div class = "wrapper">
				<div class = "gallery_container">
					<?php
						session_start();
						require("./config/connect.php");
						$stmt = $connection->prepare("SELECT * FROM gallery ORDER BY orderGallery DESC");
						// $stmt->execute();
						// $lolo = $stmt->fetch();
						// var_dump($lolo);
						echo "
							<a href = '#'>
								<div></div>
								<h3>Username</h3>
							</a>
						";
					?>
					<?php
						session_start();
						if ($_SESSION['loggedin'] && $_SESSION['loggedin'] == true) 
						{
							echo "
							<div>
								<form method = 'POST' class = 'gal_form' action = 'model/upload.php' enctype = 'multipart/form-data'>
									<input class = 'gal_input' type = 'file' name = 'file'/>
									<button type = 'submit' name = 'gal_submit'>Upload Img</button>
								</form>
							</div>
							";
						}
					?>
				</div>
			</div>
		</section>
    </body>
</html>
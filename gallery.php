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
					<li><a href = "#">Gallery</a></li>
					<li><a href = "profile.php">Profile</a></li>
					<li class = "Logo"><a href = "index.php"><img src = "img/Birdy.png" alt = " " class = "White"><img class = "Black" src = "img/Birdy.png" alt = ""></a></li>
					<li><a href = "login.php">Login</a></li>
					<li><a href = "register.php">Register</a></li>
					<li><a href = "./model/logout_user.php">Logout</a></li>
					</ul>
					<a class = "nav_icon" href = ""><span></span><span></span><span></span></a>
				</nav>
        </header>
		<div>
			<form method = "POST" class = "gal_form" action = "model/upload.php" enctype = "multipart/form-data">
				<input class = "gal_input" type = "file" name = "file"/>
				<button type = "submit" name = "gal_submit">Upload Img</button>			
			</form>
		</div>
    </body>
</html>
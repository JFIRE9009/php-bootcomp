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
	<title>Document</title>
</head>
<body>
	<header class = "header">
			<nav class = "nav_links">
				<ul>
					<li><a href = "index.php">Home</a></li>
					<li><a href = "">Shop</a></li>
					<li><a href = "">Team</a></li>
					<li><a href = "">Work</a></li>
					<li class = "Logo"><a href = "index.php"><img src = "img/Birdy.png" alt = " " class = "White"><img class = "Black" src = "img/Birdy.png" alt = ""></a></li>
					<li><a href = "">Blog</a></li>
					<li><a href = "">Contact</a></li>
					<li><a href = "register.php">Register</a></li>
					<li><a href = "login.php">Login</a></li>
				</ul>
				<a class = "nav_icon" href = ""><span></span><span></span><span></span></a>
			</nav>
	</header>
</body>
</html>
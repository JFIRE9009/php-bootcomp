<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel = "stylesheet" href = "css/login.css">
		<link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Gallery</title>
		<script src = './controller/script.js'></script>
	</head>
	<body>
		<header class = "header">
				<nav class = "nav_links">
					<ul>
						<li><a href = "index.php">Home</a></li>
						<li><a href = "#">Gallery</a></li>
						<li><a href = "profile.php">Profile</a></li>
						<li class = "Logo"><a href = "index.php"><img src = "img/randoms/Birdy.png" alt = " " class = "White"></a></li>
						<li><a href = "register.php">Register</a></li>
						<li><?php if (!$_SESSION['loggedin'] || $_SESSION['loggedin'] === false){ echo "<a href = 'login.php'>Login</a>";}; ?></li>
						<li><?php if ($_SESSION['loggedin'] && $_SESSION['loggedin'] === true){ echo "<a href = './model/logout_user.php'>Logout</a>";}; ?></li>
					</ul>
					<a class = "nav_icon" href = ""><span></span><span></span><span></span></a>
				</nav>
        </header>
		<section class = "gallery_links">
			<div class = "wrapper">
				<div class = "gallery_container">
					<?php
						require("./config/connect.php");
						$stmt = $connection->prepare("SELECT * FROM gallery ORDER BY orderGallery DESC");
						$stmt->execute();
						while ($count = $stmt->fetch(PDO::FETCH_ASSOC))
						{
							echo "
								<a>
									<div class = 'gal_img' style = 'background-image: url(img/uploads/".$count['imgFullNameGallery'].")'></div>
									<h3>".$count['username']."</h3>
								</a>
							";
							?>
							<i class = 'fa fa-thumbs-o-up like_btn' id="like-<?php echo $count['orderGallery']; ?>" onclick="like(<?php echo $count['orderGallery']; ?>)"><a> Like!</a></i>
								<?php
									$pid = $count['orderGallery'];
									$statement = $connection->prepare("SELECT * FROM likes WHERE pid = :pid");
									$statement->bindParam(":pid", $pid);
									$statement->execute();
									$stmt_c = $statement->rowCount();
									echo "<a>$stmt_c</a>";
								?>
							<?php
						}
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
		<div class = "footer"></div>
    </body>
</html>
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
    	<?php require("header.php"); ?>
		<section class = "gallery_links">
			<div class = "wrapper">
				<div class = "gallery_container">
					<?php
						require("./config/connect.php");
						$stmt = $connection->prepare("SELECT * FROM gallery ORDER BY postid DESC");
						$stmt->execute();
						while ($img = $stmt->fetch(PDO::FETCH_ASSOC))
						{
					?>
							<?php
								$pid = $img['postid'];
								$statement = $connection->prepare("SELECT * FROM likes WHERE pid = :pid");
								$statement->bindParam(":pid", $pid);
								$statement->execute();
								$like_count = $statement->rowCount();
								$statement = $connection->prepare("SELECT COUNT(*) FROM `likes` WHERE `uid`=? AND `pid`=?");
								$statement->execute(array($_SESSION["uid"], $pid));
								$isliked = $statement->fetch()[0];
							?>
							<div id="delete_post-<?php echo $pid; ?>">
							<a>
								<div class = 'gal_img' style = 'background-image: url(img/uploads/<?php echo $img['imgFullNameGallery'] ?>)'></div>
								<h3>Posted by: <?php echo $img['username'] ?></h3>
							</a>
							<i class = 'fa fa-thumbs-o-<?php echo !$isliked ? "up" : "down";?> like_btn' id = "like-<?php echo $img['postid']; ?>" onclick = "like(<?php echo $img['postid']; ?>)"><a> Like!</a></i>
							<a id="like-count-<?php echo $pid; ?>"><?php echo $like_count; ?></a>
							<?php
							if ($img['username'] === $_SESSION['username'])
							{
							?>
							<i class = 'fa fa-trash delete_btn' use-id="<?php echo $pid; ?>"><a class = "delete_btn">  Delete your post?</a></i>
							</div>
							<?php
							}
						}
					?>
					<?php
						session_start();
						if ($_SESSION['loggedin'] && $_SESSION['loggedin'] == true) 
						{
					?>
					<div>
						<form method = 'POST' class = 'gal_form' action = 'modal/upload.php' enctype = 'multipart/form-data'>
							<input class = 'gal_input' type = 'file' name = 'file'/>
							<button type = 'submit' name = 'gal_submit'>Upload Img</button>
						</form>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</section>
		<div class = "footer"></div>
    </body>
</html>
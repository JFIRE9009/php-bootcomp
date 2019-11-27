<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel = "stylesheet" href = "css/main.css">
		<link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Gallery</title>
		<script src = './controller/script.js'></script>
	</head>
	<body>
    	<?php require("header.php"); ?>
		<section class = "gallery_links">
			<div class = "wrapper">
				<div class = "gallery_container" id = "photo_place"></div>
			</div>
		</section>
		<div class = "footer">Cascade</div>
    </body>
</html>
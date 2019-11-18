<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" href = "css/login.css">
    <title>Document</title>
    <script src = "./controller/cam.js"></script>
</head>
<body>
    <?php require("header.php"); ?>

    <canvas id = canvas></canvas>
    <video class = 'vid_img' autoplay = true id = video>Stream not available...</video>
    <input type = file id ="upload"/>
    <button id = capture>Capture</button>
</body>
</html>
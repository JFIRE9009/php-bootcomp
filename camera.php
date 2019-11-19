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
    <?php 
        require("header.php");
        session_start();
        if ($_SESSION['loggedin'] && $_SESSION['loggedin'] == true) 
        {
    ?>
        <div id = "edit">
            <img id = "display"/>
            <img id = "stickerdisplay"/>
        </div>
        <video class = 'vid_img' autoplay = true id = video>Stream not available...</video>
        <input type = file id ="upload"/>
        <button id = "capture">Capture</button>
    <?php } ?>
    <div class = "stickers">
        <img id = "kitten" class = "kitten sticker"></div>
        <img id = "pokemon" class = "pokemon sticker"></div>
        <img id = "fox_deer" class = "fox_deer sticker"></div>
        <img id = "whale" src="" class = "whale sticker"></div>
    </div>
</body>
</html>
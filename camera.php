<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" href = "css/main.css">
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
        <div class = "capture_bar">
            <input type = file id ="file"/>
            <button id = "capture">Capture</button>
            <button id = "upload_btn">Upload</button>
            <button id = "cancel_btn">Cancel</button>
        </div>
    <?php } ?>
    <div class = "stickers">
        <div><img src = "./img/stickers/kitten.png" id = "kitten" class = "kitten sticker"></div>
        <div><img src = "./img/stickers/pokemon.png" id = "pokemon" class = "pokemon sticker"></div>
        <div><img src = "./img/stickers/fox_deer.png" id = "fox_deer" class = "fox_deer sticker"></div>
        <div><img src = "./img/stickers/whale.png" id = "whale" src="" class = "whale sticker"></div>
    </div>
</body>
</html>
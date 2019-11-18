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
        <div id = "edit" style="position: relative;">
            <img id = "display" width="100%"/>
            <img id = "stickerdisplay" width="100%" style="position: absolute; top: 0; left: 0;"/>
        </div>
        <video class = 'vid_img' autoplay = true id = video>Stream not available...</video>
        <input type = file id ="upload"/>
        <button id = "capture">Capture</button>
    <?php } ?>
    <div class = "stickers">
        <div id = "kitten" class = "kitten" onclick = "addSticker('kitten')"></div>
        <div id = "pokemon" class = "pokemon" onclick = "addSticker('pokemon')"></div>
        <div id = "fox_deer" class = "fox_deer" onclick = "addSticker('fox_deer')"></div>
        <div id = "whale" class = "whale" onclick = "addSticker('whale')"></div>
    </div>
</body>
</html>
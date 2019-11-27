<?php 
    require("./config/connect.php");
    require("header.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" href = "css/main.css"/>
    <title>Document</title>
    <script src = './controller/script.js'></script>
</head>
<body>
<div class="wrapper">
    <?php
        $pid = $_GET['pid'];
        $_SESSION['pid'] = $pid;
        $stmt = $connection->prepare("SELECT `imgFullNameGallery` FROM `gallery` WHERE `postid` = ?");
        $stmt->execute(array($pid));
        $img = $stmt->fetchColumn();
    ?>
        <div class = "upper_break"></div>
        <div class = 'com_img' style = 'background-image: url(./img/uploads/<?php echo $img ?>)'></div>        
        <div class = "under_break"></div>
    <?php
        $stmt = $connection->prepare("SELECT * FROM `comments` WHERE `pid` = ? ORDER BY `cid` DESC");
        $stmt->execute(array($pid));
        while ($comments = $stmt->fetch(PDO::FETCH_ASSOC))
        {
    ?>
            <div class = "uploaded_comments">
                <?php echo $comments['username'] . ": " . $comments['message']; ?>
            </div>
    <?php
        }
        if ($_SESSION['loggedin'] && $_SESSION['loggedin'] == true)
        {
    ?>
    <div class = "comments">
        <input type = "hidden" value = <?php echo $pid; ?>/>
        <input id = "comment" class = "comment" type = "text" required/>
        <button class = "comment_btn" onclick = "comment(<?php echo $pid; ?>)" type = "button" value = "execute">Comment</button>
    </div>
    <?php
        }
    ?>
</div>
<div class = "footer">Cascade</div>
</body>
</html>
<?php
    require("header.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "stylesheet" href = "css/main.css"/>
    <script src = "./controller/script.js"></script>
    <title>Document</title>
</head>
<body>
    <div class = "profile">
        <div class = "top">
            <div class = "profile_img"></div>
            <p class = "profile_name"><?php echo $_SESSION['username']; ?></p>
            <i class = "fa fa-cog profile_settings">Notifications</i>
            <div class = "notif_settings">
                <label class = "notif_container">On
                    <input id = "on" type = "radio" name = "radio">
                    <span class = "checkmark"></span>
                </label>
                <label class = "notif_container">Off
                    <input id = "off" type = "radio" name = "radio">
                    <span class = "checkmark"></span>
                </label>
            </div>
        </div>
        <div class = "profile_gallery">
            <?php
                require("./config/connect.php");
                $username = $_SESSION['username'];
                $stmt = $connection->prepare("SELECT * FROM `gallery` WHERE `username` = ? ORDER BY `postid` DESC");
                $stmt->execute(array($username));
                while ($img = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $pid = $img['postid'];
                    $statement = $connection->prepare("SELECT * FROM `likes` WHERE `pid` = :pid");
                    $statement->bindParam(":pid", $pid);
                    $statement->execute();
                    $like_count = $statement->rowCount();
                    $statement = $connection->prepare("SELECT COUNT(*) FROM `likes` WHERE `uid`=? AND `pid`=?");
                    $statement->execute(array($_SESSION["uid"], $pid));
                    $isliked = $statement->fetch()[0];
            ?>
                    <div id="delete_post-<?php echo $pid; ?>">
                        <a>
                            <div class = 'gal_img' style = 'background-image: url(./img/uploads/<?php echo $img['imgFullNameGallery'] ?>)'></div>
                            <h3>Posted by: <?php echo $img['username'] ?></h3>
                        </a>
                        <i class = 'fa fa-thumbs-o-up like_btn'><a> Likes</a></i>

                        <a id="like-count-<?php echo $pid; ?>"><?php echo $like_count; ?></a>
                        <i onclick = "redirect(<?php echo $pid ?>)"><button>Comment</button></i>
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
        </div>
    </div>
</body>
</html>
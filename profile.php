<?php
    require("header.php");
    require("./config/connect.php");
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
    <?php 
        if ($_SESSION['loggedin'] && $_SESSION['loggedin'] == true) 
        {
    ?>
    <div class = "profile">
        <div class = "top">
            <div class = "profile_img"></div>
            <p class = "profile_name"><?php echo $username = $_SESSION['username']; ?></p>
            <i class = "fa fa-cog profile_settings">Notifications</i>
            <div class = "notif_settings">
                <?php
                    $stmt = $connection->prepare("SELECT notifications FROM users WHERE username = ?");
                    $stmt->execute(array($username));
                    if ($stmt->fetchColumn() == "1")
                        $notif = 1;
                    else if ($stmt->fetchColumn() == "0")
                        $notif = 0;
                ?>
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
        <div class = "profile_gallery" id = "profile_photos"></div>
    </div>
    <?php }
    else
    {
        echo "<a class = login_msg>Please login to view this page";
    }
     ?>
    <div class = "footer">Cascade</div>
</body>
</html>
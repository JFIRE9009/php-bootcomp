<?php
    session_start();
    require("./../config/connect.php");
    
    $img = $_POST['canvas'];
    $img = base64_decode($img);
    $image = imagecreatefromstring($img);
    $fileName = uniqid('', true).".png";
    imagepng($image, "../img/uploads/$fileName");

    echo $uid = $_SESSION['uid'];
    $username = $_SESSION['username'];
    
    $stmt = $connection->prepare("INSERT INTO `gallery`(`uid`, `username`, `imgFullNameGallery`) VALUES(?, ?, ?)");
    $stmt->execute(array($uid, $username, $fileName));
?>
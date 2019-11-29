<?php
    require("./../config/connect.php");
    
    $stickerImg = $_POST['stickerCanvas'];
    var_dump($img = $_POST['canvas']);
    $img = base64_decode($img);
    $stickerImg = base64_decode($stickerImg);
    $image = imagecreatefromstring($img);
    $stickerImage = imagecreatefromstring($stickerImg);
    if ($image && $stickerImage)
        imagecopy($image, $stickerImage, 0, 0, 0, 0, 665, 500);

    $fileName = uniqid('', true).".png";
    imagepng($image, "../img/uploads/$fileName");

    $uid = $_SESSION['uid'];
    $username = $_SESSION['username'];
    
    $stmt = $connection->prepare("INSERT INTO `gallery`(`uid`, `username`, `imgFullNameGallery`) VALUES(?, ?, ?)");
    $stmt->execute(array($uid, $username, $fileName));
?>
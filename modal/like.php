<?php
    require("../config/connect.php");
    session_start();
    $uid = $_SESSION['uid'];
    $postid = $_POST["postid"];

    $stmt = $connection->prepare("SELECT * FROM `gallery` WHERE postid = ?");
    $stmt->execute(array($postid));

    echo $imgContents = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $imgContents['uid'];
    echo $imgName = $imgContents['imgFullNameGallery'];
    $imgName = str_replace("/\s/", ".", $imgName);
    
    $stmt = $connection->prepare("SELECT * FROM `users` WHERE id = ?");
    $stmt->execute(array($id));
    
    $contents = $stmt->fetch(PDO::FETCH_ASSOC);
	$img .= '<img src="./../img/upload/5dd6b3abca3268.52792261.png"/>';
    $notif = $contents['notifications'];
    $email = $contents['email'];
    $message = "
        Congratulations $contents[username]!

        Your post was liked by user $_SESSION[username]!
        
        $img
    ";
    if ($notif === "1")
    {
        mail($email, Camagru, $message, 'From noreply@cascade.com');
    }

    $stmt = $connection->prepare("INSERT INTO `likes`(`uid`, `pid`) VALUES (?, ?)");
    try
    {
        http_response_code(200);
        $stmt->execute(array($uid, $postid));
    }
    catch (PDOException $e)
    {
        http_response_code(400);
        echo $e->getMessage();
    }
?>
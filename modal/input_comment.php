<?php
    session_start();
    require("../config/connect.php");

    $comment = $_POST["comment"];
    $pid = $_POST["pid"];
    $uid = $_SESSION['uid'];
    $username = $_SESSION['username'];

    $stmt = $connection->prepare("SELECT * FROM `gallery` WHERE postid = ?");
    $stmt->execute(array($postid));
    
    $imgContents = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $imgContents['uid'];
    $imgName = $imgContents['imgFullNameGallery'];
    $imgName = str_replace("/\s/", ".", $imgName);
    $stmt = $connection->prepare("SELECT * FROM `users` WHERE id = ?");
    $stmt->execute(array($id));
    
    $contents = $stmt->fetch(PDO::FETCH_ASSOC);
	echo $img .= '<img src="./../img/upload/5dd6b3abca3268.52792261.png"/>';
    $notif = $contents['notifications'];
    $email = $contents['email'];
    $message = "
        Congratulations $contents[username]!

        User $_SESSION[username] commented on your post!
        
        $img
    ";
    if ($notif === "1")
    {
        mail($email, Camagru, $message, 'From noreply@cascade.com');
    }

    $stmt = $connection->prepare("INSERT INTO comments(`uid`, `pid`, `username`, `message`) VALUES(?, ?, ?, ?)");
    try
    {
        http_response_code(200);
        $stmt->execute(array($uid, $pid, $username, $comment));
    }
    catch (PDOException $e)
    {
        http_response_code(400);
        echo $e->getMessage();
    }
?>
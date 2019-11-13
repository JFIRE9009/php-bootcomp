<?php
    require("../config/connect.php");
    session_start();
    $uid = $_SESSION['uid'];

    $postid = $_POST["postid"];
    $stmt = $connection->prepare("INSERT INTO likes(`uid`, `pid`) VALUES (?, ?)");
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
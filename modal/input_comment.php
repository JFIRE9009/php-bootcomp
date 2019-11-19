<?php
    session_start();
    require("../config/connect.php");

    $comment = $_POST["comment"];
    $pid = $_POST["pid"];
    $uid = $_SESSION['uid'];

    $stmt = $connection->prepare("INSERT INTO comments(`uid`, `pid`, `message`) VALUES(?, ?, ?)");
    try
    {
        http_response_code(200);
        $stmt->execute(array($uid, $pid, $comment));
    }
    catch (PDOException $e)
    {
        http_response_code(400);
        echo $e->getMessage();
    }
?>
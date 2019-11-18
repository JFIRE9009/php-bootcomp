<?php
    require("../config/connect.php");
    session_start();

    $pid = $_POST['pid'];
    $stmt = $connection->prepare("SELECT username FROM gallery WHERE postid = ?");
    $stmt->execute(array($pid));
    $username = $stmt->fetchColumn();
    if ($username == $_SESSION['username'])
    {
        try 
        {
            $stmt = $connection->prepare("DELETE FROM gallery WHERE postid = ?");
            $stmt->execute(array($pid));
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }
    else
        die("You may only delete your own posts");
?>
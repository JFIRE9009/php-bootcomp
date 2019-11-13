<?php
    require("../config/connect.php");
    session_start();
    $pid = $_POST['pid'];
    $stmt = $connection->prepare("SELECT username FROM gallery WHERE orderGallery = ?");
    $stmt->execute(array($pid));
    if ($stmt->fetchColumn())
    {
        try 
        {
            $stmt = $connection->prepare("DELETE FROM gallery WHERE orderGallery = ?");
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
<?php
    require("../config/connect.php");
    session_start();

    $uid = $_SESSION['uid'];
    $on = $_POST['on'];
    $off = $_POST['off'];

    if (isset($on))
    {
        $stmt = $connection->prepare("UPDATE `users` SET `notifications` = 1 WHERE `id` = ?");
        $stmt->execute(array($uid));
    }
    else if (isset($off))
    {
        $stmt = $connection->prepare("UPDATE `users` SET `notifications` = 0 WHERE `id` = ?");
        $stmt->execute(array($uid));
    }
    else
        echo "Nobody will ever be seeing this :|";
?>
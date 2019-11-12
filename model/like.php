<?php
    require("../config/connect.php");

    $stmt = $connection("SELECT id FROM users");

    $stmt = $connection->prepare("UPDATE likes = likes + 1 WHERE id = ")

?>
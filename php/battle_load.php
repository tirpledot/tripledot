<?php
    include ('db/db_config');

    $sql = "Select * from monster where x = 1 and y = 1";

    $stmt = $db->prepare($sql);
    $stmt -> execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

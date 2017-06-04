<?php
    $sql = "Select * from monster where x = ? and y = ?";
    $stmt = $db->prepare($sql);
    $stmt -> execute(array($_SESSION['x'],$_SESSION['y']));
    $mon_data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

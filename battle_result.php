<?php
    include ('db/db_config');

    $sql = "Select * from monster where x = 1 and y = 1";

    $stmt = $db->prepare($sql);
    $stmt -> execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row){
      $result = [
        'damage' => $row['atk'],
        'hp' => $row['hp'] - $_POST['atk'];
      ];
    }

    echo json_encode($result);
?>

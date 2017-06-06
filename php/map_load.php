<?php
    if(!isset($_SESSION['battle'])){
        $_SESSION['battle'] = array();
    }
    //move button
    if(isset($_POST['east'])){
        $sql = "UPDATE role SET x = ?,y = ? where username = ?";
        $_SESSION['x'] = $_SESSION['x'] + 1;
    }else if(isset($_POST['west'])){
        $sql = "UPDATE role SET x = ?,y = ? where username = ?";
        $_SESSION['x'] = $_SESSION['x'] - 1;
    }else if(isset($_POST['south'])){
        $sql = "UPDATE role SET x = ?,y = ? where username = ?";
        $_SESSION['y'] = $_SESSION['y'] - 1;
    }else if(isset($_POST['north'])){
        $sql = "UPDATE role SET x = ?,y = ? where username = ?";
        $_SESSION['y'] = $_SESSION['y'] + 1;
    }else if(isset($_POST['return'])){
        $sql = "UPDATE role SET x = ?,y = ? where username = ?";
        $_SESSION['x'] = 0;
        $_SESSION['y'] = 0;
    }else if(isset($_POST['battle'])){
        header('Location: battle.php');
    }else if(isset($_POST['logout'])){
        session_unset();
        header('Location: login.php');
    }
    if(isset($sql)){
      $stmt = $db-> prepare($sql);
      $stmt -> execute(array($_SESSION['x'],$_SESSION['y'],$_SESSION['name']));
      header('Location: main.php');
    }
    // all table data
    $sql = "select * from role where username = ?";
    $stmt = $db-> prepare($sql);
    $stmt -> execute(array($_SESSION['name']));
    $role_data = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql = "select * from map where x = ? and y = ?";
    $stmt = $db -> prepare($sql);
    $stmt -> execute(array($role_data['x'],$role_data['y']));
    $map_data = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql = "Select * from monster where x = ? and y = ?";
    $stmt = $db->prepare($sql);
    $stmt -> execute(array($role_data['x'],$role_data['y']));
    $mon_data = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql = "select * from exp where lv = ?";
    $stmt = $db -> prepare($sql);
    $stmt -> execute(array($role_data['lv']));
    $exp_data = $stmt->fetch(PDO::FETCH_ASSOC);

    $_SESSION['x'] = $role_data['x'];
    $_SESSION['y'] = $role_data['y'];


    //battle log too long
    /*if(count($_SESSION['battle'])>12){
        array_shift($_SESSION['battle']);
    }*/
    //battle result
    if(isset($_POST['win'])){ // result win , add exp
          //add exp
          $new_exp = $mon_data['ep']+$role_data['ep'];
          //check lv up
          $sql = "select * from exp where ep > ? LIMIT 1";
          $stmt = $db -> prepare($sql);
          $stmt -> execute(array($new_exp));
          $exp_data = $stmt->fetch(PDO::FETCH_ASSOC);
          if($role_data['lv']<$exp_data['lv']){
              //level up
              $sql = "UPDATE role SET lv = ?,ep = ?,hp = ?,mp = ?,atk = ? where username = ?";
              $stmt = $db -> prepare($sql);
              $stmt -> execute(array($exp_data['lv'],$new_exp,$role_data['hp']+rand(25,50),$role_data['mp']+rand(5,10),$role_data['atk']+rand(2,7),$_SESSION['name']));

          }else{
              //update new exp
              $sql = "UPDATE role SET ep = ? where username = ?";;
              $stmt = $db -> prepare($sql);
              $stmt -> execute(array($new_exp,$_SESSION['name']));
          }
          array_push($_SESSION['battle'] ,"[ ".date("h:i:s")." ]"." 你花了 ".$_POST['round']." 回合內擊敗了".$mon_data['name']."。");
          header('Location: main.php');
    }else if(isset($_POST['lose'])){
          array_push($_SESSION['battle'] , "[ ".date("h:i:s")." ]"." 你在第 ".$_POST['round']." 回合被".$mon_data['name']."擊敗了。");
          header('Location: main.php');
    }
?>

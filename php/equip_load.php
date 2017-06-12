<?php
    if(isset($_POST['weapon'])){
          $before_atk = 0;
          $before_hp = 0;
          //before weapon
          $sql = "select * from equip where username = ?";
          $stmt = $db-> prepare($sql);
          $stmt -> execute(array($role_data['username']));
          $equip_info = $stmt->fetch(PDO::FETCH_ASSOC);
          if(isset($equip_info['weapon'])){
                  $sql = "select * from weapon where name = ?";
                  $stmt = $db-> prepare($sql);
                  $stmt -> execute(array($equip_info['weapon']));
                  $equip_info = $stmt->fetch(PDO::FETCH_ASSOC);
                  $before_atk = $equip_info['atk'];
                  $before_hp = $equip_info['hp'];
          }
          $sql = 'UPDATE equip SET weapon = ? WHERE username = ?';
          $stmt = $db-> prepare($sql);
          $stmt -> execute(array($_POST['weapon_name'],$role_data['username']));

          $sql = "select * from weapon where name = ?";
          $stmt = $db-> prepare($sql);
          $stmt -> execute(array($_POST['weapon_name']));
          $equip_info = $stmt->fetch(PDO::FETCH_ASSOC);
          $sql = 'UPDATE role SET gold = ?, hp = ?, maxhp = ?, atk = ? WHERE username = ?';
          $stmt = $db-> prepare($sql);
          // update new info
          $new_gold = $role_data['gold']-$equip_info['gold'];
          $new_hp = $role_data['hp'] + $equip_info['hp'] - $before_hp;
          $new_maxhp = $role_data['maxhp'] + $equip_info['hp'] - $before_hp;
          $new_atk = $role_data['atk'] + $equip_info['atk'] - $before_atk;
          $stmt -> execute(array($new_gold,$new_hp,$new_maxhp,$new_atk,$role_data['username']));

          header('Location: weapon.php');

    }else if(isset($_POST['back'])){
        header('Location: main.php');
    }
    if(isset($equip_data['weapon'])){
        $sql = "select * from weapon where name = ?";
        $stmt = $db-> prepare($sql);
        $stmt -> execute(array($equip_data['weapon']));
        $role_weapon = $stmt->fetch(PDO::FETCH_ASSOC);


    }

?>

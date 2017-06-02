<?php
session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$mon = "兔子";
$hp = 100;
$atk = 4;
$mon_hp = 10;
$mon_atk = 2
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Battle</title>
  </head>
  <body>
      <h4 id = "mon_info"<?php echo "mon = ".$mon." hp = ".$mon_hp." atk = ".$mon_atk;?>>name : 兔子 , mon_hp = 10 , mon_atk = 2</h4>
      <div id="battle_info"  style="height:20em;width:100%; overflow-x:hidden;overflow-y:auto">
        <h4>戰鬥開始</h4>
      </div>
      <button type="button" name="attack" onclick="damage(<?php echo $hp.",".$atk;?>)">attack</button>
      <h4 id = "role_info"<?php echo "hp = ".$hp." atk = ".$atk;?>>hp = 100 , atk = 4</h4>
  </body>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/my.js"></script>
</html>

<?php
session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("db/db_config.php");
include('php/map_load.php');
$hp = 100;
$atk = 4;
?>
<!DOCTYPE html>
<html>
  <head>
      <!-- reCAPTCHA -->
      <script src='https://www.google.com/recaptcha/api.js'></script>

      <!-- Bootstrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <meta charset="utf-8">
    <title>Battle</title>
  </head>
  <body>
      <h4 id = "mon_info"<?php echo "mon = ".$mon_data['name']." hp = ".$mon_data['hp']." atk = ".$mon_data['atk'];?>>name : 兔子 , mon_hp = 10 , mon_atk = 2</h4>
      <div name="battle_info" id="battle_info"  style="height:20em;width:100%; overflow-x:hidden;overflow-y:auto">
        <h4 class="text-center">戰鬥開始</h4>
      </div>
      <button type="button" name="attack" id="attack" onclick="damage(<?php echo $hp.",".$atk;?>)">attack</button>
      <h4 id = "role_info"<?php echo "hp = ".$hp." atk = ".$atk;?>>hp = 100 , atk = 4</h4>
  </body>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/my.js"></script>
</html>

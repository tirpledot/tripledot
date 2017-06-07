<?php
session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("db/db_config.php");
include('php/map_load.php');
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
  <body style= "background-image: url('img/background/<?php echo $map_data['background'];?>'); 	background-size: 100% 100%;">
      <?php include('layout/mon_info.php');?>
      <h4 id = "mon_info"<?php echo "mon = ".$mon_data['name']." hp = ".$mon_data['hp']." atk = ".$mon_data['atk'];?>></h4>
      <hr style="height:0.1%;" color="c7c6c6">
      <div class="mid_area" style="height:45%;">
        <div name="battle_info" id="battle_info"  style="height:90%;width:100%; overflow-x:hidden;overflow-y:auto;">
          <h4 class="text-center">戰鬥開始</h4>
        </div>
        <button type="button" class="btn btn-default col-xs-1" style="margin-left:12%;width:8%;"  name="attack" id="attack" onclick="damage(<?php echo $role_data['hp'].",".$role_data['atk'];?>)">普通攻擊</button>
        <button type="button" class="btn btn-default col-xs-1 col-xs-offset-7" name="button" onclick="window.location.assign('main.php');">逃離戰鬥</button>
      </div>
      <hr style="height:0.1%;" color="c7c6c6">

      <?php include('layout/chara_user.php');?>
      <h4 id = "role_info" round = "0" <?php echo "hp = ".$role_data['hp']." atk = ".$role_data['atk'];?>></h4>
  </body>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/my.js"></script>
</html>

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
      <link rel="stylesheet" href="css/main.css">
      <style>
      @keyframes fadeIn {
          from { opacity: 0; }
      }
      img.levelup {
          animation: fadeIn 1s infinite alternate;
      }
      </style>
    <meta charset="utf-8">
    <title>Battle</title>
  </head>
  <body style= "background-image: url('img/background/<?php echo $map_data['background'];?>'); 	background-size: 100% 100%;">
      <?php include('layout/mon_info.php');?>
      <input type="hidden" id = "mon_info" data-name="<?php echo $mon_data['name'];?>" data-hp="<?php echo $mon_data['hp'];?>" data-atk = "<?php echo $mon_data['atk'];?>">
      <hr style="height:0.1%;" color="c7c6c6">
      <div class="mid_area" style="height:45%;">
        <div name="battle_info" id="battle_info"  style="height:90%;width:100%; overflow-x:hidden;overflow-y:auto;">
          <h4 class="text-center">戰鬥開始</h4>
        </div>
        <button type="button" class="btn btn-default col-xs-1" style="margin-left:12%;width:8%;"  name="attack" id="attack" onclick="damage()">普通攻擊</button>
        <form id="result" name="result" action="main.php" method="post">
            <input type="hidden" name="round" id="round" value="1">
            <input type="hidden" name="leavehp" id="leavehp" value="<?php echo $role_data['hp'];?>">
            <input type="hidden" name="gold" value="<?php echo $mon_data['gold']+$role_data['gold'];?>">
            <button type="submit" class="btn btn-default col-xs-1 col-xs-offset-7" name="escape">逃離戰鬥</button>
        </form>

      </div>
      <hr style="height:0.1%;" color="c7c6c6">

      <?php include('layout/chara_user.php');?>
      <input type="hidden" id = "role_info" data-round = "1" data-hp="<?php echo $role_data['hp'];?>" data-atk = "<?php echo $role_data['atk'];?>"></h4>
  </body>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/my.js"></script>
</html>

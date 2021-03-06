<?php
session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("db/db_config.php");
if(isset($_SESSION['name'])){
    include("php/map_load.php");
    include("php/equip_load.php");

}else{
    header('Location: login.php');
  exit;
}
//check login time set x,y
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="img/map.ico">

    <!-- reCAPTCHA -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">

    <title>Tripledot</title>
  </head>
  <body  data-role="page" style="background-image:url('img/background/<?php echo $map_data['background'];?>');background-size: 100% 100%;">
      <?php include('layout/mon_info.php');?>
      <hr style="height:0.1%;" color="c7c6c6">
      <div class="mid_area" style="height:45%;">
          <h2 class="text-center">[ <?php echo $map_data['locate']; ?> ]</h2>
          <?php include('layout/battle_log.php'); ?>
      </div>
      <hr style="height:0.1%;" color="c7c6c6">
      <?php include('layout/chara_user.php');?>
      <?php include('layout/main_button.php'); ?>
  </body>

  <script src="js/my.js"></script>

</html>

<?php
	session_start();
	ob_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	include("db/db_config.php");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<link rel="icon" href="img/map.ico">

    <!-- reCAPTCHA -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link href="css/role.css" rel="stylesheet">
    <title>Role</title>
  </head>
  <body>
    <?php
        if(isset($_POST['comfirmbtn'])){
          $query = "INSERT INTO ".$db_table[1]." (".$table2_structure[0].",".$table2_structure[1].",".$table2_structure[2].",".$table2_structure[3].") VALUES(?,?,?,?)";
          $insertrole = $db->prepare($query);
          //"SELECT * FROM role where username = username";
          $insertrole->execute(array($_POST['nickname'],$_POST['sex'],$_POST['role'],$_SESSION['name']));
					$query = "INSERT INTO equip (username) VALUES(?)";
					$insertequip = $db->prepare($query);
					$insertequip->execute(array($_SESSION['name']));
          header('Location: main.php');
          exit;
        }else if(isset($_POST['checkbtn'])){
            include('layout/role_check.php');
        }else{
            include('layout/role_table.php');
        }

    ?>

  </body>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/my.js"></script>

</html>

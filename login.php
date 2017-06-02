<?php
	session_start();
	ob_start();
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	include("db/db_config.php");
	if(isset($_COOKIE['name'])){
					$_SESSION['name'] = $_COOKIE['name'];
					$query = "SELECT * FROM ".$db_table[1]." where ".$table2_structure[3]." = ?";
					$checkrole = $db->prepare($query);
					//"SELECT * FROM role where username = username";
					$checkrole->execute(array($username));
					$row = $checkrole->fetch(PDO::FETCH_ASSOC);
					if(isset($row['username'])){
							header('Location: main.php');
					}else{
							header('Location: role.php');
					}
					exit; //prevents further page loading
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login / Register</title>
	<!-- reCAPTCHA -->
	<script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link href="css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<?php

			//Step2
			$error = 0;
			if(isset($_POST['registerbtn'])){
				//Check password
				$username = $_POST['Username'];
				$password = $_POST['Password2'];

				//Check Account exist or not
				$query = "SELECT * FROM ".$db_table[0]." where ".$table1_structure[0]." = ?";
				$checkuser = $db->prepare($query);
				//"SELECT * FROM acount where username = username";
				$checkuser->execute(array($username));
				$row = $checkuser->fetch(PDO::FETCH_ASSOC);
				if(isset($row['username'])){
					$error = 1;
				}else{
					if($_POST['Password2']!=$_POST['Password1']){
						$error = 2;
					}else{
					//Insert new Account
						$sql = "INSERT INTO ".$db_table[0]." (".$table1_structure[0].",".$table1_structure[1].",".$table1_structure[2].") VALUES(?,?,NOW())";
						$sth = $db->prepare($sql);
						//"INSERT INTO account (username, password,time) VALUES(?,?,NOW())";
						$sth->execute(array($username,$password));
						$_POST = array();
						$error = -1;
					}
				}
			}elseif(isset($_POST['loginbtn'])){
				$username = $_POST['LoginUsername'];
				$password = $_POST['LoginPassword'];

				//Check Account exist or not
				$query = "SELECT * FROM ".$db_table[0]." where ".$table1_structure[0]. " = ? AND " .$table1_structure[1]. " = ?";
				$checkuser = $db->prepare($query);
				//"SELECT * FROM acount where username = ? AND password = ?";
				$checkuser->execute(array($username,$password));
				$row = $checkuser->fetch(PDO::FETCH_ASSOC);
				if(isset($row['username'])){
					setcookie("name", $username, time() + (86400 * 30), "/"); // 86400 = 1 day
					setcookie("pwd", $password, time() + (86400 * 30), "/"); // 86400 = 1 day
					$_SESSION['name'] = $_COOKIE['name'];
					header('Location: role.php');
					exit;
					$error = -2;
				}else{
					$error = 3;
				}
			}
	?>
	<?php if($error == 1 ){
		echo
		"<div class = \"message row\">
			<p style=\"color:red;\">帳號已被註冊</p>
		</div>";
		}elseif($error == 2){
			echo
		"<div class = \"message row\">
			<p style=\"color:red;\">密碼確認錯誤</p>
		</div>";
		}elseif($error == 3){
			echo
		"<div class = \"message row\">
			<p style=\"color:red;\">帳號或密碼錯誤</p>
		</div>";
		}elseif($error == -1){
		echo
		"<div class = \"message row\">
			<p style=\"color:red;\">帳號註冊成功</p>
		</div>";
		}
	?>
	<div class ="main row">
		<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" id="logintab" <?php if($error != 1 and $error !=2)echo "class=\"active\""; ?>><a  href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a></li>
		<li role="presentation" id="registertab" <?php if($error == 1 or $error == 2)echo "class=\"active\""; ?>><a href="#register" aria-controls="register" role="tab" data-toggle="tab">Register</a></li>
		</ul>
		<div class ="tab-content">
			<div role="tabpanel" class="tab-pane fade <?php if($error != 1 and $error !=2)echo "in active"; ?>" id="login">
				<form action="login.php" method="post">
					<div class="form-group">
						<input type="Username" class="form-control" name="LoginUsername" placeholder="Username" maxlength="15" value="<?php if($error == -2)echo $username; ?>">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="LoginPassword" placeholder="Password" maxlength="15" value="<?php if($error == -2)echo $password; ?>">
					</div>
					<div class="form-group sub">
						<button type="submit" name="loginbtn">Login</button>
					</div>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane fade <?php if($error == 1 or $error == 2)echo "in active"; ?>" id="register">
				<form action="login.php" method="post">
					<div class="form-group">
						<input type="Username" class="form-control" name="Username" placeholder="Username" maxlength="15" value="<?php if($error == 1 or $error == 2)echo $username; ?>">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="Password1" maxlength="15" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="Password2" maxlength="15" placeholder="Comfirm Password">
					</div>
					<div class="form-group sub">
						<button type="submit" name="registerbtn">Register</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/app.js"></script>
	<?php if($error == 1){echo "<script type=\"text/javascript\">$('#register').show();$('#login').hide();</script>";}?>
  </body>
</html>

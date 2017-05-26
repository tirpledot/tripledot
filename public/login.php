<!DOCTYPE html>
<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
?>
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
  <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class ="main row">
		<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" id="logintab" ><a  href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a></li>
		<li role="presentation" id="registertab" ><a href="#register" aria-controls="register" role="tab" data-toggle="tab">Register</a></li>
		</ul>
		<div class ="tab-content">
			<div role="tabpanel" class="tab-pane fade " id="login">
				<form action="login.php" method="post">
					<div class="form-group">
						<input type="Username" class="form-control" name="LoginUsername" placeholder="Username" value=>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="LoginPassword" placeholder="Password" value=>
					</div>
					<div class="form-group sub">
						<button type="submit" name="loginbtn">Login</button>
					</div>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane fade id="register">
				<form action="login.php" method="post">
					<div class="form-group">
						<input type="Username" class="form-control" name="Username" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="Password1" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="Password2" placeholder="Comfirm Password">
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
    <script src="js/bootstrap.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/app.js"></script>
  </body>
</html>

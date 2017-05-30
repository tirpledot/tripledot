<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- reCAPTCHA -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link href="css/role.css" rel="stylesheet">
    <title>Role</title>
  </head>
  <body>
    <h1>職業選擇</h1>
    <div class="role">

      <form class="" action="role.php"  method="post">
              <div class="form-group">
                <label for="nickname">暱稱</label>
                <input type="text" class="form-control" value="<?php if(isset($_POST['nickname'])){echo $_POST['nickname'];} ?>" id="nickname" name="nickname" placeholder="暱稱" required="required">
              </div>
              <div class="form-group">
                <label for="role">性別</label>
                <select class="form-control" id="role">
                    <option>男</option>
                    <option>女</option>
                </select>
              </div>
              <div class="form-group">
                  <label for="role">職業</label>
                  <select class="form-control" id="role">
                      <option>測試者</option>
                  </select>
              </div>
            <div class="form-group sub">
  						<button type="submit" name="checkbtn" id="checkbtn">確定</button>
  					</div>
      </form>
    </div>

  </body>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/my.js"></script>

</html>

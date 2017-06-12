<?php
session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("db/db_config.php");
include('php/map_load.php');
include('php/equip_load.php');
?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">

      <!-- reCAPTCHA -->
      <script src='https://www.google.com/recaptcha/api.js'></script>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="css/main.css">
          <script src="js/my.js"></script>
          <script>
              $(function () {
                  $('[data-toggle="tooltip"]').tooltip();
              });
          </script>

    <title>Battle</title>

  </head>
  <body style= "background-image: url('img/background/<?php echo $map_data['background'];?>'); 	background-size: 100% 100%;">

      <?php include('layout/mon_info.php');?>
      <input type="hidden" id = "mon_info"
            data-name="<?php echo $mon_data['name'];?>"
            data-hp="<?php echo $mon_data['hp'];?>"
            data-atk = "<?php echo $mon_data['atk'];?>"
            data-def = "<?php echo $mon_data['def'];?>"
      >
      <hr style="height:0.1%;" color="c7c6c6">
      <div class="mid_area" style="height:45%;">
        <div name="battle_info" id="battle_info"  style="height:90%;width:100%; overflow-x:hidden;overflow-y:auto;">
          <h4 class="text-center">戰鬥開始</h4>
        </div>
        <div style="margin-left:12%;width:80%">

            <button type="button" class="btn btn-default col-xs-1" style="width:10em;"  data-toggle="tooltip" data-placement="top" title="恢復 20 點魔力"  name="recmp" id="recmp" onclick="damage(0,0);" >冥想</button>
            <button type="button" class="btn btn-default col-xs-1" style="width:10em;"   data-toggle="tooltip" data-placement="top" title="1 倍攻擊力 0 消耗魔力" name="attack" id="attack" onclick="damage(1,0);">普通攻擊</button>
            <?php
            for ($i = 0; $i < 3 ; $i++){?>
                    <button type="button"
                    class="btn btn-default col-xs-1 skill"
                    data-cost = "<?php echo $skill_data[$i]['mp'];?>"
                    data-lvon = "<?php if($role_data['lv'] < $skill_data[$i]['lv']){ echo "0";}else{echo "1";}?>"
                    data-toggle="tooltip" data-placement="top" title="<?php echo $skill_data[$i]['effect']," 倍攻擊力\n消耗 ",(-1)*$skill_data[$i]['mp']," 點魔力";?>"
                    style="width:10em;"
                    onclick="damage(<?php echo $skill_data[$i]['effect'],",",$skill_data[$i]['mp'];?>);"
                    <?php if($role_data['lv'] < $skill_data[$i]['lv']){echo "disabled";}?>
                    ><?php echo $skill_data[$i]['name'];
                    if($role_data['lv'] < $skill_data[$i]['lv']){
                        echo "(",$skill_data[$i]['lv'],"級)";
                    }
                    ?>
                  </button>
            <?php } ?>

        </div>
        <form id="result" name="result" action="main.php" method="post">
            <input type="hidden" name="round" id="round" value="0">
            <input type="hidden" name="leavehp" id="leavehp" value="<?php echo $role_data['hp'];?>">
            <input type="hidden" name="leavemp" id="leavemp" value="<?php echo $role_data['mp'];?>">
            <input type="hidden" name="gold" value="<?php echo $mon_data['gold']+$role_data['gold'];?>">
            <button type="submit" class="btn btn-default col-xs-1 col-xs-offset-2" name="escape">逃離戰鬥</button>
        </form>

      </div>
      <hr style="height:0.1%;" color="c7c6c6">

      <?php include('layout/chara_user.php');?>
      <input type="hidden" id = "role_info"
            data-round = "1"
            data-hp="<?php echo $role_data['hp'];?>"
            data-mp="<?php echo $role_data['mp'];?>"
            data-atk = "<?php echo $role_data['atk'];?>"
            data-def = "<?php echo $role_data['def'];?>"

      >
  </body>

</html>

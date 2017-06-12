<?php
session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("db/db_config.php");
include("php/map_load.php");
include("php/equip_load.php");
//weapon_data
$sql = "select * from weapon order by gold";
$stmt = $db-> prepare($sql);
$stmt -> execute(array($role_data['role']));
$weapon_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="img/map.ico">

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!--<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">

    <style>
    		.user_info{
    				border:10px solid transparent;
    				border-image: url(img/border/user_border.png) 30 stretch;
    				font-size: 16px;
            width: 80%;
    		}
    		.u_info{
    				padding-top: 11px;
    		}
    		.contain{
    			padding:0.5%;
    		}
        .list{
          align-items: center;
          text-align: center;
          width: 80%;
          height: auto;
        }
        table{
          background-color: #fff;
          border:1px  #ccc!important;
          border-radius:16px;
          background-color: #fff;
          margin-top: 2em;
        }
        tbody{
          padding:2em 2em 2em 2em;

        }
        button{
            width: 10em;
        }
        body{
          display: flex;
          flex-direction: column;
          align-items: center;
          background-image:url('img/background/weapon.jpg');
          background-size: 100% 100%;
        }
    </style>
    <title>武器店</title>
  </head>
  <body  data-role="page">
    <div class="user_info" style="background-image:url('img/background/userboard.jpg');">
    		<div class="row contain" style="">
    				<div class="col-xs-1">
    					<img src="img/role/head.jpeg" style="width:75px;height:75px">
    				</div>
    				<div class = "col-xs-11">
    					<div class="row u_info">
                  <div class="col-xs-2" ><span>名稱 : <?php echo $role_data['nickname']; ?></span></div>
                  <div class="col-xs-2" ><span>血量 : <span id="role_hp"><?php echo $role_data['hp']; ?></span>/<span id="role_maxhp"><?php echo $role_data['maxhp']; ?></span></span></div>
                  <div class="col-xs-2" ><span>魔力 : <span id="role_mp"><?php echo $role_data['mp']; ?></span>/<span id="role_maxmp"><?php echo $role_data['maxmp']; ?></span></span></div>
                  <div class="col-xs-2" ><span>攻擊力 : <span id="role_atk"><?php echo $role_data['atk']; ?></span></span></div>
                  <div class="col-xs-2" ><span>防禦 : <span id="role_def"><?php echo $role_data['def']; ?></span></span></div>
    					</div>
              <div class="row u_info">
                <div class="col-xs-2"><span style='color : blue'>武器 : <?php if(!isset($equip_data['weapon'])){ echo "無";}else{ echo $equip_data['weapon'];}?></span></div>
    						<div class="col-xs-2"><span style='color : blue'>防具 : <?php if(!isset($equip_data['armor'])){ echo "無";}else{ echo $equip_data['armor'];}?></span></div>
    						<div class="col-xs-2"><span style='color : blue'>鞋子 : <?php if(!isset($equip_data['shoes'])){ echo "無";}else{ echo $equip_data['shoes'];}?></span></div>
                <div class="col-xs-2"><span>金幣 : <?php echo $role_data['gold']; ?></span></div>
                <div class="col-xs-3"><span>經驗值 :<?php echo $role_data['ep']; ?>/<?php echo $exp_data[0]['ep']; ?></span></div>

    					</div>
    				</div>
    		</div>
    </div>
      <hr style="width:100% height:1px;" color="c7c6c6">
      <div class="list">
        <form class="" action="weapon.php" method="post">
          <button type="submit" class="btn btn-info" name="weapon">購買</button>
          <button type="submit" class="btn btn-danger" name="back">離開</button>
          <table class="table text-center">
              <thead class="thead-inverse">
                <tr>
                  <td></td>
                  <td><strong>名稱</strong></td>
                  <td><strong>效果</strong></td>
                  <td><strong>價錢/經驗值</strong></td>
                </tr>
              </thead>
              <tbody>
                <?php foreach($weapon_data as $weapon) { ?>
                  <tr>
                    <td scope="row"><input type="radio" name="weapon_name" id="option1"
                          value="<?php echo $weapon['name']; ?>"
                          <?php if($role_data['gold'] < $weapon['gold'] || $role_data['ep'] < $weapon['exp']){ echo "disabled"; } ?>
                          >
                    </td>
                    <td><?php echo $weapon['name']; ?></td>
                    <td>攻擊力增加  <?php echo $weapon['atk']; ?><br>
                        血量增加  <?php echo $weapon['hp']; ?><br>
                    </td>
                    <td ><span <?php if($role_data['gold'] < $weapon['gold']){echo 'style="color:red"';}?> >金幣 <?php echo $weapon['gold']; ?></span>
                        <?php if($weapon['exp']!=0){?>
                          <br><span <?php if($role_data['ep'] < $weapon['exp']){echo 'style="color:red"';}?>>經驗值 <?php echo $weapon['exp']; ?></span>
                        <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
        </form>
      </div>
  </body>
</html>

<style>
		.user_info{
				border:10px solid transparent;
				border-image: url(img/border/user_border.png) 30 stretch;
				font-size: 16px;
				margin-left: 10%;
				width:80%;
		}
		.u_info{
				padding-top: 11px;
		}
		.contain{
			padding:0.5%;
		}
</style>
<div class="user_info" style="background-image:url('img/background/userboard.jpg');">
		<div class="row contain" style="">
				<div class="col-xs-1">
					<img src="img/role/head.jpg" style="width:75px;height:75px">
				</div>
				<div class = "col-xs-11">
					<div class="row u_info">
						<div class="col-xs-2"><span>名稱 : <?php echo $role_data['nickname']; ?></span></div>
						<div class="col-xs-2"><span >血量 : <span id="role_hp"><?php echo $role_data['hp']; ?></span>/<span id="role_maxhp"><?php echo $role_data['maxhp']; ?></span></span></div>
						<div class="col-xs-2" ><span>魔力 : <span id="role_mp"><?php echo $role_data['mp']; ?></span>/<span id="role_maxmp"><?php echo $role_data['maxmp']; ?></span></span></div>
						<div class="col-xs-2" ><span>攻擊力 : <span id="role_atk"><?php echo $role_data['atk']; ?></span></span></div>
						<div class="col-xs-2" ><span>防禦 : <span id="role_def"><?php echo $role_data['def']; ?></span></span></div>
					</div>
					<div class="row u_info">
							<div class="col-xs-2"><span>等級 : <span id="role_lv"><?php echo $role_data['lv']; ?></span></span></div>
							<div class="col-xs-2"><span>職業 : <?php echo $role_data['role']; ?></span></div>
							<div class="col-xs-2"><span>金幣 : <span id="role_gold"><?php echo $role_data['gold']; ?></span></span></div>
							<div class="col-xs-3"><span>經驗值 :
								<span id="role_ep"><?php echo $role_data['ep']; ?></span>/<span id="role_maxep" data-nep="<?php echo $exp_data[1]['ep'];?>"><?php echo $exp_data[0]['ep']; ?></span>
							</span></div>

					</div>
				</div>
		</div>
</div>

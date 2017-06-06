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
<div class="user_info">
		<div class="row contain" style="">
				<div class="col-xs-1">
					<img src="img/role/head.jpeg" style="width:75px;height:75px">
				</div>
				<div class = "col-xs-11">
					<div class="row u_info">
						<div class="col-xs-2"><span>名稱<?php echo " :\t",$role_data['username']; ?></span></div>
						<div class="col-xs-2"><span id="role_hp">血量<?php echo " :\t",$role_data['hp']; ?></span></div>
						<div class="col-xs-2" ><span>魔力<?php echo " :\t",$role_data['mp']; ?></span></div>
						<div class="col-xs-2" ><span>攻擊力<?php echo " :\t",$role_data['atk']; ?></span></div>
					</div>
					<div class="row u_info">
							<div class="col-xs-2"><span>等級<?php echo " :\t",$role_data['lv']; ?></span></div>
							<div class="col-xs-2"><span>經驗值<?php echo " :\t",$role_data['ep'],"/",$exp_data['ep']; ?></span></div>
							<div class="col-xs-2"><span>職業<?php echo " :\t",$role_data['role']; ?></span></div>
					</div>
				</div>
		</div>
</div>

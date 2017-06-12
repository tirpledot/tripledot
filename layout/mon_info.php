<style>
		.mon_info{
				border:10px solid transparent;
				border-image: url(img/border/branch.png) 30 stretch;
				font-size: 16px;
				margin-left: 10%;
				width:80%;
		}
		.u_info{
				padding-top: 11px;
		}
		.mon_contain{
			padding:0.5%;
		}
</style>
<div class="mon_info" style="background-image:url('img/background/userboard.jpg');">
		<div class="row mon_contain">
				<div class="col-xs-1">
					<img src="img/mon/<?php if(isset( $mon_data['source'])){echo $mon_data['source'];}else{ echo "none.png";}?>" style="width:75px;height:75px">
				</div>
				<div class = "col-xs-11">
					<div class="row u_info">
						<div class="col-xs-2"><span>名稱 :<?php echo $mon_data['name']; ?></span></div>
						<div class="col-xs-2"><span>血量 :<span id="mon_hp" ><?php echo $mon_data['hp']; ?></span></span></div>
						<div class="col-xs-2" ><span>魔力 :<?php echo $mon_data['mp']; ?></span></div>
						<div class="col-xs-2" ><span>攻擊力 :<?php echo $mon_data['atk']; ?></span></div>
						<div class="col-xs-2" ><span>防禦 :<?php echo $mon_data['def']; ?></span></div>
					</div>
					<div class="row u_info">
							<div class="col-xs-2"><span>等級 :<?php echo $mon_data['lv']; ?></span></div>
							<div class="col-xs-2"><span>經驗值 :<span id="mon_ep" ><?php echo $mon_data['ep']; ?></span></span></div>
							<div class="col-xs-2"><span>金幣 :<span id="mon_gold" ><?php echo $mon_data['gold']; ?></span></span></div>
					</div>
				</div>

		</div>
</div>

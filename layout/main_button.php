<style>
    div.btn_surface{
        width:80%;
        height:auto;
        margin-left: 14em;
        margin-right: 14em;
    }
    button{
       width:10em;
    }
    .logout{
      justify-content:flex-end;
    }
</style>
<footer>
  <div class="btn_surface">
    <form class="btn_form" action="main.php" method="post">
      <div>
          <div class="col-xs-2"><button class="btn btn-default" type="submit" name="east" <?php if($map_data['toE'] == '0')echo "disabled"; ?>>東</button></div>
          <div class="col-xs-2"><button class="btn btn-default" type="submit" name="north" <?php if($map_data['toN'] == '0')echo "disabled"; ?>>北</button></div>


          <div class="col-xs-8"><button class="btn btn-default" type="submit" name="battle" <?php if($map_data['class'] == 'none')echo "disabled"; ?>>戰鬥</button></div>
      </div>
      <div = "row">
          <div class="col-xs-2"><button class="btn btn-default" type="submit" name="west" <?php if($map_data['toW'] == '0')echo "disabled"; ?>>西</button></div>
          <div class="col-xs-2"><button class="btn btn-default" type="submit" name="south" <?php if($map_data['toS'] == '0')echo "disabled"; ?>>南</button></div>
          <div class="col-xs-2">
            <button class="btn btn-default" type="submit" name="<?php if($map_data['class'] != 'heal'){ echo "return";}else{echo "heal";}?>">
              <?php if($map_data['class'] != 'heal'){ echo "回城";}else{echo "治癒";}?>
            </button>
          </div>
          <div class="col-xs-2 col-xs-offset-4"><button class="btn btn-default" type="submit" name="logout">登出</button></div>
      </div>
    </form>

  </div>

</footer>

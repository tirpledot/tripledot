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
  <div class="btn_surface">
    <form class="btn_form" action="main.php" method="post">
      <div>
          <div class="col-xs-2"><button class="btn btn-success" type="submit" name="east" <?php if($map_data['toE'] == '0')echo "disabled"; ?>>東</button></div>
          <div class="col-xs-2"><button class="btn btn-success" type="submit" name="north" <?php if($map_data['toN'] == '0')echo "disabled"; ?>>北</button></div>
          <div class="col-xs-2">
              <?php if($map_data['class'] == 'buy'){ ?>
                  <button class="btn btn-warning" type="submit" name="buy" >購買</button>
              <?php }else{ ?>
                  <button class="btn btn-warning" type="submit" name="battle" <?php if($map_data['class'] == 'none' || $role_data['hp'] <= 0)echo "disabled"; ?>>戰鬥</button>
              <?php } ?>
          </div>
          <div class="col-xs-6"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">裝備</button></div>

          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content" style="padding:2em;">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>類型</th>
                        <th>名稱</th>
                        <th>能力</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">武器</th>
                        <td><?php if(!isset($role_weapon['name'])){ echo "無";}else{ echo $role_weapon['name'];} ?></td>
                        <td><?php if(!isset($equip_data['weapon'])){ echo "無";}
                                  else{?>
                                      攻擊力增加  <?php echo $role_weapon['atk']; ?><br>
                                      血量增加  <?php echo $role_weapon['hp']; ?><br>
                                      <?php } ?>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">防具</th>
                        <td><?php if(!isset($equip_data['armor'])){ echo "無";} ?></td>
                        <td><?php if(!isset($equip_data['armor'])){ echo "無";} ?></td>
                      </tr>
                      <tr>
                        <th scope="row">鞋子</th>
                        <td><?php if(!isset($equip_data['shoes'])){ echo "無";} ?></td>
                        <td><?php if(!isset($equip_data['shoes'])){ echo "無";} ?></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
      </div>
      <div = "row">
          <div class="col-xs-2"><button class="btn btn-success" type="submit" name="west" <?php if($map_data['toW'] == '0')echo "disabled"; ?>>西</button></div>
          <div class="col-xs-2"><button class="btn btn-success" type="submit" name="south" <?php if($map_data['toS'] == '0')echo "disabled"; ?>>南</button></div>
          <div class="col-xs-2">
            <button class="btn btn-default" type="submit" name="<?php if($map_data['class'] != 'heal'){ echo "return";}else{echo "heal";}?>">
              <?php if($map_data['class'] != 'heal'){ echo "回城";}else{echo "治癒";}?>
            </button>
          </div>
          <div class="col-xs-2 col-xs-offset-4"><button class="btn btn-danger" type="submit" name="logout">登出</button></div>
      </div>
    </form>

  </div>

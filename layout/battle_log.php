<style>
    .battle_log{
      margin-left: 20%;
    }
</style>
<div class="battle_log" id="battle_log" style="height:90%; overflow-x:hidden;overflow-y:auto">
    <?php foreach($_SESSION['battle'] as $log){ ?>
        <h4><?php echo $log;?></h4>
    <?php } ?>
</div>

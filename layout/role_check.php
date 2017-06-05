<h1>職業確認</h1>
<div class="role">
  <form class="" action="role.php"  method="post">
        <div class="form-group">
          <label for="nickname">暱稱</label>
          <input type="hidden" class="form-control" value="<?php if(isset($_POST['nickname'])){echo $_POST['nickname'];} ?>" id="nickname" name="nickname">
          <h4><?php echo $_POST['nickname']; ?><h4>
        </div>
        <div class="form-group">
          <label for="sex">性別</label>
          <input type="hidden" class="form-control" value="<?php if(isset($_POST['sex'])){echo $_POST['sex'];} ?>" id="sex" name="sex">
          <h4><?php echo $_POST['sex']; ?><h4>
        </div>
        <div class="form-group">
            <label for="role">職業</label>
            <input type="hidden" class="form-control" value="<?php if(isset($_POST['role'])){echo $_POST['role'];} ?>" id="role" name="role">
            <h4><?php echo $_POST['role']; ?><h4>
        </div>
      <div class="form-group sub">
        <button type="submit" name="comfirmbtn" id="checkbtn">確定</button>
        <button type="submit" name="resetbtn" id="resetbtn">重設</button>
      </div>
      </form>
</div>

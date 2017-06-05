<h1>職業選擇</h1>
<div class="role">
  <form class="" action="role.php"  method="post">
        <div class="form-group">
          <label for="nickname">暱稱</label>
          <input type="text" class="form-control" value="<?php if(isset($_POST['nickname'])){echo $_POST['nickname'];} ?>" id="nickname" name="nickname" placeholder="暱稱" required="required">
        </div>
        <div class="form-group">
          <label for="sex">性別</label>
          <select class="form-control" id="sex" name = "sex">
              <option value="男">男</option>
              <option value="女">女</option>
          </select>
        </div>
        <div class="form-group">
            <label for="role">職業</label>
            <select class="form-control" id="role" name = "role">
                <option value="測試者">測試者</option>
            </select>
        </div>
      <div class="form-group sub">
        <button type="submit" name="checkbtn" id="checkbtn">確定</button>
      </div>
      </form>
</div>

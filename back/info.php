<style>
  form {
    width: 35rem;

  }

  .btn {
    background-color: var(--theme);
  }
</style>
<h2 class="text-center">個人資料管理</h2>
<div class="container d-flex justify-content-center">
  <?php
  $Info = new DB('info');
  $infos = $Info->all();
  foreach ($infos as $info) {

  ?>
    <form action="api/edit_info.php" method="post" class="mt-3">
      <label for="name">姓名</label>
      <div class="input-group mb-3">
        <span class="input-group-text" id="name"><i class="fas fa-edit"></i></span>
        <input type="text" class="form-control" name=name required value=<?=$info['name']?> >
      </div>
      <label for="engname">英文姓名</label>
      <div class="input-group mb-3">
        <span class="input-group-text" id="engname"><i class="fas fa-edit"></i></span>
        <input type="text" class="form-control" name=engname required value=<?=$info['engname']?> >
      </div>
      <label for="engname">生日</label>
      <div class="input-group mb-3">
        <span class="input-group-text" id="birthday"><i class="fas fa-edit"></i></span>
        <input type="date" class="form-control" name=birthday required value=<?=$info['birthday']?> >
      </div>
      <label for="hobbies">興趣</label>
      <div class="input-group mb-3">
        <span class="input-group-text" id="hobbies"><i class="fas fa-edit"></i></span>
        <?php
          $aa=unserialize($info['hobbies']);
          
        ?>
        <input type="text" class="form-control" name=hobbies[] required value=<?=$aa[0]?> >
        <input type="text" class="form-control" name=hobbies[] required value=<?=$aa[1]?> >
        <input type="text" class="form-control" name=hobbies[] required value=<?=$aa[2]?> >
        <input type="text" class="form-control" name=hobbies[] required value=<?=$aa[3]?> >
        <?
        }
        ?>
      </div>
      <label for="shortintro">簡短介紹</label>
      <div class="input-group">
        <textarea class="form-control" name="shortintro" rows="5" cols="33" required >
        <?=$info['shortintro']?>
        </textarea>
      </div>

    <div class="mt-3">
      <input type="submit" class="btn btn-theme" value="提交">
      <input type="reset" class="btn btn-theme" value="重置">
      <input type="hidden" name="id" value=<?=$info['id']?> >
    </div>
    </form>
    <?php
  }
    ?>
</div>
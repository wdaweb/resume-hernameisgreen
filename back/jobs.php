
<style>
form{
    width:35rem;
    margin:auto;
}
select{
    width: 35vw;
}

.btn {
    background-color: var(--theme);
  }



</style>






<form action="api/edit_jobs.php" method="post">
<?php
$Jobs = new DB('jobs');
$jobs=$Jobs->all();
foreach($jobs as $job){



?>
<label for="type">希望性質</label>
      <div class="input-group mb-3 w-100">
       <select name="type[]" class="type-select" multiple="multiple" >
       <?php
        $op=unserialize($job['type']);
       ?>
       <option value="fulltime" <?php  $a=(in_array("fulltime" ,$op))?"selected":""; echo $a;?> >全職工作</option>
       <option value="pt" <?php  $a=(in_array("pt" ,$op))?"selected":""; echo $a;?> >兼職工作</option>
       <option value="soho"<?php  $a=(in_array("soho" ,$op))?"selected":""; echo $a;?> >自由接案</option>
       </select>
      </div>
  
      <label for="workday">可上班日</label>
      <div class="input-group mb-3">
        <span class="input-group-text" id="workday"><i class="fas fa-edit"></i></span>
        <input type="text" class="form-control" name="workday" required value=<?=$job['workday']?> >
      </div>
      <label for="jobtitle">希望職務名稱</label>
      <div class="input-group mb-3">
        <span class="input-group-text" ><i class="fas fa-edit"></i></span>
       
        <input type="text" class="form-control" name=jobtitle required  value=<?=$job['jobtitle']?> >
     </div>
      <label for="salary">希望待遇</label>
      <div class="input-group mb-3">
        <span class="input-group-text" ><i class="fas fa-edit"></i></span>
       
        <input type="text" class="form-control" name="salary" required value=<?=$job['salary']?> >
     </div>
     <label for="area">希望上班地點</label>
     <div class="input-group mb-3">
     <br>
       <select name="area[]" class="area-select" multiple="multiple" >
       <?php
        $area=unserialize($job['area']);
       ?>
        <option value="基隆市" <?php  $a=(in_array("基隆市" ,$area))?"selected":""; echo $a;?> >基隆市</option>
        <option value="台北市" <?php  $a=(in_array("台北市" ,$area))?"selected":""; echo $a;?> >台北市</option>
        <option value="新北市" <?php  $a=(in_array("新北市" ,$area))?"selected":""; echo $a;?> >新北市</option> >新北市</option>
        <option value="桃園市" <?php  $a=(in_array("桃園市" ,$area))?"selected":""; echo $a;?> >桃園市</option>
        <option value="新竹縣市" <?php  $a=(in_array("新竹縣市" ,$area))?"selected":""; echo $a;?> >新竹縣市</option>
        <option value="苗栗縣" <?php  $a=(in_array("苗栗縣" ,$area))?"selected":""; echo $a;?> >苗栗縣</option>
        <option value="台中市" <?php  $a=(in_array("台中市" ,$area))?"selected":""; echo $a;?> >台中市</option>
        <option value="彰化縣" <?php  $a=(in_array("彰化縣" ,$area))?"selected":""; echo $a;?> >彰化縣</option>
        <option value="雲林縣" <?php  $a=(in_array("雲林縣" ,$area))?"selected":""; echo $a;?> >雲林縣</option>
        <option value="嘉義縣市" <?php  $a=(in_array("嘉義縣市" ,$area))?"selected":""; echo $a;?> >嘉義縣市</option>
        <option value="台南市" <?php  $a=(in_array("台南市" ,$area))?"selected":""; echo $a;?> >台南市</option>
        <option value="高雄市" <?php  $a=(in_array("高雄市" ,$area))?"selected":""; echo $a;?> >高雄市</option>
        <option value="屏東縣" <?php  $a=(in_array("屏東縣" ,$area))?"selected":""; echo $a;?> >屏東縣</option>
        <option value="宜蘭縣"  <?php  $a=(in_array("宜蘭縣" ,$area))?"selected":""; echo $a;?>>宜蘭縣</option>
        <option value="花蓮縣"  <?php  $a=(in_array("花蓮縣" ,$area))?"selected":""; echo $a;?> >花蓮縣</option>
        <option value="台東縣" <?php  $a=(in_array("台東縣" ,$area))?"selected":""; echo $a;?> >台東縣</option>
        <option value="連江縣"  <?php  $a=(in_array("連江縣" ,$area))?"selected":""; echo $a;?>>連江縣</option>
        <option value="金門縣"  <?php  $a=(in_array("金門縣" ,$area))?"selected":""; echo $a;?>>金門縣</option>
        <option value="澎湖縣" <?php  $a=(in_array("澎湖縣" ,$area))?"selected":""; echo $a;?> >澎湖縣</option>
        <option value="綠島"  <?php  $a=(in_array("綠島" ,$area))?"selected":""; echo $a;?>>綠島</option>
        <option value="蘭嶼"  <?php  $a=(in_array("蘭嶼" ,$area))?"selected":""; echo $a;?>>蘭嶼</option> 
       </select>
      </div>
 


    <div class="mt-3">
      <input type="submit" class="btn btn-theme" value="提交">
      <input type="reset" class="btn btn-theme" value="重置">
      <input type="hidden" name="id" value=<?=$job['id']?> >
    </div>

</form>
<?php
}
?>
<script>

$(document).ready(function() {
    $('.type-select').select2();
});
$(document).ready(function() {
    $('.area-select').select2();
});
</script>
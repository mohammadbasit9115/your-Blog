<?php include(__DIR__ . "/../../layouts/header.php")?>
        
<form   action="create" method="POST" enctype="multipart/form-data">
<div class="form-row align-items-center">
  <div style=color:red><?php if(isset($error)):echo $error; endif ?></div>
  <div class="form-group col-7">
    <label for="exampleInputTitle">New Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputTitle" aria-describedby="TitleHelp">
  </div>
 
  <div class="form-group col-7">
   
    <label for="exampleFormControlTextarea1">Descreption</label>
    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group col-7">
  <input type="file" name="img" id="">
 </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

		
	<?php include(__DIR__ . "/../../layouts/footer.php")?>
  
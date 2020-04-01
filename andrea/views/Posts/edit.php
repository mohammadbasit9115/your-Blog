<?php include(__DIR__ . "/../../layouts/header.php")?>
        

  <form   action="edit" method="POST" enctype="multipart/form-data">
<div class="card" style="width: 18rem;">
  <img src="<?php 
			$image = $post->img;
			$UrlImg = preg_match('/your-Blog.*/',$image,$array);
			$UrlImg = array_shift($array);
			echo  '/' .$UrlImg;?>" class="card-img-top" alt="...">
  <div class="card-body">
  <label for="exampleInputTitle">New Title</label>
  <input type="hidden" name="id" value="<?php echo $post['id']; ?>" >
    <input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>" id="exampleInputTitle" aria-describedby="TitleHelp">
	<div style=color:red><?php if(isset($error)):echo $error; endif ?></div>
	<label for="exampleFormControlTextarea1">Descreption</label>
    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $post['content']; ?></textarea>
	<input type="file" name="img" id="" value=>
	<input type="hidden" name="img" value="<?php echo $post['img']; ?>" >
	<button type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</form>
		
	<?php include(__DIR__ . "/../../layouts/footer.php")?>
  
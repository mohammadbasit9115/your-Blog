<?php include(__DIR__ . "/../layouts/header.php")?>
		
			<section class="align-self-stretch">
			<div class="card" style="width: 18rem;">
					<img src="<?php 
			$image = $post->img;
			$UrlImg = preg_match('/your-Blog.*/',$image,$array);
			$UrlImg = array_shift($array);
			echo  '/' .$UrlImg;?>" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title"><?php echo $post['title'];?></h5>
					<p class="card-text"><?php echo $post['content'];?></p>
				</div>
				
					<ul class="list-group list-group-flush">
					<?php foreach($comments as $comment ): ?>
						<li class="list-group-item">
						<?php
						 echo $comment->comment ;
						 if(isset($_SESSION['userName']))
						 {
							if($_SESSION['user_id'] === $comment->user_id)
							{
						   echo  '<div class="card-body">' . 
							   '<a href="Cdelete?id=' . $comment->id . '" class="card-link">Delete</a>' .
						   '</div>';
							}
							if($_SESSION['user_id'] === $post['user_id'] AND $_SESSION['user_id'] !== $comment->user_id)
							{
							   echo  '<div class="card-body">' .
							   '<a href="Cdelete?id=' . $comment->id . '" class="card-link">Delete</a>
							   </div>';
							}
						 }
					
						 ?>
						</li>
						<?php endforeach ?>
					
					</ul>
				<?php if(isset($_SESSION['userName'])): 
				echo '<form action="article?id=' . $post["id"] . '" method="POST">' .
				'<input type="text" name="comment" class="form-control"   id="exampleInputTitle" aria-describedby="TitleHelp" placeholder="New Comment">' .
				'<input type="submit" value="Kommentar hinzufügen" class="btn btn-primary" />
				</form>';
				endif ?>
				<?php 
				if(isset($_SESSION['userName']))
				{
					if($_SESSION['user_id'] === $post['user_id'])
					{
					echo  '<div class="card-body">' .
								'<a href="edit?id=' .  $post["id"] . '" class="card-link">Edit</a>' .
								'<a href="delete?id=' .  $post["id"] . '" class="card-link">Delete</a>
							</div>';
					}
				}?>
			
			</div>


					</section>

		<!-- END COLORLIB-MAIN -->
	<?php include(__DIR__ . "/../layouts/footer.php")?>
  


 
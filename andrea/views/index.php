<?php include(__DIR__ . "/../layouts/header.php")?>
		
			<section class="align-self-stretch">
	    
	    		<div class="row d-flex">
	    			<div class="col-xl-8 py-5 px-md-5">
	    				<div class="row pt-md-4">
							<?php foreach($posts as $post):?>
			    			<div class="col-md-12">
									<div class="blog-entry ftco-animate d-md-flex">
										<a href="single.html" class="img img-2" ></a>
										<div class="text text-2 pl-md-4">
				              <h3 class="mb-2"><a href="single.html"><?php echo $post->title;?></a></h3>
				              <div class="meta-wrap">
												<p class="meta">
				              		<span><i class="icon-calendar mr-2"></i>June 28, 2019 </span>
				              		<span><a href="single.html"><i class="icon-folder-o mr-2"></i>Travel</a></span>
				              		<span><i class="icon-comment2 mr-2"></i>5 Comment</span>
				              	</p>
			              	</div>
				              <p class="mb-4"><?php echo $post->content;?></p>
				              <p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
				            			</div>
									</div>
							</div>
							<?php endforeach?>	
			    		</div><!-- END-->
						<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item"><a class="page-link" href="#">Previous</a></li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">Next</a></li>
							</ul>
						</nav>
			
	    			<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
	            <div class="sidebar-box pt-md-4">
	              <form action="#" class="search-form">
	                <div class="form-group">
	                  <span class="icon icon-search"></span>
	                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
	                </div>
	              </form>
				</div>
					</div>
					</div>
	    		</div>
					</section>

		<!-- END COLORLIB-MAIN -->
	<?php include(__DIR__ . "/../layouts/footer.php")?>
  


 
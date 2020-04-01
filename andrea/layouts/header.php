<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Final</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet"  href="/your-Blog/andrea/layouts/css/bootstrap.min.css">
   <link rel="stylesheet" href="/your-Blog/andrea/layouts/css/main.css">
  </head>
  <body>

	<div class="d-flex p-2 bd-highlight">
		<a href="#" class=""><i></i></a>
        <aside class="d-flex align-items-start flex-column bd-highlight mb-3" style="height: 100%"class="">
       
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="nav flex-column">
          <?php
          if(isset($_SESSION['userName'])){
          echo  '<div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
            echo $_SESSION['userName'];
            echo ' </a>    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="create">New Article</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="logout">LogOut</a>
          </div>
        </div>';
          }else {
            echo '<li class="nav-item"><a class="nav-link" href="singup">SingUp</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="login">LogIn</a></li>';
          }?>
        
          <li class="nav-item"><a class="nav-link" href="index">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="fashion">Fashion</a></li>
          <li class="nav-item"><a class="nav-link" href="travel">Travel</a></li>
          <li class="nav-item"><a class="nav-link" href="about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>
                </ul>
            </div>
         
      

          
					
			</nav>

			<div class="p-2 bd-highlight" >
                <h3 id="" class="mb-4"><a href="index.html" >Andrea <span>Moore</span></a></h1>
				<div class="p-2 bd-highlight">
					<h3>Subscribe for newsletter</h3>
					<form action="#" class="">
            <div class="p-2 bd-highlight">
            	<div class=""><span class=""></span></div>
              <input type="text" class="" placeholder="Enter Email Address">
            </div>
          </form>
				</div>
				<p class=""><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	  Copyright &copy;All rights reserved | This template is made with 
	  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>
        </aside> <!-- END COLORLIB-ASIDE -->
  
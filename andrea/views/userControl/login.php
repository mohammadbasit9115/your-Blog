<?php include(__DIR__ . "/../../layouts/header.php")?>
		
<form class=" sing"  action="login" method="POST" >
<div class="form-row align-items-center">

  <div class="form-group col-7">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name="userData" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
 
  <div class="form-group col-7">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  
  <div class="form-group form-check">
    <input type="checkbox" name="agree" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">I accept</label>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

		
	<?php include(__DIR__ . "/../../layouts/footer.php")?>
  


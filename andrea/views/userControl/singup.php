<?php include(__DIR__ . "/../../layouts/header.php")?>
		
<form class="sing"  action="singup" method="POST" >
	<div class="form-row">
			<div class="form-group col-8">
				<label for="exampleInputUserName">User Name</label>
				<input type="text" name="username" class="form-control" id="exampleInputUserName" >
			</div>
			<div class="form-group col-5">
				<label for="exampleInputFirstName">First Name</label>
				<input type="text" name="firstname" class="form-control" id="exampleInputFirstName" >
			</div>
			<div class="form-group col-5">
				<label for="exampleInputLastName">Last Name</label>
				<input type="text" name="lastname" class="form-control" id="exampleInputLastName" >
			</div>
			<div class="form-group col-5">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group col-5">
				<label for="exampleInputConfirmEmail2">Confirm Email address</label>
				<input type="email" name="conemail" class="form-control" id="exampleInputConfirmEmail2" aria-describedby="emailHelp">
			</div>
			<div class="form-group col-5">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password" class="form-control" id="exampleInputPassword1">
			</div>
			<div class="form-group col-5">
				<label for="exampleInputConfirmPassword2">Confirm Password</label>
				<input type="password" name="conpassword" class="form-control" id="exampleInputConfirmPassword2">
			</div>
			
			</div>
			<div class="form-row">
					<div class="form-group col-5 ">
						
						<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						
							<option selected hidden>Genre</option>
							<option value="1">male</option>
							<option value="2">famle</option>
							<option value="3">other</option>
						</select>
						<input type="checkbox" name="agree" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1">I accept</label>
					</div>

			</div>
	
  			<button type="submit" class="btn btn-primary">Submit</button>
</form>

		
	<?php include(__DIR__ . "/../../layouts/footer.php")?>
  


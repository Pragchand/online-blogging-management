<?php require("registration_form_process.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
	<script type="text/javascript" src="clientside_validation.js"></script>
    
	<style>
        #body_background {
            background: #52D3D8;
        }
        #sidebar_design
        {
        	background: #2D9596;
        }
        .form_bg
        {
        	background: #37B5B6;
        	border-radius: 10px;
        }
    </style>
</head>
<body id="body_background">
    <?php include("header.php") ?>
	<div class="container-fluid">
		<div class="row">
            <?php include("side_bar.php"); ?>
            <div class="col-sm-1"></div>
			<div class="col-sm-6 text-light p-5">
					<h1 class="text-center text-primary">
						<?php if(isset($_GET['message'])){ echo $_GET['message']; } ?>
					</h1> 
				<h1 class="text-center">Registration form</h1>
				<div class="border border-2 mt-5 form_bg p-5">

					<form action="registration_form_process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
						<h1 class="text-center mb-5 text-light">Ctreat New Account</h1>
				  		<div class="col">
				  			<label for="inputEmail4" class="form-label">First Name: </label>
				    		<input  type="text" name="first_name" class="form-control" placeholder="First name" aria-label="First name" >
				    		<span id="first_name_msg"><?= $first_name_msg??"";  ?></span>
				  		</div>
				  		<div class="col">
				  			<label for="inputEmail4" class="form-label">Last Name: </label>
				    		<input  type="text" name="last_name" class="form-control" placeholder="Last name" aria-label="Last name" >
				    		 <span id="last_name_msg"><?=  $last_name_msg??"";  ?></span>
				  		</div>
				  		<div class="col">
				   	 		<label for="inputEmail4" class="form-label">Email: </label>
				    		<input  type="email" name="email" class="form-control" aria-label="email" >
				    		<span id="email_msg"><?=  $email_msg??"";  ?></span>
				  		</div>
				  		<div class="col">
				    		<label for="inputPassword4" class="form-label">Password: </label>
				    		<input  type="password" name="password" class="form-control mb-3" aria-label="password" >
				    		 <span id="password_msg"><?=  $password_msg??"";  ?></span>
				  		</div>
				  		<div class="col">
				    		<label>Gender: </label>
				    		<input  type="radio" name="gender" value="Male" class="mb-3 ms-3" >Male
				    		<input  type="radio" name="gender" value="Female" class="mb-3 ms-3" >Female
				    		<span id="gender_msg"><?=  $gender_msg??"";  ?></span>
				  		</div>
				  		<div class="col">
				    		<label>Date of Birth: </label>
				    		<input  type="date" name="date_of_birth" class="form-control mt-3 mb-3" >
				    		 <span id="date_of_birth_msg"><?=  $date_of_birth_msg??"";  ?></span>
				  		</div>
				  		<div class="col">
				    		<label>Profile Image: </label>
				    		<input  type="file" name="user_image" class="form-control mt-3 mb-3">
				  		</div>
				  		<div class="col-12">
				    		<label>Address</label>
				    		<textarea name="address" class="form-control" placeholder="1234 Main St" ></textarea>
				    		<span id="address_msg"><?=  $address_msg??"";  ?></span>
				  		</div>
						 <div class="col-md-12 mt-3 mb-3">
				    		<label class="">Role</label>
				    		<select name="role" class="col-md-12">
				    			<option value="">--Select--</option>
				    			<option value="1">1</option>
				    			<option value="2">2</option>
				    		</select>
				  		</div>
				  		<div class="col-md-12  mb-3">
				    		<label class="form-label">Status</label>
				    		<select name="is_active" class="col-md-12">
						    	<option value="">--Select--</option>
						    	<option value="Active">Active</option>
						    	<option value="InActive">InActive</option>
						    </select>
						 </div>	
				  		<div class="col-12">
				    		<button type="reset" name="reset" class="btn btn-light text-primary ms-3 mb-3 mt-3">Reset</button>
				    		<button type="submit" name="register" class="btn btn-light text-primary ms-3 mb-3 mt-3">Register</button>
				  		</div>
					</form>
				</div>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
	<br><br>
    <footer>
        <?php include("../frontend/footer.php"); ?>
    </footer>
</body>
</html>
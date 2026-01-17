<?php 
	require_once("serverside_validation.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration form</title>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
	<style>
        #body_background {
            background: #52D3D8;
        }
        #sidebar_design
        {
        	background: #2D9596;
        }
        span{
			color: red;
		}
    </style>
    <script type="text/javascript" src="clientside_validation.js"></script>
</head>
<body id="body_background">
    <?php include("header.php") ?>
	<div class="container-fluid">
		<div class="row mt-5 mb-5 text-light">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<h2 class="text-primary text-center">
				<?php 
					if (isset($_GET['message'])){
						echo $_GET['message'];
					}
				?>
			</h2>
			<div class="border border-2 p-3">
			<h1 class="text-center mb-5 text-light">Registration form</h1>
				<form method="POST" action="serverside_validation.php" onsubmit="return validateForm()" enctype="multipart/form-data">
				  <div class="col">
				  	<label class="form-label">First Name: <span>*</span></label>
				    <input type="text" name="first_name" id="first_name" class="form-control" required>
				    <span id="first_name_msg"><?=  $first_name_msg??"";  ?></span>
				  </div>
				  <div class="col mt-3">
				  	<label class="form-label">Last Name: </label>
				    <input type="text" name="last_name" id="last_name" class="form-control" required>
				    <span id="last_name_msg"><?=  $last_name_msg??"";  ?></span>
				  </div>
				  <div class="col mt-3">
				    <label class="form-label">Email: <span>*</span></label>
				    <input type="email" name="email" id="email" class="form-control" required>
				    <span id="email_msg"><?=  $email_msg??"";  ?></span>
				  </div>
				  <div class="col mt-3">
				    <label class="form-label">Password: <span>*</span></label>
				    <input type="password" name="password" id="password" class="form-control" required>
				    <span id="password_msg"><?=  $password_msg??"";  ?></span>
				  </div>
				  <div class="col mt-3">
				    <label class="form-label">Address: <span>*</span></label>
				    <textarea name="address" id="adddress" class="form-control"></textarea>
				    <span id="address_msg"><?=  $address_msg??"";  ?></span>
				  </div>
				  <div class="col mt-3">
				    <label class="form-label">Gender: <span>*</span></label>
				    <input type="radio" name="gender" value="Male" class="ms-3" required>Male
				    <input type="radio" name="gender" value="Female" class="ms-3" required>Female
				    <span id="gender_msg"><?=  $gender_msg??"";  ?></span>
				  </div>
				  <div class="col mt-3">
				    <label class="form-label">Date of Birth <span>*</span></label>
				    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
				    <span id="date_of_birth_msg"><?=  $date_of_birth_msg??"";  ?></span>
				  </div>
				  <div class="col-12 mt-3 mb-3">
				     	<label class="m-2">Profile Image: </label>
				     	<input type="file" name="user_image" class="form-control" id="profile_image" required>
				  </div>
				  <div class="col-12">
				    <button type="submit" name="register_user" class="btn btn-light text-primary">Register</button>

				    <button type="reset" name="reset" class="btn btn-light text-primary">Reset</button>
				  </div>
				</form>
			</div>
		</div>
		<div class="col-sm-4"></div>
		</div>
		</div>
        <?php include("footer.php"); ?>
</body>
</html>
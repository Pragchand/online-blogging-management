<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login System</title>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
  <!-- <script text/javascript src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
  <style>
    .logo{
      height: 10vh;
      border-radius: 50%;
    }
    #nav_bg
    {
      background: #37B5B6;
    }
    #body_background
    {
      background:#52D3D8;
    }
  </style>
</head>
<body id="body_background">
	<?php include("header.php") ?>
    <div class="container-fluid">
  <h4  class="text-primary text-center mt-5 mb-5">
    <?php 
      if(isset($_GET['message'])){
        echo $_GET['message'];
      }
     ?>
  </h4>
      <div class="row mt-5 mb-5">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 border border-2">
            <h1 class="text-center text-light">Login Here</h1>
            <form method="POST" action="login_process.php" class="px-4 py-3">
              <div class="mb-3">
                <label class="form-label  text-light">Email address</label>
                <input type="email" name="email" class="form-control" placeholder="email@example.com">
              </div>
              <div class="mb-3">
                <label class="form-label text-light">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input type="checkbox" name="checkbox" class="form-check-input">
                  <label class="form-check-label text-light">
                    Remember me
                  </label>
                </div>
              </div>
              <button type="submit" name="login" class="btn btn-light">Login</button>
            </form>
            <span class="text-light">New around here?</span>
            <a style="text-decoration:none;" href="registration_form.php">Sign up</a><br>
            <a class="" href="forgott.php">Forgot password?</a> <span class="text-light">OR</span> <a href="change_password.php">Change Password</a>
          </div>
        </div>
        <div class="col-sm-2"></div>
      </div>
      <div style="margin-top: 130px;">
        <?php include("footer.php"); ?>
      </div>
</body>
</html>
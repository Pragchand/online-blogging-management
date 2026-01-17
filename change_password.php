<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Change Password</title>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
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
      <div class="row mt-5 mb-5">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 border border-2">
          <h4 class="text-center text-danger">
            <?php if (isset($_SESSION['error'])){
              echo $_SESSION['error'];
            } ?>
          </h4>
            <h1 class="text-center  text-light">Change your password</h1>
            <form method="POST" action="password_process.php" class="px-4 py-3">
              <div class="mb-3">
                <label class="form-label text-light">Email</label>
                <input type="email" name="email" class="form-control"  placeholder="Email">
              </div>
              <div class="mb-3">
                <label class="form-label text-light">Old password</label>
                <input type="password" name="old_password" class="form-control"  placeholder="Old password">
              </div>
              <div class="mb-3">
                <label class="form-label text-light">New password</label>
                <input type="password" name="new_password" class="form-control"  placeholder="New password">
              </div>
              <div class="mb-3">
                <label class="form-label text-light">Confrim password</label>
                <input type="password" name="confrim_password" class="form-control"  placeholder="Confrim password">
              </div>
                <button type="sumbit" name="change_password" class="form-control" style="border: none; padding: 6px; border-radius: 8px; background: lightgrey;">Submit</button>
            </form>
            </form>
          </div>
        </div>
        <div class="col-sm-2"></div>
      </div>
        <?php include("footer.php"); ?>
  <!-- <script text/javascript src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
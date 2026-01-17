<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Forgott Password</title>
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
            <h1 class="text-center  text-light">Forgott your password</h1>
            <form method="" action="" class="px-4 py-3">
              <div class="mb-3">
                <label class="form-label  text-light">Email </label>
                <input type="email" name="email" class="form-control"  placeholder="email@example.com">
              </div>
              <div class="mb-3">
                <label class="form-label text-light">Message code</label>
                <input type="text" name="message_code" class="form-control"  placeholder="Message code">
              </div>
              <div class="mb-3">
                <label class="form-label text-light">New password</label>
                <input type="password" name="new_password" class="form-control"  placeholder="New password">
              </div>
              <div class="mb-3">
                <label class="form-label text-light">Confrim password</label>
                <input type="password" name="confrim_password" class="form-control"  placeholder="Confrim password">
              </div>
              <a href="login.php" class="d-grid"><button type="sumbit" name="submit" style="border: none; padding: 6px; border-radius: 8px;">Submit</button></a>
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
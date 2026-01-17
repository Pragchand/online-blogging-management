<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Panel</title>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
  <style>
    #body_background
    {
      background:#52D3D8;
    }
  </style>
</head>
<body id="body_background">
  <?php 
    include("header.php");
    if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 2) {
        // exit();
        //var_dump($_SESSION);
        header("Location: ../login.php?message=Please login first...!");
     }
  ?>
      <h1 class="text-center text-uppercase shadow" id="headline">Online blogging system</h1> 
  <?php
    include("../require/slider.php");
    include("post.php");
    include("our_blog.php");
    include("../require/about_us.php");
    include("../feedback.php");
    include("../footer.php"); 
  ?>

  <script text/javascript src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <?php
     /*session_destroy();
     session_unset();*/
     ?>
</body>
</html>
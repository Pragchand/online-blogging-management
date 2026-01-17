<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Blogging System</title>
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
  <style>
    #body_background
    {
      background:#52D3D8;
    }
    #headline
    {
      color: white;
      padding: 50px;
    }
  </style>
</head>
<body id="body_background">
  <?php 
      include("header.php");
   ?>
    <h1 class="text-center text-uppercase shadow" id="headline">Online blogging system</h1>
  <?php 
    include("slider.php"); 
    include("post.php");
    include("our_blog.php");
    include("about_us.php");
  ?>
    <form action="feedback_process.php" method="POST">
  <?php
    include("feedback.php");
  ?>
  </form>
  <div style="width:100%;">
    <?php include("footer.php"); ?>
  </div>
  <div>
    
  </div>
  <!-- <script text/javascript src="bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
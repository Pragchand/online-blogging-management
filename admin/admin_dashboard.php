<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <style>
        #body_background {
            background: #52D3D8;
/*            background: white;*/
        }
    </style>
</head>
<body id="body_background">
    <?php include("header.php"); 
      if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 1) {
        header("Location: ../frontend/login.php?message=Please login first...!");
        // exit();
        // var_dump($_SESSION);
     } 
 ?>
    <div class="container-fluid">
        <div class="row">
        	<?php include("side_bar.php"); ?>
            <div class="col-sm-9 text-light">
                <input class="form-control mt-3" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                <label for="exampleDataList" class="form-label text-light">Search</label>
                <datalist id="datalistOptions">
                  <option value="San Francisco">
                  <option value="New York">
                  <option value="Seattle">
                  <option value="Los Angeles">
                  <option value="Chicago">
                </datalist>
                <h1 class="mt-3" style="font-family: serif;">
                    Welcome <?= $_SESSION['user']['first_name']." ".$_SESSION['user']['last_name']; ?> 
                </h1>
                <p class="text-center">in your admin panel</p>
                <?php include("view_links.php"); ?>
                
            </div>
        </div>
    </div>
        <?php include("../frontend/footer.php"); ?>
    <!-- <script text/javascript src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    <?php
     /*session_destroy();
     session_unset();*/
     ?>
</body>
</html>

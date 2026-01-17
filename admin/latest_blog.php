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
        }
    </style>
</head>
<body id="body_background">
    <?php include("header.php") ?>
    <!-- <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            
            <div class="col-sm-1"></div>
        </div>
    </div> -->
    <div class="container-fluid">
        <div class="row">
        	<?php include("side_bar.php") ?>
            <div class="col-sm-9 text-light">
                <label for="exampleDataList" class="form-label text-light">Search</label>
                <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                <datalist id="datalistOptions">
                  <option value="San Francisco">
                  <option value="New York">
                  <option value="Seattle">
                  <option value="Los Angeles">
                  <option value="Chicago">
                </datalist>
                <h1 class="mt-3" style="font-family: serif;">
                    Welcome Pragchand Bheel 
                </h1>
                <p class="text-center">in your admin panel</p>
                <?php include("../frontend/post.php"); ?>
                <?php include("../frontend/our_blog.php"); ?>
            </div>
        </div>
    </div>
    <footer>
        <?php include("../frontend/footer.php"); ?>
    </footer>
    <!-- <script text/javascript src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>

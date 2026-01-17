<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Blog</title>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">

  <style>
   
  #body_background
    {
      background:#52D3D8;
    }
    #btn_design
    {
      background : #2D9596;
      margin-left: 150px;
      padding: 16px;
      color: white;
    }
    #btn_design:hover{
      color: blue;
    }
  </style>
</head>
<body id="body_background">
    <?php include("header.php"); ?>
      <div class="container-fluid">
            <div class="row">
                <?php include("side_bar.php"); ?>
            <div class="col-sm-1">
            </div>
            <div class="col-md-4 mb-5">
              <span class="text-center text-primary ms-5"> <?php if(isset($_GET['message'])){ echo $_GET['message']; } ?> </span>
              <h1 class="text-center text-light mb-4">Add Blog</h1>
              <form action="add_blog_process.php" method="POST" enctype="multipart/form-data" class="border p-4 rounded-3 shadow-sm">
                <div class="mb-3">
                  <label for="blogTitle" class="form-label text-light">Blog Title: </label>
                  <input type="text" class="form-control" name="blog_title" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-light">Post Per page</label>
                    <input type="number" name="post_per_page" class="form-control" required="">
                </div>
                <div class="mb-3">
                    <label class="form-label text-light">Blog Background Image</label>
                    <input type="file" name="blog_background_image" class="form-control">
                </div>
                <br><br>
                  <button type="submit" name="add_blog" class="btn" id="btn_design">Add</button>
              </form>
            </div>
            <div class="col-sm-4 text-light">
            </div>
        </div>
        </div>
        <?php include("../frontend/footer.php"); ?>
  <script text/javascript src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

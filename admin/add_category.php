<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Category</title>
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
              <h1 class="text-center text-light mb-4">Add Category</h1>
              <form action="add_category_process.php" method="POST" enctype="multipart/form-data" class="border p-4 rounded-3 shadow-sm">
                <div class="mb-3">
                  <label for="categoryTitle" class="form-label text-light">Category Title: </label>
                  <input type="text" name="category_title"   class="form-control" id="categoryTitle" name="categoryTitle" required>
                </div>
                <div class="mb-3">
                  <label for="categoryDescription" class="form-label text-light">Category Description: </label>
                  <textarea name="category_description" rows="4" cols="37"></textarea>
                </div>
                <br><br>
                  <button type="submit" name="add_category" class="btn" id="btn_design">Add</button>
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

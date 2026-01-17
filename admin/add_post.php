<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Post</title>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
  <style>
   
  #body_background
    {
      background:#9AD0C2;
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
    #body_background {
        background: #52D3D8;
    }
</style>
</head>
<body id="body_background">
    <?php include("header.php"); ?>
    <div class="container-fluid">
    <div class="row">
        <?php include("side_bar.php") ?>

            <div class="col-sm-1"></div>
                      <div class="col-sm-4 text-light">
                        <span class="text-center text-primary ms-5"> <?php if(isset($_GET['message'])){ echo $_GET['message']; } ?> </span>
                        <h1 class="text-center text-light mb-4">Add Post</h1>

                        <form action="add_post_process.php" method="POST" enctype="multipart/form-data" class="border p-4 rounded-3 shadow-sm">
                          <div class="mb-3">
                            <label for="category" class="form-label">Post Category:</label>
                            <select name="post_category" class="form-control">
                              <option value="">--Select--</option>
                              <option value="Sport">Sport</option>
                              <option value="Social Media">Social Media</option>
                              <option value="Technical robots">Technical robots</option>
                              <option value="Cricket">Cricket</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="postTitle" class="form-label">Post Title:</label>
                            <input type="text" name="post_title" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label for="postSummary" class="form-label">Post Summary:</label>
                            <textarea class="form-control" name="post_summary" rows="4" required></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="postDescription" class="form-label">Post Description:</label>
                            <textarea class="form-control" name="post_description" rows="4" required></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="postImage" class="form-label">Post Image:</label>
                            <input type="file" class="form-control" name="post_image">
                          </div>
                           <div class="mb-3">
                              <label>Comment permission</label>
                              <select name="comment_permission" class="form-control">
                                <option value="">--Select--</option>
                                <option value="1">Allow</option>
                                <option value="0">Not Allow</option>
                              </select>
                          </div>
                          <div class="mb-3">
                            <label for="post_atachment_title" class="form-label">Post Atachment Title:</label>
                            <input type="text" name="post_atachment_title" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="post_atachment_path" class="form-label">Post Atachment Path:</label>
                            <input type="file" name="post_atachment_path" class="form-control" >
                          </div>
                            <button type="submit" name="add_post" class="btn" id="btn_design" >Add</button>
                        </form>
                      </div>
                      <div class="col-sm-4"></div>
            </div>
        </div>
    </div>
  </div>
  </div>
  <?php include("../frontend/footer.php"); ?>
  <script text/javascript src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
    require("../require/database_connection.php")
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Manage Blog </title>
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
    .background_image_in_table
    {
        height: 30vh;
    }
    /*TABLE CSS*/
    .divider {
            border-right: 1px solid #ccc;
        }
        .bg-black {
            /*background-color: black;*/
            color: white;
        }
        .text-center {
            text-align: center;
            color: white;
        }
        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
        }
        .text-uppercase {
            text-transform: uppercase;
        }
  </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body id="body_background">
  <?php include("header.php"); ?>
    <div class="container-fluid">
      <div class="row">
      <?php 
        include("side_bar.php"); 
      ?>
      <div class="col-md-9">
        <?php 
            if(isset($_REQUEST['edit_blog'])){
              //echo "Working";
            $query = "SELECT * FROM blog WHERE blog_id='".$_REQUEST['edit_blog']."'";
            $result = mysqli_query($connection,$query);
            if($result)
            {
                $row=mysqli_fetch_assoc($result);

            }
        ?>
        <div class="container">
                 <h1 class="text-center text-light mb-4">Update Blog</h1>
              <form action="add_blog_process.php" method="POST" enctype="multipart/form-data" class="border p-4 rounded-3 shadow-sm">
                <div class="mb-3">
                  <label for="blogTitle" class="form-label text-light">Blog Title: </label>
                  <input type="text" class="form-control" name="blog_title" required value="<?= $row['blog_title']; ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-light">Post Per page</label>
                    <input type="number" name="post_per_page" class="form-control" required value="<?= $row['post_per_page']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label text-light">Blog Background Image</label>
                    <input type="file" name="blog_background_image" class="form-control" value="<?= $row['blog_background_image']; ?>">
                </div>
                <div>
                    <input type="hidden" name="blog_id" value="<?= $row['blog_id']; ?>">
                </div>
                <br><br>
                  <button type="submit" name="update_blog" class="btn" id="btn_design">Update</button>
              </form>
              </div>
        <?php
            }
         ?>
          <center><h1 class="text-primary ms-5">
            <?php 
                if(isset($_GET['message']))
                {
            ?>
                <span class="text-primary"> <?php echo $_GET['message']; ?> </span>
            <?php
                } 
                if (isset($_GET['errorMessage']))
                {
            ?>
                <span class="text-danger"> <?php echo $_GET['errorMessage']; ?> </span>
            <?php
                }
            ?>
        </h1></center>
    <h2 class="text-center shadow-lg text-uppercase">All Blog</h2>

    <div class="table-responsive" style="color: ; background: #37B5B6;">
        <table id="table_id" class="display">
            <thead style="color: white;">
            <tr>
                <th>Blog ID</th>
                <th>User ID</th>
                <th>Title</th>
                <th>Post per page</th>
                <th>Blog background image</th>
                <th>Status</th>
                <th>Created at</th>
                <th>Update at</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM blog ORDER BY blog_id DESC";
            $result = mysqli_query($connection, $query);

            if ($result->num_rows > 0) {
                while ($blog = mysqli_fetch_assoc($result)) {
                    ?>
              <tr>
                  <td> <?php echo htmlspecialchars($blog['blog_id']); ?></td>
                  <td> <?php echo htmlspecialchars($blog['user_id']); ?></td>
                  <td> <?php echo htmlspecialchars($blog['blog_title']); ?></td>
                  <td> <?php echo htmlspecialchars($blog['post_per_page']); ?></td>
                  <td> <img src="../Images/blog_images/<?php echo $blog['blog_background_image']; ?>" alt="Blog background Image" class="background_image_in_table"></td>
                  <td> <?php echo htmlspecialchars($blog['blog_status']); ?></td>
                  <td> <?php echo htmlspecialchars($blog['created_at']); ?></td>
                  <td> <?php echo htmlspecialchars($blog['updated_at']); ?></td>
                  <td><a href="?edit_blog=<?= $blog['blog_id']; ?>"><input type='submit' name='edit_blog' value='Edit'></a></td>
                  <td>|</td>
                  <td> <a href="add_blog.php"> <input type='submit' name='add_blog' value='Add'></td></a>
              </tr>
            <?php
                }
            }
            // mysqli_close($connection);
            ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#table_id').DataTable();
    });
</script>
      </div>
    </div>
    <?php include("../frontend/footer.php"); ?>
  <!-- <script text/javascript src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>

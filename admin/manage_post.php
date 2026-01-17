<?php 
    require("../require/database_connection.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Post</title>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <style>
    #body_background {
      background: #52D3D8;
    }
    #btn_design {
      background: #2D9596;
      padding: 16px;
      color: white;
    }
    #btn_design:hover {
      color: blue;
    }
    .post_image_in_table{
        height: 50vh;
    }
/* TABLE CSS */
        .divider {
            border-right: 1px solid #ccc;
        }
        .bg-black {
            background-color: black;
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
</head>
<body id="body_background">
  <?php include("header.php"); ?>
  <div class="container-fluid">
    <div class="row mb-5">
      <?php include("side_bar.php"); ?>
        <div class="col-sm-9">
<!-- POST UPDATING CODE START HERE -->
<?php 
    if(isset($_REQUEST['update_post'])) 
    {
        $query = "SELECT * FROM post WHERE post_id='".$_REQUEST['update_post']."'";
        $result = mysqli_query($connection,$query);
        if($result)
        {
            $data=mysqli_fetch_assoc($result);

        }
?>
        <div class="container">
            <h1 class="text-center text-light mb-4">Update Post</h1>
            <form action="add_post_process.php" method="POST" enctype="multipart/form-data" class="border p-4 rounded-3 shadow-sm  text-light">
            <div class="mb-3">
                <label for="category" class="form-label">Post Category:</label>
                <select name="post_category" class="form-control" value="<?= $data['post_category']; ?>">
                    <option value="">--Select--</option>
                    <option value="Sport">Sport</option>
                    <option value="Social Media">Social Media</option>
                    <option value="Technical Robots">Technical robots</option>
                    <option value="Cricket">Cricket</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="postTitle" class="form-label">Post Title:</label>
                <input type="text" name="post_title" class="form-control" required value="<?= $data['post_title']; ?>">
            </div>
            <div class="mb-3">
                <label for="postSummary" class="form-label">Post Summary:</label>
                <textarea class="form-control" name="post_summary">
                    <?= $data['post_summary']; ?>        
                </textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Post Description:</label>
                <textarea class="form-control" name="post_description" required>
                    <?= $data['post_description']; ?>
                </textarea>
            </div>
            <div class="mb-3">
                <label for="postImage" class="form-label">Post Image:</label>
                <input type="file" class="form-control" name="post_image" value="<?= $data['featured_image']; ?>">
            </div>
            <div class="mb-3">
                <label>Comment permission</label>
                <select name="comment_permission" class="form-control" value="<?= $data['is_comment_allowed']; ?>">
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
            <div>
                <input type="hidden" name="post_id" value="<?= $data['post_id']; ?>">
            </div>
                <button type="submit" name="update_post" class="btn" id="btn_design">Update Post</button>
        </form>
        </div>
<?php   
    }
 ?>
<!-- POST UPDATING CODE END HERE -->

<!-- POST DATA FETCH START HERE -->
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
        <h2 class="text-center shadow-lg text-uppercase">All Posts</h2>

        <div class="table-responsive" style="color: ; background: #37B5B6;">
            <table id="table_id" class="display">
                <thead style="color: white;">
                <tr>
                    <th>Post ID</th>
                    <!-- <th>Blog ID</th> -->
                    <th>Post Title</th>
                    <th>Post Summary</th>
                    <th>Post Description</th>
                    <th>Featured Image</th>
                    <!-- <th>Post Status</th> -->
                    <!-- <th>Is Comment Allowed</th> -->
                    <!-- <th>Created at</th> -->
                    <!-- <th>Updated at</th> -->
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM post ORDER BY post_id DESC";
                $result = mysqli_query($connection, $query);

                if ($result->num_rows > 0) {
                    while ($post = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <tr>
                        <td><?php echo htmlspecialchars($post['post_id']); ?></td>
                        <!-- <td><?php echo htmlspecialchars($post['blog_id']); ?></td> -->
                        <td><?php echo htmlspecialchars($post['post_title']); ?></td>
                        <td><?php echo htmlspecialchars($post['post_summary']); ?></td>
                        <td><?php echo htmlspecialchars($post['post_description']); ?></td>
                        <td> <img src="../Images/post_images/<?php echo $post['featured_image']; ?>" alt="Post Image" class="post_image_in_table">
                        <!-- <td><?php echo htmlspecialchars($post['post_status']); ?></td> -->
                        <!-- <td><?php echo htmlspecialchars($post['is_comment_allowed']); ?></td> -->
                        <!-- <td><?php echo htmlspecialchars($post['created_at']); ?></td> -->
                        <!-- <td><?php echo htmlspecialchars($post['updated_at']); ?></td> -->
                        <td> 
                            <a href="?update_post=<?= $post['post_id'] ?>"><input type='submit' name='update_post' value='Edit Post'></a>
                            <a href="add_post.php"><input type='submit' name='add_post' value='Add Post' class="mt-2"></a>
                            <a href="?inactive_post=<?= $post['post_id'] ?>"><input type='submit' name='inactive_post' value='InActive Post' class="mt-2"></a>
                        </td>
                    </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
            </table>
    </div>
    <?php 
        if(isset($_REQUEST['inactive_post'])){
            $query = "SELECT * FROM post WHERE post_id='".$_REQUEST['inactive_post']."'";
            $result = mysqli_query($connection,$query);
            if($result)
            {
                $row=mysqli_fetch_assoc($result);

            }
            $query = "UPDATE post
                  SET post_status = 'InActive'
                  WHERE post_id = '".$_REQUEST['inactive_post']."'";
        $result = mysqli_query($connection, $query);

    }
?>
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
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script> -->
  <script src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

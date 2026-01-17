<?php 
    require("../require/database_connection.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InActive Post</title>
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
<!-- POST DATA FETCH START HERE -->
        <div class="col-sm-9">
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
        <h2 class="text-center shadow-lg text-uppercase">InActive Posts</h2>

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
                    <th>Post Status</th>
                    <!-- <th>Is Comment Allowed</th> -->
                    <!-- <th>Created at</th> -->
                    <!-- <th>Updated at</th> -->
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM post WHERE post_status = 'InActive' ORDER BY post_id DESC";
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
                        <td><?php echo htmlspecialchars($post['post_status']); ?></td>
                        <!-- <td><?php echo htmlspecialchars($post['is_comment_allowed']); ?></td> -->
                        <!-- <td><?php echo htmlspecialchars($post['created_at']); ?></td> -->
                        <!-- <td><?php echo htmlspecialchars($post['updated_at']); ?></td> -->
                        <td> 
                            <a href="?active_post=<?= $post['post_id'] ?>"><input type='submit' name='active_post' value='Active Post' class="mt-2"></a>
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
        if(isset($_REQUEST['active_post'])){
            $query = "SELECT * FROM post WHERE post_id='".$_REQUEST['active_post']."'";
            $result = mysqli_query($connection,$query);
            if($result)
            {
                $row=mysqli_fetch_assoc($result);

            }
            $query = "UPDATE post
                  SET post_status = 'Active'
                  WHERE post_id = '".$_REQUEST['active_post']."'";
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

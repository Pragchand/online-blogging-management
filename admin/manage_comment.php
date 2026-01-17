<?php 
    require("../require/database_connection.php")
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menage Comment</title>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
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
    /*TABLE CSS*/
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
      <div class="row">
        <?php include("side_bar.php"); ?>
        <div class="col-md-9">
    <h2 class="text-center shadow-lg text-uppercase">All Comments</h2>

    <div class="table-responsive" style="color: ; background: #37B5B6;">
        <table id="table_id" class="display">
            <thead style="color: white;">
            <tr>
                <th>Comment ID</th>
                <th>Post id</th>
                <th>User id</th>
                <th>comment</th>
                <th>Is Active</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
              $query = "SELECT * FROM post_comment";
              $result = mysqli_query($connection, $query);

              if ($result->num_rows > 0) {
                  while ($comment = mysqli_fetch_assoc($result))
                  {
            ?>
            <tr>
              <td><?php echo htmlspecialchars($comment['post_comment_id']); ?></td>
              <td><?php echo htmlspecialchars($comment['post_id']); ?></td>
              <td><?php echo htmlspecialchars($comment['user_id']); ?></td>
              <td><?php echo htmlspecialchars($comment['comment']); ?></td>
              <td><?php echo htmlspecialchars($comment['is_active']); ?></td>
              <td><?php echo htmlspecialchars($comment['created_at']); ?></td>
              <td>
                  <input type='submit' name='edit_comment' value='Edit'>
              </td>
            </tr>
            <?php
                }
              }
            mysqli_close($connection);
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
  <script text/javascript src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

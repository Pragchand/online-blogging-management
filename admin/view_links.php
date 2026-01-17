<?php require("../require/database_connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    #background_design
    {
      background #37B5B6;
    }
  </style>
</head>
<body>
    <div class="row mt-3">
      <div class="col-sm-4" id="background_design">
        <div class="card" id="background_design">
          <h5 class="card-header" id="background_design">User</h5>
          <div class="card-body" id="background_design">
            <h5 class="card-title" id="background_design">
                 <?php
                    $sql = "SELECT COUNT(*) as total FROM user";
                    $result = $connection->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row["total"];
                    } else {
                        echo "0 results";
                    }
                  ?>
            </h5>
            <p class="card-text"></p>
            <a href="manage_user.php" class="btn btn-primary" id="background_design">View all users</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <h5 class="card-header">Blog</h5>
          <div class="card-body">
            <h5 class="card-title">
              <?php
                    $sql = "SELECT COUNT(*) as total FROM blog";
                    $result = $connection->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row["total"];
                    } else {
                        echo "0 results";
                    }
                ?>
            </h5>
            <p class="card-text"></p>
            <a href="manage_blog.php" class="btn btn-primary">View all blog</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <h5 class="card-header">Post</h5>
          <div class="card-body">
            <h5 class="card-title">
              <?php
                    $sql = "SELECT COUNT(*) as total FROM post";
                    $result = $connection->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row["total"];
                    } else {
                        echo "0 results";
                    }
              ?>
            </h5>
            <p class="card-text"></p>
            <a href="manage_post.php" class="btn btn-primary">View all posts</a>
          </div>
        </div>
      </div>
    </div>
<!-- NEW LINE -->
    <div class="row mt-3">
      <div class="col-sm-4">
        <div class="card">
          <h5 class="card-header">Catagory</h5>
          <div class="card-body">
            <h5 class="card-title">
              <?php
                    $sql = "SELECT COUNT(*) as total FROM category";
                    $result = $connection->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row["total"];
                    } else {
                        echo "0 results";
                    }
              ?>
            </h5>
            <p class="card-text"></p>
            <a href="manage_category.php" class="btn btn-primary">View all Catagories</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4" id="background_design">
        <div class="card" id="background_design">
          <h5 class="card-header" id="background_design">Followr</h5>
          <div class="card-body" id="background_design">
            <h5 class="card-title" id="background_design">
              <?php
                    $sql = "SELECT COUNT(*) as total FROM following_blog";
                    $result = $connection->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row["total"];
                    } else {
                        echo "0 results";
                    }
              ?>
            </h5>
            <p class="card-text"></p>
            <a href="follower.php" class="btn btn-primary" id="background_design">View all Followrs</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <h5 class="card-header">Comments</h5>
          <div class="card-body">
            <h5 class="card-title">
              <?php
                    $sql = "SELECT COUNT(*) as total FROM post_comment";
                    $result = $connection->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row["total"];
                    } else {
                        echo "0 results";
                    }
              ?>
            </h5>
            <p class="card-text"></p>
            <a href="manage_comment.php" class="btn btn-primary">View all comments</a>
          </div>
        </div>
      </div>
    </div>
<!-- NEW LINE -->
    <div class="row mt-3">
      <div class="col-sm-4">
        <div class="card">
          <h5 class="card-header">Active User</h5>
          <div class="card-body">
            <h5 class="card-title">
              <?php
                    $sql = "SELECT COUNT(*) as total FROM user WHERE is_active='Active'";
                    $result = $connection->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row["total"];
                    } else {
                        echo "0 results";
                    }
              ?>
            </h5>
            <p class="card-text"></p>
            <a href="view_active.php" class="btn btn-primary">View Active Users</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <h5 class="card-header">Inactive User</h5>
          <div class="card-body">
            <h5 class="card-title">
              <?php
                $sql = "SELECT COUNT(*) as total FROM user WHERE is_active='InActive' AND is_approved= 'Approved'";
                $result = $connection->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo $row["total"];
                } else {
                    echo "0 results";
                }
              ?>
            </h5>
            <p class="card-text"></p>
            <a href="view_Inactive.php" class="btn btn-primary">View Inactive Users</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4" id="background_design">
        <div class="card" id="background_design">
          <h5 class="card-header" id="background_design">Pending Users</h5>
          <div class="card-body" id="background_design">
            <h5 class="card-title" id="background_design">
              <?php
                    $sql = "SELECT COUNT(*) as total FROM user WHERE is_approved='Pending'";
                    $result = $connection->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row["total"];
                    } else {
                        echo "0 results";
                    }
              ?>
            </h5>
            <p class="card-text"></p>
            <a href="view_pending.php" class="btn btn-primary" id="background_design">View all Record</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-sm-4">
        <div class="card">
          <h5 class="card-header">Rejected User</h5>
          <div class="card-body">
            <h5 class="card-title">
              <?php
                    $sql = "SELECT COUNT(*) as total FROM user WHERE is_approved='Rejected'";
                    $result = $connection->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row["total"];
                    } else {
                        echo "0 results";
                    }
              ?>
            </h5>
            <p class="card-text"></p>
            <a href="view_rejected.php" class="btn btn-primary">View All Record</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <h5 class="card-header">User Feedback</h5>
          <div class="card-body">
            <h5 class="card-title">
              <?php
                    $sql = "SELECT COUNT(*) as total FROM user_feedback";
                    $result = $connection->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row["total"];
                    } else {
                        echo "0 results";
                    }
              ?>
            </h5>
            <p class="card-text"></p>
            <a href="view_feedback.php" class="btn btn-primary">View Feedback</a>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
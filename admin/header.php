<?php 
   error_reporting(0);
  session_start();
  require("../require/database_connection.php"); 
  $query = "SELECT * FROM user";
    $result = mysqli_query($connection, $query); 
    if ($result->num_rows > 0){
      $user = mysqli_fetch_assoc($result)
?>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
  <style>
    .logo{
      height: 10vh;
      border-radius: 50%;
    }
    #nav_bg
    {
      background: #37B5B6;
    }
    .navbar-nav .nav-link.hover:hover {
      background-color: #9AD0C2;
      color: ; 
      border-radius: 5px;
    }
    .profile_img_set
    {
      height: 7vh;
      border-radius: 50%
    }
    #profile_image{
      height: 7vh;
      border-radius: 50%;
    }
  </style>

  <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" id="nav_bg">
      <div class="container-fluid" id="nav_bg">

        <a class="navbar-brand" href="admin_dashboard.php">
          <img class="logo" src="../image/blog.jpg" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-uppercase text-light hover" aria-current="page" href="admin_dashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase text-light hover" href="#">About</a>  
            </li>
            <li class="nav-item dropdown"> 
              <a class="nav-link dropdown-toggle text-uppercase text-light hover" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Our Blog
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="latest_blog.php">Latest Blog</a></li>
                <li><a class="dropdown-item" href="#">Sport Blog</a></li>
                <li><a class="dropdown-item" href="#">Web Blog</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#Feedback" class="nav-link  text-uppercase text-light hover">Contact us</a>
            </li>
            <li class="nav-item dropdown"> 
              <a class="nav-link dropdown-toggle text-uppercase text-light hover" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Latest category</a></li>
                <li><a class="dropdown-item" href="#">Sport category</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
              <a href="../logout.php" class="btn text-uppercase text-light">
                Logout
              </a>
              <span class="text-light"> | </span>
              <a href="" name="login" class="btn text-uppercase text-light hover">
              <?= $_SESSION['user']['first_name']." ".$_SESSION['user']['last_name']; ?>
                  <img src="../images/user_profile/<?= $_SESSION['user']['user_image']; ?>" alt="Profile" id="profile_image">
              </a>
          </div>
        </div>
</nav>
    <?php 
      }
    ?>
  <script text/javascript src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script>

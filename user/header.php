<?php
  // error_reporting(0);
	session_start(); 
  require("../require/database_connection.php"); 
    $query = "SELECT * FROM user";
    $result = mysqli_query($connection, $query); 
    if ($result->num_rows > 0){
			$user = mysqli_fetch_assoc($result)
     
?>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
  <script text/javascript src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .logo{
      height: 10vh;
      border-radius: 50%;
    }
    #nav_bg
    {
      background: #37B5B6;
    }
    .profile_image
    {
    	height: 7vh;
    	border-radius: 50%;
    }
  </style>
	<nav class="navbar navbar-expand-lg bg-body-tertiary" id="nav_bg">
  		<div class="container-fluid" id="nav_bg">
	    	<a class="navbar-brand" href="#"><img class="logo" src="../image/blog.jpg" alt="Logo"></a>
	    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      	<span class="navbar-toggler-icon"></span>
	    	</button>
		    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
			      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			        <li class="nav-item">
			          <a class="nav-link active text-uppercase text-light" aria-current="page" href="indexx.php">Home</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-uppercase text-light" href="#about_us">About</a>  
			        </li>
	            <li class="nav-item">
	              <a class="nav-link text-uppercase text-light" href="our_blog _with_post.php">Our Blog</a>
	            </li>
			        <li class="nav-item">
			          <a href="#Feedback" class="nav-link  text-uppercase text-light">Contact us</a>
			        </li>
			        <li class="nav-item dropdown"> 
			          <a class="nav-link dropdown-toggle text-uppercase text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			            Categories
			          </a>
			          <ul class="dropdown-menu">
			            <li>
			            	<a class="dropdown-item" href="#">
			            		<?php
				              $query = "SELECT * FROM category";
				              $result = mysqli_query($connection, $query);

				              if ($result->num_rows > 0) {
				                  while ($category = mysqli_fetch_assoc($result))
				                  {
				                  	echo htmlspecialchars($category['category_title'])."<br>";
				                  }
				                }
				            ?>
			            	</a>
			            </li>
			          </ul>
			        </li>
			      </ul>
	          <a href="../logout.php" class="btn text-uppercase text-light hover">Logout</a>
	          <span class="text-light"> | </span>
	          <li class="nav-item dropdown"> 
			          <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			            &nbsp;&nbsp;<?= $_SESSION['user']['first_name']." ".$_SESSION['user']['last_name']; ?>
			          </a>
			          <ul class="dropdown-menu">
	    	      	<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
	    	      	  Edit Profile
	    	      	</button> 	</li>
			            <li><a class="dropdown-item" href="#">Set body color</a></li>
			            <li><hr class="dropdown-divider"></li>
			            <li><a class="dropdown-item" href="#">Set font</a></li>
			          </ul>
			        </li>
	          		&nbsp;&nbsp; <img src="../images/user_profile/<?= $_SESSION['user']['user_image']; ?>" alt="Profile" class="profile_image">
                
          </div>
        </div>
        <!-- Modal -->
	    	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    	  <div class="modal-dialog">
	    	    <div class="modal-content">
	    	      <div class="modal-header">
	    	        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
	    	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	    	      </div>
	    	      <div class="modal-body">
	    	        <form method="POST">
	    	          <div class="mb-3">
	    	            <label>Profile Image</label>
	    	            <input type="file" class="form-control"value="<?= $_SESSION['user']['user_image']; ?>">
	    	            <label>First Name</label>
	    	            <input type="text" class="form-control" value="<?= $_SESSION['user']['first_name']; ?>">
	    	            <label>Last Name</label>
	    	            <input type="text" class="form-control" value="<?= $_SESSION['user']['last_name']; ?>">
	    	          <div class="mb-3 form-check">
	    	            <input type="checkbox" class="form-check-input" id="exampleCheck1">
	    	            <label class="form-check-label" for="exampleCheck1">Remember</label>
	    	          </div>
	    	          <button type="submit" class="btn btn-primary">Update</button>
	    	        </form>
	    	      </div>
	    	    </div>
	    	  </div>
	    	</div>
</nav>
<?php 
	}
?>
  <script text/javascript src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script>
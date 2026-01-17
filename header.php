  <?php require("require/database_connection.php"); ?>
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
  <script text/javascript src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .logo{
      height: 10vh;
      border-radius: 50%;
    }
    #nav_bg
    {
      background: #37B5B6;
    }
    .navbar{
    }
  </style>
	<nav class="navbar navbar-expand-lg bg-body-tertiary" id="nav_bg">
  		<div class="container-fluid" id="nav_bg">
	    	<a class="navbar-brand" href="#"><img class="logo" src="image/blog.jpg" alt="Logo"></a>
	    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      	<span class="navbar-toggler-icon"></span>
	    	</button>
	    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active text-uppercase text-light" aria-current="page" href="index.php">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link text-uppercase text-light" href="#about_us">About</a>  
		        </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase text-light" href="#our_blog">Our Blog</a>
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
          <a href="login.php" class="btn text-uppercase text-light hover">Login</a>
          <span class="text-light"> | </span>
          <a href="registration_form.php" class="btn text-uppercase text-light hover">Register</a>
    </div>
  </div>
</nav>
  <script text/javascript src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
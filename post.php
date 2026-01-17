<?php 
  require("require/database_connection.php"); 
    $query = "SELECT * FROM post WHERE post_status = 'Active' ORDER BY post_id DESC LIMIT 5";
    $result = mysqli_query($connection, $query);      
?>
	<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">

<!-- POST SECTION START HERE -->
    <div class="container">
      <div class="row">
        <div class="col-sm-12 mt-5 mb-5 text-light border border-1">
          <h1 class="text-uppercase text-center shadow" id="our_blog">Recent Posts</h1>
        </div>
      </div>
    </div>
<!-- POST FETCHED HERE -->
    <div class="container">
      <div class="row">
        <?php 
          if ($result->num_rows > 0){
            while($post = mysqli_fetch_assoc($result)){
         ?>
        <div class="col-sm-4">
          <div class="card mb-3">
            <img src="Images/post_images/<?= $post['featured_image']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($post['post_title']); ?></h5>
              <p class="card-text"><?= htmlspecialchars($post['post_description']); ?></p>
              <a href="registration_form.php">Read More</a>
              <p class="card-tex t"><small class="text-body-secondary"><?= htmlspecialchars($post['created_at']); ?></small></p>
            </div>
          </div>
        </div>
        <?php 
          }
        }
        ?>
        </div>
      </div>
    <div class="container">
    	<div class="row">
    		<div class="col-sm-12 mt-5"><a href="login.php" class="btn btn-light p-3 text-primary d-grid"><h1 class="text-uppercase">Show All Posts</h1></a></div>
    	</div>
    </div>
<!-- POST SECTION END HERE -->

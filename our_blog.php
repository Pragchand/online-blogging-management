<?php 
	require("require/database_connection.php"); 
    $query = "SELECT * FROM blog ORDER BY blog_id DESC LIMIT 3";
    $result = mysqli_query($connection, $query);
?>
	<!-- <div class="container-fluid"> -->
		<div class="container">
			<div class="row">
				<div class="col-sm-12 mt-5 mb-5 text-light border border-1">
					<h1 class="text-uppercase text-center shadow" id="our_blog">Our Blogs</h1>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<?php 
					if ($result->num_rows > 0) {
    					while($blog = mysqli_fetch_assoc($result)) 
    					{
				 ?>
				<div class="col-sm-4">
					<div class="card mb-3">
					  <img src="Images/blog_images/<?= $blog['blog_background_image']; ?>" class="card-img-top" alt="On Loading Image">
					  <div class="card-body">
					    <h5 class="card-title"><?= htmlspecialchars($blog['blog_title']); ?></h5>
					    <p class="card-text"></p>
					    <p class="card-text"><small class="text-body-secondary"><?= htmlspecialchars($blog['created_at']); ?></small></p>
					  </div>
					</div>
				</div>	
	<?php
		}
   	}
	?>
			</div>
		</div>
	<!-- </div> -->
<?php 
	require("require/database_connection.php"); 
    $query = "SELECT * FROM post ORDER BY post_id DESC LIMIT 5";
    $result = mysqli_query($connection, $query);
?>
	<style>
		.img_height{
			height: 90vh;
		}
	</style>
	<!-- <div class="container-fluid"> -->
		<div class="container">
			<div class="row">
				<div class="col-sm-12 mt-5 mb-5">
				<?php 
					/*if ($result->num_rows > 0) {
    					while ($post = mysqli_fetch_assoc($result)) {*/
				 ?>
					<div id="carouselExampleRide" class="carousel slide " data-bs-ride="true">
					  <div class="carousel-inner">
					    <div class="carousel-item active">

					      <!-- <img src="../Images/post_images/<?= $post['featured_image']; ?>" class="d-block w-100 img_height" alt="Image On Loading"> -->

					      <img src="image/robot1.jpeg" class="d-block w-100 img_height" alt="Image On Loading">
					    </div>
					    <div class="carousel-item">
					      <img src="image/cricket4.jpeg" class="d-block w-100 img_height" alt="Image On Loading">
					    </div>
					    <div class="carousel-item">
					      <img src="image/cricket1.jpeg" class="d-block w-100 img_height" alt="Image On Loading">
					    </div>
					  </div>
					  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Previous</span>
					  </button>
					  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="visually-hidden">Next</span>
					  </button>
					</div>
			<?php
    				/*}
    			}*/
			?>			
				</div>
			</div>
		</div>
	<!-- </div> -->
	 
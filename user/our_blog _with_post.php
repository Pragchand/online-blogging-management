<?php 
	require("../require/database_connection.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Our Blog</title>
<style>
#body_background
    {
      background:#52D3D8;
    }
    #admin_profile
    {
    	height: 7vh;
    	border-radius: 50%;
    }
  </style>
</head>
<body id="body_background">
	<?php include_once("header.php"); ?>
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
		            if(isset($_REQUEST['view_blog'])){
		              //echo "Working";
		            $query = "SELECT * FROM blog WHERE blog_id='".$_REQUEST['view_blog']."'";
		            $result = mysqli_query($connection,$query);
		            if($result)
		            {
		                $row=mysqli_fetch_assoc($result);

		            }
		        ?>
		        <div class="col-sm-12">
					<div class="card mb-3">
					  <img src="../Images/blog_images/<?= $row['blog_background_image']; ?>" class="card-img-top" alt="On Loading Image">
					  <div class="card-body">
					    <h5 class="card-title">
					    	<?= htmlspecialchars($row['blog_title']); ?>
					    </h5>
					    <p class="card-text"><small class="text-body-secondary">
					    	<?= htmlspecialchars($row['created_at']); ?></small>
					    </p>
					    <p class="card-text"><small class="text-body-secondary">
					    	<img src="../Images/user_profile/<?= $user['user_image']; ?>" alt="Loading" id="admin_profile">
					    	<?= htmlspecialchars($user['first_name']." ".$user['last_name']); ?></small>
					    </p>
					<div class="col-sm-4">
						Post 1
						<?php 
							/*$query = "SELECT * FROM post WHERE blog_id='".$_REQUEST['view_blog']."'";
				            $result = mysqli_query($connection,$query);
							if ($result->num_rows > 0) {
				            {
		    					while($row = mysqli_fetch_assoc($result)) 
		    					{
				            		echo $row['post_title']."<br>";
				            	}
				            }*/
						 ?>
					</div>
					</div>
	                      <button type="submit" name="follow" class="btn btn-primary" style="width: 100px; margin: auto;">Follow</button>
					</div>
				</div>	
				<?php 
					} 
					$query = "SELECT * FROM blog ORDER BY blog_id DESC LIMIT 3";
    				$result = mysqli_query($connection, $query);
					if ($result->num_rows > 0) {
    					while($blog = mysqli_fetch_assoc($result)) 
    					{
				 ?>
				<div class="col-sm-4">
					<div class="card mb-3">
					  <img src="../Images/blog_images/<?= $blog['blog_background_image']; ?>" class="card-img-top" alt="On Loading Image">
					  <div class="card-body">
					    <h5 class="card-title">
					    	<?= htmlspecialchars($blog['blog_title']); ?>
					    </h5>
					    <p class="card-text"><small class="text-body-secondary">
					    	<?= htmlspecialchars($blog['created_at']); ?></small>
					    </p>
					    	<a href="?view_blog=<?= $blog['blog_id']; ?>">
					    		<input type='submit' name='view_blog' value='View'>
					    	</a>
					  </div>
	                      <button type="submit" name="follow" class="btn btn-primary" style="width: 100px; margin: auto;">Follow</button>
					</div>
				</div>	
				<?php
					}
			   	}
				?>
			</div>
		</div>
	<!-- </div> -->
	<?php include_once("../footer.php"); ?>
	</body>
</html>
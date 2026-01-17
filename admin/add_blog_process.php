<?php 
	 require("../require/database_connection.php");
	if(isset($_POST['add_blog']))
	{
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";*/
		extract($_POST);

		$tmp_name 	= $_FILES['blog_background_image']['tmp_name'];
		$file_name 	= $_FILES['blog_background_image']['name'];
		$path 		= time()."_".$file_name; 

		$folder = "../Images/blog_images";
		if(!is_dir($folder)){
			if(!mkdir($folder)){
				echo "Could Not Create Directory $folder";
			}
		}

		if(move_uploaded_file($tmp_name, $folder."/".$path)){
			echo "<h1>File Uploaded Successfully..!</h1>";
		}
		else{
			echo "<h1>Something Went Wrong..!</h1>";
		}


		$query = "INSERT INTO blog(user_id,blog_title,post_per_page,blog_background_image,blog_status)VALUES(2,'".$blog_title."','".$post_per_page."','".$path."','Active')";
		$result = mysqli_query($connection,$query);
		header("location: add_blog.php?message=One record added Successfully");


	}
	if(isset($_POST['update_blog'])){
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";*/
		extract($_POST);
		$created_at = date("Y,m,d h:i:s");
		$query = "UPDATE blog
		SET
		  blog_title = '".$blog_title."',
		  post_per_page = '".$post_per_page."',
		  updated_at = '".$created_at."'
		WHERE blog_id = '".$blog_id."'";
		$result = mysqli_query($connection,$query);
		if ($result){
			// echo "Updated";
			header("location: manage_blog.php?message=Record Updated Successfully");
		}
		else{
			// echo "Not Updated";
			header("location: manage_blog.php?message=Record Not Updated...!");
		}
	}
 ?>
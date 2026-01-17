<?php 
	 require("../require/database_connection.php");
	 date_default_timezone_set("Asia/Karachi");
	if(isset($_POST['add_post']))
	{
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";*/
		extract($_POST);

		$tmp_name 	= $_FILES['post_image']['tmp_name'];
		$file_name 	= $_FILES['post_image']['name'];
		$path 		= time()."_".$file_name; 

		$folder = "../Images/post_images";
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


		$query = "INSERT INTO post(blog_id,post_title,post_summary,post_description,featured_image,post_status,is_comment_allowed,updated_at)VALUES(3,'".$post_title."','".$post_summary."','".$post_description."','".$path."','Active','".$comment_permission."','".date('Y,m,d h:i:s')."')";

		$result = mysqli_query($connection,$query);
		
		header("location: add_post.php?message=One record added Successfully");
	}
	if(isset($_POST['update_post']))
	{
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";*/
		extract($_POST);
		$query = "UPDATE post
		SET
		  post_title = '".$post_title."',
		  post_summary = '".$post_summary."',
		  post_description = '".$post_description."',
		  updated_at = '".date("Y,m,d h:i:s")."'
		WHERE post_id = '".$post_id."'";
		$result = mysqli_query($connection,$query);
		if ($result){
			// echo "Updated";
			header("location: manage_post.php?message=Record Updated Successfully");
		}
		else{
			// echo "Not Updated";
			header("location: manage_post.php?errorMessage=Record Not Updated...!");
		}
	}

 ?>
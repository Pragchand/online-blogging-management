<?php 
	 require("../require/database_connection.php");
	if(isset($_POST['add_category']))
	{
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";*/
		extract($_POST);

		$query = "INSERT INTO category(category_title,category_description,category_status)VALUES('".$category_title."','".$category_description."','Active')";
		$result = mysqli_query($connection,$query);
		header("location: add_category.php?message=One record added Successfully");
	}







 ?>
<?php 
	require("../require/database_connection.php");
	if(isset($_POST['send_comment']))
	{
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";*/

		extract($_POST);
		$query = "INSERT INTO post_comment(comment)VALUES('".$comment."')";
		$result = mysqli_query($connection,$query);
		if($result)
		{
			header("location: indexx.php");
		}
	}

 ?>
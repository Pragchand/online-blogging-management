<?php 
	require("../require/database_connection.php");
	if(isset($_POST['send_feedback'])){
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";*/
		extract($_POST);
		$query = "INSERT INTO user_feedback(user_name,user_email,feedback)VALUES('".$first_name."','".$email."','".$feedback_message."')";
		$result = mysqli_query($connection,$query);
		header("location: indexx.php?message=Your feedback sent Thank you for your kindness ....!");
	}
 ?>
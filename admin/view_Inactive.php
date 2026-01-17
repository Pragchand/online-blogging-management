<?php 
    require("../require/database_connection.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Inctive Users</title>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

	<style>
        #body_background {
            background: #52D3D8;
        }
        #sidebar_design
        {
        	background: #2D9596;
        }
        .form_bg
        {
        	background: #37B5B6;
        	border-radius: 10px;
        }
        .profile_in_table
        {
            height: 15vh;
            border-radius: 50%;
        }
/*TABLE CSS*/
		.divider {
            border-right: 1px solid #ccc;
        }
        .bg-black {
            background-color: black;
            color: white;
        }
        .text-center {
            text-align: center;
            color: white;
        }
        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
        }
        .text-uppercase {
            text-transform: uppercase;
        }
    </style>
</head>
<body id="body_background">
    <?php include("header.php") ?>
	<div class="container-fluid">
		<div class="row">
        <?php 
            include("side_bar.php");  
        ?>
        <div class="col-md-9">
            <h2 class="text-center shadow-lg text-uppercase">Active Users</h2>
            <div class="table-responsive" style="color: ; background: #37B5B6;">
                <table id="table_id" class="display">
                    <thead style="color: white;">
                    <tr>
                        <th>User ID</th>
                        <th>Role ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Gender</th>
                        <th>User Image</th>
                        <th>Address</th>
                        <th>Is Approved</th>
                        <th>Is Active</th>
                    </thead>
                    <tbody>
                    <?php

                    $query = "SELECT * FROM user WHERE is_active = 'InActive' AND is_approved='approved' ORDER BY user_id DESC";
                    $result = mysqli_query($connection, $query);
                    if ($result->num_rows > 0) {
                        while ($user = mysqli_fetch_assoc($result)) {
                            $profile_image=$user['user_image'];
                     ?>
                        <tr>

                            <td> <?php echo htmlspecialchars($user['user_id']); ?> </td>
                            <td> <?php echo htmlspecialchars($user['role_id']); ?> </td>
                            <td><?php echo htmlspecialchars($user['first_name'])." ".htmlspecialchars($user['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['password']); ?></td>
                            <td><?php echo htmlspecialchars($user['gender']); ?></td>
                            <td><img src="../Images/user_profile/<?php echo$user['user_image']; ?>" alt="Profile Image" class="profile_in_table"></td>
                            <td><?php echo htmlspecialchars($user['address']); ?></td>
                            <td><?php echo htmlspecialchars($user['is_approved']); ?></td>
                            <td><?php echo htmlspecialchars($user['is_active']); ?></td>
                            <td> <a href="?active=<?= $user['user_id'] ?>"><input type='submit' name='active' value='Active'></a></td>
                        </tr>
                        <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php 
            if(isset($_REQUEST['active'])){
                $query = "SELECT * FROM user WHERE user_id='".$_REQUEST['active']."'";
                $result = mysqli_query($connection,$query);
                if($result)
                {
                    $row=mysqli_fetch_assoc($result);

                }
                $query = "UPDATE user
                      SET is_active = 'Active'
                      WHERE user_id = '".$_REQUEST['active']."'";
            $result = mysqli_query($connection, $query);

        }
?>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#table_id').DataTable();
            });
        </script>
		</div>
	</div>
	<br><br>
        <div style="margin-top: 150px;">
            <?php include("../frontend/footer.php"); ?>
        </div>
</body>
</html>
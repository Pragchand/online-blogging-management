<?php 
    require("../require/database_connection.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Manage User</title>
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
            <?php
    if(isset($_REQUEST['update_user'])){
        $query = "SELECT * FROM user WHERE user_id='".$_REQUEST['update_user']."'";
        $result = mysqli_query($connection,$query);
        if($result)
        {
            $row=mysqli_fetch_assoc($result);

        }
    ?>
    <div class="container text-light">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-6 border border-2 mt-3">
                        <h1 class="text-center mb-5 text-light">Update User Account</h1>
        <form action="registration_form_process.php" method="POST" enctype="multipart/form-data" class="m-3">
                        <div class="col">
                            <label class="form-label">First Name: </label>
                            <input type="text" name="first_name" class="form-control" value="<?= $row['first_name']; ?>" placeholder="First name" aria-label="First name" required>
                        </div>
                        <div class="col">
                            <label for="inputEmail4" class="form-label">Last Name: </label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last name" aria-label="Last name" value="<?= $row['last_name']; ?>"  required>
                        </div>
                        <div class="col">
                            <label for="inputEmail4" class="form-label">Email: </label>
                            <input type="email" name="email" class="form-control" aria-label="email" value="<?= $row['email']; ?>"  required>
                        </div>
                        <div class="col">
                            <label for="inputPassword4" class="form-label">Password: </label>
                            <input type="password" name="password" class="form-control mb-3" aria-label="password" value="<?= $row['password']; ?>"  required>
                        </div>
                        <div class="col">
                            <label>Gender: </label>
                            <input type="radio" name="gender" value="Male" class="mb-3 ms-3" required>Male
                            <input type="radio" name="gender" value="Female" class="mb-3 ms-3" required>Female
                        </div>
                        <div class="col">
                            <label>Date of Birth: </label>
                            <input type="date" name="date_of_birth" class="form-control mt-3 mb-3" value="<?= $row['date_of_birth']; ?>"  required>
                        </div>
                        <div class="col">
                            <label>Profile Image: </label>
                            <input type="file" name="user_image" class="form-control mt-3 mb-3" value="<?= $row['user_image']; ?>" >
                        </div>
                        <div class="col-12">
                            <label>Address</label>
                            <textarea name="address" class="form-control" value="<?= $row['address']; ?>"  required><?= $row['address']; ?></textarea>
                        </div>
                         <div class="col-md-12 mt-3 mb-3">
                            <label class="">Role</label>
                            <select name="role" class="col-md-12">
                                <option value="">--Select--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div class="col-md-12  mb-3">
                            <label class="form-label">Status</label>
                            <select name="is_active" class="col-md-12">
                                <option value="">--Select--</option>
                                <option value="Active">Active</option>
                                <option value="InActive">InActive</option>
                            </select>
                         </div> 
                         <div>
                            <input type="hidden" name="user_id" value="<?= $row['user_id']; ?>">
                        </div>
                        <div class="col-12">
                            <button type="reset" name="reset" class="btn btn-light text-primary ms-3 mb-3 mt-3">Reset</button>
                            <button type="submit" name="update" class="btn btn-light text-primary ms-3 mb-3 mt-3">update</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
    <?php
    }
?>
            <h2 class="text-center shadow-lg text-uppercase">All Users</h2>
            <div class="table-responsive" style="color: ; background: #37B5B6;">
                <table id="table_id" class="display">
                    <thead style="color: white;">
                    <tr>
                        <th>User ID</th>
                        <!-- <th>Role ID</th> -->
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Gender</th>
                        <th>User Image</th>
                        <th>Address</th>
                        <!-- <th>Created at</th> -->
                        <!-- <th>Updated at</th> -->
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $query = "SELECT * FROM user ORDER BY user_id DESC";
                    $result = mysqli_query($connection, $query);
                    if ($result->num_rows > 0) {
                        while ($user = mysqli_fetch_assoc($result)) {
                            $profile_image=$user['user_image'];
                     ?>
                        <tr>

                            <td> <?php echo htmlspecialchars($user['user_id']); ?> </td>
                            <!-- <td><?php //echo htmlspecialchars($user['role_id']); ?></td> -->
                            <td><?php echo htmlspecialchars($user['first_name'])." ".htmlspecialchars($user['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['password']); ?></td>
                            <td><?php echo htmlspecialchars($user['gender']); ?></td>
                            <td><img src="../Images/user_profile/<?php echo$user['user_image']; ?>" alt="Profile Image" class="profile_in_table"></td>
                            <td><?php echo htmlspecialchars($user['address']); ?></td>
                            <!-- <td><?php //echo htmlspecialchars($user['created_at']); ?></td> -->
                            <!-- <td><?php //echo htmlspecialchars($user['updated_at']); ?></td> -->
                             <td> <a href="?update_user=<?= $user['user_id'] ?>"><input type='submit' name='update_user' value='Edit'></a></td>
                             <td> | </td>
                              <td><a href="registration_form.php"><input type='submit' name='add_user' value='Add'></td>
                        </tr>
                        <?php
                        }
                    }
                    // mysqli_close($connection);
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

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
        <?php include("../frontend/footer.php"); ?>
</body>
</html>
<?php
    require("require/database_connection.php");
    session_start();
   /*  $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['last_name'] = $user['last_name'];
    $_SESSION['role_id'] = $user['role_id'];
    $_SESSION['user_image'] = $user['user_image'];*/

if (isset($_POST["login"])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        header("location: login.php?message=Login with your email and password please...!");
        exit();
    }

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        if ($data['is_approved'] == 'Pending') {
            header("location: login.php?message=Your account is pending approval. Please contact the administrator.");
        } elseif ($data['is_active'] == 'InActive') {
            header("location: login.php?message=Your account is inactive. Please contact the administrator.");
        } else {
            $_SESSION["user"] = $data;
            if ($_SESSION["user"]["role_id"] == 1) {
                header("location: admin/admin_dashboard.php");
            } elseif ($_SESSION["user"]["role_id"] == 2) {
                header("location: user/indexx.php");
            } else {
                header("location: login.php?message=Invalid role. Please contact the administrator.");
            }
        }
    } else {
        header("location: login.php?message=Login Fail...! Invalid Email/Password");
    }
} else {
    echo "Invalid email/password";
}
?>

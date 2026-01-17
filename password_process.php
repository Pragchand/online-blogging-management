<?php
session_start();

// Include database connection
require('../require/database_connection.php');

// Check if form is submitted
if (isset($_POST['change_password'])) {
    // Retrieve form data
  extract($_POST);

    // Validate form data
    if (empty($email) || empty($old_password) || empty($new_password) || empty($confirm_password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: change_password.php");
        exit();
    }

    // Ensure new passwords match
    if ($new_password !== $confirm_password) {
        $_SESSION['error'] = "New passwords do not match.";
        header("Location: change_password.php");
        exit();
    }

    // Fetch user's current password from the database
    $query = "SELECT password ,email FROM user WHERE email = $email";
    if ($stmt = $connection->prepare($query)) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($db_password);
        $stmt->fetch();
        
        // Check if the user exists
        if ($stmt->num_rows > 0) {
            // Verify old password
            if (password_verify($old_password, $db_password)) {
                // Hash new password
                $new_password_hashed = password_hash($new_password, PASSWORD_BCRYPT);

                // Update password in the database
                $update_query = "UPDATE user SET password = '$password' WHERE email = '$email'";
                if ($update_stmt = $connection->prepare($update_query)) {
                    $update_stmt->bind_param('ss', $new_password_hashed, $email);
                    if ($update_stmt->execute()) {
                        $_SESSION['success'] = "Password changed successfully.";
                        unset($_SESSION['error']); // Clear any previous error messages
                    } else {
                        $_SESSION['error'] = "Failed to change password. Please try again.";
                    }
                } else {
                    $_SESSION['error'] = "Database error. Please try again.";
                }
            } else {
                $_SESSION['error'] = "Old password is incorrect.";
            }
        } else {
            $_SESSION['error'] = "User not found.";
        }
        
        $stmt->close();
    } else {
        $_SESSION['error'] = "Database error. Please try again.";
    }
    
    $connection->close();
    // Redirect to the change password page
    header("Location: change_password.php");
    exit();
} else {
    // If the form is not submitted, redirect to the change password page
    header("Location: change_password.php");
    exit();
}
?>

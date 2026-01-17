<?php
require_once("fpdf/fpdf.php");
require("require/database_connection.php");

// Autoload PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

if (isset($_POST['register_user'])) {
    extract($_POST);
    $flag = true;

    // PATTERN START HERE
    $alpha_pattern = "/^[A-Z]{1}[a-z]{2,}$/";
    $email_pattern = "/^[a-z]+\d*[@]{1}[a-z]+[.]{1}(com){1}$/";
    $password_pattern = "/[A-Z]{1}[a-z]+\d*/";
    // PATTERN END HERE

    // TARGET ERROR MESSAGE START HERE    
    $first_name_msg = null;
    $last_name_msg  = null;
    $email_msg 		= null;
    $password_msg 	= null;
    $address_msg 	= null;
    $gender_msg 	= null;
    $date_of_birth_msg = null;
    // TARGET ERROR MESSAGE END HERE

    //---------------------------------------------------//
    if ($first_name == "") {
        $flag = false;
        $first_name_msg = "Field Required ...!";
        header("location: registration_form.php");
    } else {
        $first_name_msg = "";
        if (!(preg_match($alpha_pattern, $first_name))) {
            $flag = false;
            $first_name_msg = "First Name must be like Prago|Aneel|Akshy etc...!";
        }
    }
    //---------------------------------------------------//

    //---------------------------------------------------//    
    if ($last_name !== "") {
        if (!(preg_match($alpha_pattern, $last_name))) {
            $flag = false;
            $last_name_msg = "Last Name must be like Bheel|Choudhri etc...!";
        }
    } else {
        $last_name_msg = "";
    }
    //---------------------------------------------------//

    //---------------------------------------------------//    
    if ($email === "") {
        $flag = false;
        $email_msg = "Field Required..!";
    } else {
        $email_msg = "";
        if (!(preg_match($email_pattern, $email))) {
            $flag = false;
            $email_msg = "Email must be like prag@example.com prag12@example.com etc..!";
        }
    }
    //---------------------------------------------------//

    //---------------------------------------------------//    
    if ($password === "") {
        $flag = false;
        $password_msg = "Field Required..!";
    } else {
        $password_msg = "";
        if (!(preg_match($password_pattern, $password))) {
            $flag = false;
            $password_msg = "Password must be like Prag@123 or 123@Prag";
        }
    }
    //---------------------------------------------------//

    //---------------------------------------------------//
    if ($address === '') {
        $flag = false;
        $address_msg = "Field Required..!";
    } else {
        $address_msg = "";
    }
    //---------------------------------------------------//

    //---------------------------------------------------//
    if (!isset($gender)) {
        $flag = false;
        $gender_msg = "Field Required..!";
    } else {
        $gender_msg = "";
    }
    //---------------------------------------------------//

    //---------------------------------------------------//
    if ($date_of_birth == '') {
        $flag = false;
        $date_of_birth_msg = "Field Required..!";
    } else {
        $date_of_birth_msg = "";
    }
    //---------------------------------------------------//

    if ($flag=== true) {
        $tmp_name = $_FILES['user_image']['tmp_name'];
        $file_name = $_FILES['user_image']['name'];
        $path = time() . "_" . $file_name;

        $folder = "../Images/user_profile";
        if (!is_dir($folder)) {
            if (!mkdir($folder, 0777, true)) {
                echo "Could Not Create Directory $folder";
                exit();
            }
        }

        if (move_uploaded_file($tmp_name, $folder . "/" . $path)) {
            echo "<h1>File Uploaded Successfully..!</h1>";
        } else {
            echo "<h1>Something Went Wrong..!</h1>";
            exit();
        }

        $query = "INSERT INTO user(role_id, first_name, last_name, email, password, gender, date_of_birth, address, user_image, is_approved, is_active) 
                  VALUES(2, '$first_name', '$last_name', '$email', '$password', '$gender', '$date_of_birth', '$address', '$path', 'Pending', 'InActive')";

        if (mysqli_query($connection, $query) === TRUE) {
            // GENERATE PDF
            class PDF extends FPDF {
                function Header() {
                    $this->SetFont('Arial', 'B', 12);
                    $this->Cell(0, 10, 'Login Information', 0, 1, 'C');
                    $this->Ln(10);
                }

                function Footer() {
                    $this->SetY(-15);
                    $this->SetFont('Arial', 'I', 8);
                    $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
                }

                function UserDetails($firstName, $lastName, $email, $password) {
                    $this->SetFont('Arial', '', 12);
                    $this->Cell(0, 10, "First Name: $firstName", 0, 1);
                    $this->Cell(0, 10, "Last Name: $lastName", 0, 1);
                    $this->Cell(0, 10, "Email: $email", 0, 1);
                    $this->Cell(0, 10, "Password: $password", 0, 1);
                }
            }

            $pdf = new PDF();
            $pdf->AddPage();
            $pdf->UserDetails($first_name, $last_name, $email, $password);
            $pdfFilePath = __DIR__ . '/login_information_' . time() . '.pdf'; // Use unique filename
            $pdf->Output('F', $pdfFilePath);

            // Check if the PDF is generated
            if (!file_exists($pdfFilePath)) {
                echo "Error generating PDF";
                exit();
            }

            // Send Email
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                $mail->SMTPAuth = true;
                $mail->Username = 'pragchandb@gmail.com'; // SMTP username
                $mail->Password = 'euanghtakqkpldqn'; // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('pragchandb@gmail.com', 'Pragchand Bheel');
                $mail->addAddress($email, "$first_name $last_name");

                // Attachments
                $mail->addAttachment($pdfFilePath);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Registration Successful';
                $mail->Body    = 'Dear ' . $first_name . ',<br>Your registration is successful. Please find attached your login information.';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            header("Location: login.php?message=You are registered successfully please login to your account");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $connection->error;
            exit();
        }
    } else {
        // Display form with error messages
        echo $first_name_msg . "<br>";
        echo $last_name_msg . "<br>";
        echo $email_msg . "<br>";
        echo $password_msg . "<br>";
        echo $address_msg . "<br>";
        echo $gender_msg . "<br>";
        echo $date_of_birth_msg . "<br>";
        // header("location: registration_form.php?message=");
    }
}
?>

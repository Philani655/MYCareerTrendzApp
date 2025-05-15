<?php

session_start();
include('../database/config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/src/Exception.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $idNumber = $_POST["idNumber"];

    //generate the pass code digit
    $randomNumber = rand(100000, 999999);
    $_SESSION['randomNumber'] = $randomNumber;
    $_SESSION['idNumber'] = $idNumber;
    $_SESSION['email'] = $email;

    // Prepare the SQL statement
    $checkEmailQuery = "SELECT * FROM parent WHERE idno = ? AND email = ?";

    if ($stmt = $conn->prepare($checkEmailQuery)) {
        // Bind parameters
        $stmt->bind_param("ss", $idNumber, $email); // 'ss' means both parameters are strings
        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if any rows are returned
        if ($result->num_rows > 0) {
            $mail = new PHPMailer(true);

            try {
                // Set mailer to use SMTP
                $mail->isSMTP();

                // Specify main and backup SMTP servers
                $mail->Host = 'smtp.gmail.com';

                // Enable SMTP authentication
                $mail->SMTPAuth = true;

                // SMTP username
                $mail->Username = 'bryannevhutalu7@gmail.com';

                // SMTP password
                $mail->Password = 'giczlilkdytwrkuc';

                // Enable TLS encryption, `ssl` also accepted
                $mail->SMTPSecure = 'ssl';

                // TCP port to connect to
                $mail->Port = 465;

                //Recipients
                $mail->setFrom('bryannevhutalu7@gmail.com', 'Reset Password');

                // Add a recipient
                $mail->addAddress($email);

                // Optional: Add reply-to address
                $mail->addReplyTo($email, 'Information');

                // Content
                $mail->isHTML(true);
                // Set email format to HTML
                $mail->Subject = 'Reset Password';
                $mail->Body = "Below is the password code for updating password<br><br>"
                        . "<b>Your OTP Code for password reset is:$randomNumber</b>";
                $mail->AltBody = '';

                $mail->send();
                echo "<script>alert('Email have been sent with OTP verification code');</script>";
                echo "<script>window.location.href = '../php/parent_forgot_verification_code.php';</script>";
            } catch (Exception $e) {
                echo "<script>alert('Email is not sent. Mailer Error: {$mail->ErrorInfo} ');</script>";
            }
        } else {
            echo "<script>alert('Invalid details. Please try again!');window.history.back();</script>";
            exit();
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<script>alert('Something went wrong!.You might not be registered.');window.history.back();</script>";
        exit();
    }
}


<?php

include_once '../database/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/src/Exception.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $id = $_POST['id'];
    $idno = $_POST['idno'];
    $status = $_POST['status'];

    $status = isset($_POST['status']) ? $_POST['status'] : null;

    if ($status === null) {
        header("Location: ../php/track_learner_admission.php");
        exit();
    }

    // Initialize a variable for the query
    $query = '';

    // Use switch statement to handle status
    switch ($status) {
        case 'Pending':
            $query = "UPDATE learner_admission SET status = 'Pending' WHERE id = ?";
            break;
        case 'Approved':
            $query = "UPDATE learner_admission SET status = 'Approved' WHERE id = ?";
            break;
        case 'Rejected':
            $query = "UPDATE learner_admission SET status = 'Rejected' WHERE id = ?";
            break;
        default:
            echo "<script>alert('Invalid status value!'); window.location.href='../php/track_learner_admission.php';</script>";
            exit;
    }

    // Prepare statement
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    // Execute and check if update was successful
    if ($stmt->execute()) {

        echo "<script>alert('Status updated successfully!'); window.location.href='../php/track_learner_admission.php';</script>";

        $sqlCheck = "SELECT 
                la.idno AS idno, 
                la.firstname AS firstname, 
                la.surname AS surname, 
                la.email AS email, 
                pg.email AS parentemail  ,
                LOWER(la.status) AS status
            FROM learner_admission la, parent_guardian pg 
            WHERE la.idno = pg.learner_id 
            AND la.idno = ?";

        $stmtCheck = $conn->prepare($sqlCheck);
        $stmtCheck->bind_param("i", $idno); // "i" = integer
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        $learnerEmail = '';
        $parentEmail = '';
        $firstname = '';
        $surname = '';

        if ($resultCheck->num_rows > 0) {
            $rowCheck = $resultCheck->fetch_assoc();

            $learnerEmail = $rowCheck['email'];
            $parentEmail = $rowCheck['parentemail'];

            $firstname = $rowCheck['firstname'];
            $surname = $rowCheck['surname'];

            $status = $rowCheck['status'];

            if ($status === 'approved') {
                $subjectHeader = 'Your MYCareerTrendz Application Has Been Approved';
                $message = '<p>Dear <b>' . $surname . ', ' . $firstname . '</b></p>
                    <p>We are pleased to inform you that your application has been approved!</p> 
                    <p>You can now create an account to access all the features and resources available on MYCareerTrendz.</p>
                    <p>Thank you for choosing MYCareerTrendz. We’re excited to have you on board!</p>
                    <p>Best regards,</p>
                    <p>MYCareerTrendz Team.</p>
                ';
            } else {
                $subjectHeader = 'Your MYCareerTrendz Application Has Been Not Approved';
                $message = 'Dear <b>' . $surname . ', ' . $firstname . ',</b></p>
                    <p>Thank you for your interest in MYCareerTrendz.</p> 
                    <p>After carefully reviewing your application,</p> 
                    <p>we regret to inform you that it has not been approved at this time.</p>
                    <p>We appreciate the time and effort you put into your application.</p> 
                    <p>Please feel free to reach out if you have any questions or need further clarification.</p>
                    <p>Thank you for considering MYCareerTrendz. We wish you the very best in your future endeavors.</p>
                    <p>Best regards,</p>
                    <p>MYCareerTrendz Team.</p>';
            }

            // Create a new PHPMailer instance
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = 'mycareertrendzproject@gmail.com'; // SMTP username
                $mail->Password = 'wioceoeulxdgyftw'; // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Use SSL encryption
                $mail->Port = 465; // SSL Port
                //Recipients
                $mail->setFrom('mycareertrendzproject@gmail.com', 'MyCareertrendz');
                $mail->addAddress($parentEmail); // Add parent's email as recipient
                $mail->addAddress($learnerEmail); // Add learner's email as recipient
                // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = $subjectHeader;
                $mail->Body = $message;

                // Send the email
                $mail->send();
                echo "<script>alert('Approval email message has been sent.');</script>";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            exit();
        }

        
    } else {
        echo "<script>alert('Failed to update status!'); window.location.href='../php/track_learner_admission.php';</script>";
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
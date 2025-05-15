<?php
session_start();
include_once '../database/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/src/Exception.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';

// Get learner ID from session
$idNumber = $_SESSION['idNumber'];
$learnerId = $_SESSION['learnerId'];

// Prepare the SQL query
$sql = "SELECT l.idno, l.email AS learner_email, l.firstname, l.secondname, 
               pg.email AS parent_email, pg.fnames as fnames 
        FROM learner_admission l 
        JOIN parent_guardian pg ON l.idno = pg.learner_id 
        WHERE l.idno = pg.learner_id 
        AND pg.learner_id = ?";

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $learnerId); // Bind learner_id to idno
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any rows are found
    if ($result->num_rows > 0) {
        // Retrieve and display the rows
        while ($row = $result->fetch_assoc()) {
            // Fetching Emails and Names
            $parentEmail = $row['parent_email'];
            $learnerEmail = $row['learner_email'];
            $parentName = $row['fnames'];
            $learnerNames = $row['firstname'] . ' ' . $row['secondname'];

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
                $mail->Subject = 'MyCareertrendz Application';
                $mail->Body = '
                    <h2>MyCareertrendz Application</h2>
                    <p>Dear ' . $parentName . ' and ' . $learnerNames . ',</p>
                    <p>Your application has been received successfully. We will review the details and get back to you shortly.</p>
                    <p>Thank you for choosing MyCareertrendz!</p>
                    <br>
                    <p>Best Regards,</p>
                    <p>MyCareertrendz Team</p>
                ';

                // Send the email
                $mail->send();
                echo "<script>alert('Email message has been sent.');</script>";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    } else {
        echo "<script>alert('Something went wrong with processing the application!');</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Query preparation failed!');</script>";
}

echo "<script>window.location.href = '../php/dashboard.php'</script>";
?>

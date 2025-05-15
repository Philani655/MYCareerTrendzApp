<?php

session_start();
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['teacher_id'])) {
        header("Location: ../php/teacher_sent_parent_email.php");
        exit();
    }

    $teacher_id = trim($_POST['teacher_id']);
    $subject_header = trim($_POST['subject_header']);
    $message = trim($_POST['message']);
    $idNumber = $_SESSION['idNumber'];

    $fileName = null;
    $targetFilePath = null;
    $msg_status = 1;

    $uploadDir = '../../email_documents/';

    // Check if file was uploaded
    if (!empty($_FILES['document']['name'])) {
        $fileName = basename($_FILES['document']['name']);
        $fileTmp = $_FILES['document']['tmp_name'];
        $fileType = mime_content_type($fileTmp);
        $fileSize = $_FILES['document']['size'];
        $targetFilePath = $uploadDir . time() . "_" . $fileName;

        $allowedTypes = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ];

        if (!in_array($fileType, $allowedTypes)) {
            die("❌ Invalid file type. Only PDF, DOC, and DOCX are allowed.");
        }

        if ($fileSize > 5 * 1024 * 1024) {
            die("❌ File size exceeds the 5MB limit.");
        }

        if (!move_uploaded_file($fileTmp, $targetFilePath)) {
            die("❌ Failed to upload the file.");
        }
    }

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO email (teacher_id, user_id, subject_header, message, file_name, file_path, msg_status) 
                            VALUES (?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param("ssssssi", $teacher_id, $idNumber, $subject_header, $message, $fileName, $targetFilePath , $msg_status);

    if ($stmt->execute()) {
        echo "<script>window.location.href='../php/parent_sent_email_page.php';</script>";
    } else {
        echo "❌ Database Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>

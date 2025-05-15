<?php

session_start();
include '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $parent_id = $_POST['parent_id'];
    $idNumber = $_SESSION['idNumber'];
    $subject_header = $_POST['subject_header'];
    $message = $_POST['message'];
    $fileName = null;
    $targetFilePath = null;

    // Define the upload directory
    $uploadDir = '../../email_documents/';

    if (!empty($_FILES['document']['name'])) {
        // Get file details
        $fileName = basename($_FILES['document']['name']);
        $fileType = mime_content_type($_FILES['document']['tmp_name']);
        $fileSize = $_FILES['document']['size'];
        $targetFilePath = $uploadDir . time() . "_" . $fileName;

        // Allowed file types
        $allowedTypes = [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ];

        if (!in_array($fileType, $allowedTypes)) {
            die("Invalid file type. Only PDF, DOC, and DOCX are allowed.");
        }

        // Check file size (limit to 5MB)
        if ($fileSize > 5 * 1024 * 1024) {
            die("File size exceeds the limit of 5MB.");
        }

        // Move uploaded file to target path
        if (!move_uploaded_file($_FILES['document']['tmp_name'], $targetFilePath)) {
            die("Failed to upload file.");
        }
    }

    if (isset($_POST['cc_parent_id']) && is_array($_POST['cc_parent_id'])) {
        foreach ($_POST['cc_parent_id'] as $cc_id) {
            // Save email and file info to the database
            $stmt = $conn->prepare("INSERT INTO email (teacher_id, user_id, subject_header, message, file_name, file_path) 
                            VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $idNumber, $cc_id, $subject_header, $message, $fileName, $targetFilePath);
        }
    }

    // Save email and file info to the database
    $stmtt = $conn->prepare("INSERT INTO email (teacher_id, user_id, subject_header, message, file_name, file_path) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmtt->bind_param("ssssss", $idNumber, $parent_id, $subject_header, $message, $fileName, $targetFilePath);
    if ($stmtt->execute()) {
        echo "<script>window.location.href='../php/parent_emails_page.php';</script>";
        exit();
    } else {
        echo "Error: " . $stmtt->error;
    }
}
?>

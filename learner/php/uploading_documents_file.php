<?php

include_once '../database/config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get learner ID from session
    $learnerId = $_SESSION['idNumber'];
    
    //check learner id is empty
    if ($learnerId === null) {
        // Change the path (e.g., redirect to another page)
        echo "<script>window.location.href = '../php/learner_admission.php';</script>";
        exit(); // Make sure to exit to stop further execution
    }

    // Define upload directory
    $uploadDir = '../../learner_documents/';

    // Allowed file types
    $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];

    // Function to upload file
    function uploadFile($file, $uploadDir, $allowedTypes) {
        if ($file['error'] === 0) {
            $fileType = mime_content_type($file['tmp_name']);
            if (!in_array($fileType, $allowedTypes)) {
                die("Invalid file type. Only PDF, JPG, and PNG are allowed.");
            }
            $fileName = time() . "_" . basename($file['name']);
            $filePath = $uploadDir . $fileName;
            move_uploaded_file($file['tmp_name'], $filePath);
            return $filePath;
        } else {
            die("Error uploading file.");
        }
    }

    // Upload files and get paths
    $birthDocPath = uploadFile($_FILES['birthDoc'], $uploadDir, $allowedTypes);
    $parentIdPath = uploadFile($_FILES['parentIdDoc'], $uploadDir, $allowedTypes);
    $reportDocPath = uploadFile($_FILES['reportDoc'], $uploadDir, $allowedTypes);

    // Check if the learner_id already exists in the learner_documents table
    $checkSQL = "SELECT COUNT(*) FROM learner_documents WHERE learner_id = ?";
    $stmtCheck = $conn->prepare($checkSQL);

    if ($stmtCheck) {
        $stmtCheck->bind_param("s", $learnerId);
        $stmtCheck->execute();
        $stmtCheck->bind_result($count);
        $stmtCheck->fetch();
        $stmtCheck->close();

        // If learner_id exists, don't insert and show an alert
        if ($count > 0) {
            echo "<script>alert('Documents for this learner_id have already been uploaded.');</script>";
            echo "<script>window.location.href = '../php/end_learner_admission_file.php';</script>"; // Redirect to the appropriate page
        } else {
            // Insert file paths into the learner_documents table if learner_id does not exist
            $sql = "INSERT INTO learner_documents (learner_id, birth_certificate, parent_id, school_report, date_time) 
                VALUES (?, ?, ?, ?, NOW())";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $learnerId, $birthDocPath, $parentIdPath, $reportDocPath);

            if ($stmt->execute()) {
                echo "<script>alert('Application is completed successfully!');</script>";
                echo "<script>window.location.href = '../php/end_learner_admission_file.php';</script>"; // Redirect after upload
                exit();
            } else {
                echo "<script>alert('Error uploading documents. Please try again.');</script>";
                echo "<script>window.location.href = '../php/uploading_documents.php';</script>";
                exit();
            }

            $stmt->close();
        }
    } else {
        echo "<script>alert('Error checking learner_id. Please try again.');</script>";
        echo "<script>window.location.href = '../php/uploading_documents.php';</script>";
    }

    $conn->close();
} else {
    echo "<script> "
    . "alert('Invalid request form submittion');"
    . "window.location.href = '../php/uploading_documents.php';"
    . "</script>";
}
?>

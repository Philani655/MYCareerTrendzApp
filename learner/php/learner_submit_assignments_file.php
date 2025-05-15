<?php
session_start();
include_once '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (!isset($_SESSION['idNumber'])) {
        echo "<script>alert('Something went wrong');</script>";
        echo "<script>window.location.href='../php/learner_dashboard.php'</script>";
        exit();
    }

    // Define the upload directory
    $uploadDir = '../../assignments/';

    // Check if the directory exists, if not, create it with proper permissions
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create directory with full permissions
        chmod($uploadDir, 0777);       // Ensure directory is writable
    }
    // Get session data
    $idNumber = $_SESSION['idNumber'];
    $grade_id = $_SESSION['grade_id'];
    $subject_id = $_SESSION['subject_id'];
    $description = $_POST['description'];
    $assignmentName = $_POST['assignmentName'];
    $assignment_id = $_POST['assignment_id'];

    // Check if a file is uploaded and no error
    if (isset($_FILES['document']) && $_FILES['document']['error'] === 0) {

        // Get file details
        $fileName = basename($_FILES['document']['name']);
        $fileType = mime_content_type($_FILES['document']['tmp_name']);
        $fileSize = $_FILES['document']['size'];
        $targetFilePath = $uploadDir . time() . "_" . $fileName;

        // Allowed file types
        $allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        if (!in_array($fileType, $allowedTypes)) {
            die("Invalid file type. Only PDF, DOC, and DOCX are allowed.");
        }

        // Check file size (Optional: limit to 5MB)
        if ($fileSize > 5 * 1024 * 1024) {
            die("File size exceeds the limit of 5MB.");
        }

        // Move file to the lesson_doc folder
        if (move_uploaded_file($_FILES['document']['tmp_name'], $targetFilePath)) {

            // Save file information into the database
            $stmt = $conn->prepare("INSERT INTO learner_assignment (learner_id, assignment_id , subject_id, grade_id, file_name, file_path,assignment_name , description ) 
                                    VALUES (?, ?, ?, ?, ?, ? ,? , ?) ");
            $stmt->bind_param("siiissss", $idNumber,$assignment_id ,$subject_id, $grade_id, $fileName, $targetFilePath, $assignmentName, $description);

            if ($stmt->execute()) {
                echo "<script>alert('File is uploaded to learners successfully!');</script>";
                echo "<script>window.location.href='../php/learner_assignments.php';</script>";
                exit();
            } else {
                echo "<script>alert('Failed to save file!');</script>";
                echo "<script>window.location.href='../php/learner_assignments.php';</script>";
                exit();
            }

            $stmt->close();
        } else {
            echo "<script>alert('Error moving the file.!');</script>";
            echo "<script>window.location.href='../php/learner_assignments.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Something went wrong with file uploading!');</script>";
        echo "<script>window.location.href='../php/learner_assignments.php';</script>";
        exit();
    }


// Close the database connection
    $conn->close();
} else {
    echo "<script>alert('Something went wrong with your subject!');</script>";
    echo "<script>window.location.href='../php/learner_assignments.php';</script>";
    exit();
}
?>



<?php

session_start();
include_once '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($_SESSION['idNumber'])) {
        echo "<script>alert('Something went wrong');</script>";
        echo "<script>window.location.href='../php/teacher_dashboard.php'</script>";
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
    $subjectname = $_SESSION['subjectname'];
    $subjectcode = $_SESSION['subjectcode'];

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
            $stmt = $conn->prepare("INSERT INTO teacher_assignment (teacher_id, subject_id, grade_id, file_name, file_path,assignment_name , description) 
                                    VALUES (?, ?, ?, ?, ?, ? ,?) ");
            $stmt->bind_param("sssssss", $idNumber, $subject_id, $grade_id, $fileName, $targetFilePath, $assignmentName, $description);

            // Prepare the statement
            $sqllearner = "SELECT l.idno AS idno 
                            FROM learner l, subjects su 
                            WHERE l.idno = su.learner_id 
                            AND l.grade_id = su.grade_id 
                            AND l.grade_id = ? 
                            AND su.subjectcode = ? 
                            AND su.subjectname = ?";

            $stmtLearner = $conn->prepare($sqllearner);
            $stmtLearner->bind_param("iss", $grade_id, $subjectcode, $subjectname);
            // "i" = integer, "s" = string
            // Execute the statement
            $stmtLearner->execute();
            
            $resultLearner = $stmtLearner->get_result();

            $isValid = false;

            if ($resultLearner->num_rows > 0) {
                while ($rowLearner = $resultLearner->fetch_assoc()) {

                    $learner_id = $rowLearner['idno'];
                    $status = 0;
                    $message = $assignmentName . ' ' . $_SESSION['subjectname'] . ' assignment';

                    // Prepare the statement
                    $sqltn = "INSERT INTO `teacher_notifications`(`teacher_id`, `learner_id`, `subject_id`, `grade_id`, `message`, `status`) VALUES (?,?,?,?,?,?)";
                    $stmttn = $conn->prepare($sqltn);
                    $stmttn->bind_param("ssiisi", $idNumber, $learner_id, $subject_id, $grade_id, $message, $status);
                    // "iiiis" means: integer, integer, integer, integer, string
                    // Prepare the statement
                    $sqlpn = "INSERT INTO `parent_notifications`(`teacher_id`,`learner_id` , `subject_id`,  `grade_id`, `message`, `status`) VALUES (?,? ,?,?,?,?)";
                    $stmtpn = $conn->prepare($sqlpn);
                    $stmtpn->bind_param("ssiisi", $idNumber, $learner_id, $subject_id, $grade_id, $message, $status);
                    // "iiiis" means: integer, integer, integer, integer, string

                    if ($stmttn->execute() && $stmtpn->execute()) {
                        $isValid = true;
                    } else {
                        echo "<script>alert('Something went wrong with your subject!');</script>";
                        echo "<script>window.location.href='../php/teacher_assignments.php';</script>";
                        exit();
                    }
                }
            }


            if ($stmt->execute() && $isValid) {
                echo "<script>alert('File is uploaded to learners successfully!');</script>";
                echo "<script>window.location.href='../php/teacher_assignments.php';</script>";
                exit();
            } else {
                echo "<script>alert('Failed to save file!');</script>";
                echo "<script>window.location.href='../php/teacher_assignments.php';</script>";
                exit();
            }

            $stmt->close();
        } else {
            echo "<script>alert('Error moving the file.!');</script>";
            echo "<script>window.location.href='../php/teacher_assignments.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Something went wrong with file uploading!');</script>";
        echo "<script>window.location.href='../php/teacher_assignments.php';</script>";
        exit();
    }


// Close the database connection
    $conn->close();
} else {
    echo "<script>alert('Something went wrong with your subject!');</script>";
    echo "<script>window.location.href='../php/teacher_assignments.php';</script>";
    exit();
}
?>



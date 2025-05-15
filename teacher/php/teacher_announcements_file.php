<?php
session_start();
include_once '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (!isset($_SESSION['idNumber'])) {
        echo "<script>alert('Something went wrong');</script>";
        echo "<script>window.location.href='../php/teacher_dashboard.php'</script>";
        exit();
    }

    $idNumber = $_SESSION['idNumber'];
    $grade_id = $_SESSION['grade_id'];
    $subject_id = $_SESSION['subject_id'];
    $subjectname = $_SESSION['subjectname'];
    $subjectcode = $_SESSION['subjectcode'];
    
    
    $content = $_POST['content'];
    $date_time = date('Y-m-d H:i:s'); // Current timestamp
    // Prepare SQL statement
    $sql = "INSERT INTO announcements  (teacher_id, subject_id, grade_id, content, date_time) 
            VALUES (?, ?, ?, ?, ?)";

    // Use prepared statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiss", $idNumber, $subject_id, $grade_id, $content, $date_time);

    
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
            $message = $content . ' ' . $_SESSION['subjectname'] . ' announcements';

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
                echo "<script>window.location.href='../php/teacher_announcements.php';</script>";
                exit();
            }
        }
    }

    
    // Execute and check success
    if ($stmt->execute() && $isValid) {
        echo "<script>alert('Announcement is sent to learners');</script>";
        echo "<script>window.location.href='../php/teacher_announcements.php';</script>";
        exit();
    } else {
        echo "<script>alert('Something went wrong with your subject!');</script>";
        echo "<script>window.location.href='../php/teacher_announcements.php';</script>";
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Something went wrong with your subject!');</script>";
    echo "<script>window.location.href='../php/teacher_announcements.php';</script>";
    exit();
}
?>
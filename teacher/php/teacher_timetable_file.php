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
    $content = $_POST['content'];
    $date_time = date('Y-m-d H:i:s'); // Current timestamp
    // Prepare SQL statement
    $sql = "INSERT INTO timetable (teacher_id, subject_id, grade_id, create_timetable, date_time) 
            VALUES (?, ?, ?, ?, ?)";

    // Use prepared statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiss", $idNumber, $subject_id, $grade_id, $content, $date_time);

    // Execute and check success
    if ($stmt->execute()) {
        echo "<script>alert('Learners timetable is sent created successfully');</script>";
        echo "<script>window.location.href='../php/teacher_timetable.php';</script>";
        exit();
    } else {
        echo "<script>alert('Something went wrong with your subject!');</script>";
        echo "<script>window.location.href='../php/teacher_timetable.php';</script>";
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Something went wrong with your subject!');</script>";
    echo "<script>window.location.href='../php/teacher_timetable.php';</script>";
    exit();
}
?>
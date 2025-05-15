<?php

session_start();
include_once '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $teacher_id = $_SESSION['idNumber'];
    $message = $_POST['message'];
    $subject_id = $_SESSION['subject_id'];
    $grade_id = $_SESSION['grade_id'];

    $sql = "INSERT INTO `subject_overview` (`teacher_id`, `message`, `subject_id`, `grade_id`) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $teacher_id, $message, $subject_id, $grade_id);

    if ($stmt->execute()) {
        echo "<script>alert('Subject overview is stored!');window.location.href='../php/subject_overview.php';</script>";
        exit();
    } else {
        echo "<script>alert('Something went wrong!');window.location.href='../php/subject_overview.php';</script>";
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>

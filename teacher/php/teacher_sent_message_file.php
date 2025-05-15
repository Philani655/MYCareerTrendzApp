<?php

session_start();
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idno = $_POST['idno'];
    $idNumber = $_SESSION['idNumber'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (teacher_id, user_id, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $idNumber, $idno, $message);

    if ($stmt->execute()) {
        echo header('location: ../php/teacher_learner_chats_platform.php');
    }
}
?>
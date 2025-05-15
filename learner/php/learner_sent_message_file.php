<?php

session_start();
include '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $teacher_id = $_POST['teacher_id'];  // Get teacher_id from form or session
    $message = $_POST['message'];
    $idNumber = $_SESSION['idNumber'];
    
    // Prepare the SQL query
    $sql = "INSERT INTO messages (teacher_id, user_id, message, msg_status) VALUES (?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssss", $teacher_id, $idNumber, $message, $msg_status);

    $msg_status = 1;  // Default status
    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the message was inserted
    if ($stmt->affected_rows > 0) {
        header("location: ../php/teacher_message.php");
    }
}
?>
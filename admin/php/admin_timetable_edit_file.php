<?php
session_start();
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $grade_id = $_POST['grade_id'];
    $content = $_POST['content'];
    $id = $_POST['id'];
    $admin_id = $_SESSION['userID'];

    // Prepare the SQL statement
    $sql = "UPDATE `timetable` 
            SET 
                `grade_id` = ?, 
                `content` = ? 
            WHERE 
                `id` = ? 
                AND `admin_id` = ?";

    $stmt = $conn->prepare($sql);

    // Bind parameters (i = integer, s = string)
    $stmt->bind_param("isis", $grade_id, $content, $id, $admin_id);

    // Execute the query
    if ($stmt->execute()) {
        echo "<script>alert('Record updated successfully'); window.location.href='../php/admin_timetable_page.php';</script>";
        exit();
    } else {
        echo "<script>alert('Failed to update record. Please try again!'); window.location.href='../php/admin_timetable_page.php';</script>";
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}

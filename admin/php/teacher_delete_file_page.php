<?php

include '../database/config.php'; // Ensure database connection is included

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Check if `id` is provided
    $subject_id = $_POST['id'];

    // Prepare DELETE SQL query
    $sql = "DELETE FROM `subjects` WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $subject_id); // Bind parameter as an integer
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Subject deleted successfully!');window.location.href='../php/teacher_subjects_page.php';</script>";
        exit();
    } else {
        echo "<script>alert('No subject found with the given ID.');window.location.href='../php/teacher_subjects_page.php';</script>";
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid required!');window.location.href='../php/teacher_subjects_page.php';</script>";
        exit();
}
?>

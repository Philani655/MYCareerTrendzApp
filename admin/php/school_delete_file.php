<?php

include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // SQL DELETE statement
    $sql = "DELETE sh, l, t 
            FROM school sh
            LEFT JOIN learner l ON sh.id = l.school_id
            LEFT JOIN teacher t ON sh.id = t.school_id
            WHERE sh.id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // "i" means integer
    // Execute and check if successful
    if ($stmt->execute()) {
        echo "<script>alert('Learners and Teachers are also removed from the school!'); window.location.href='../php/dashboard.php';</script>";
        exit();
    } else {
        echo "<script>alert('Failed to delete school.');window.location.href='../php/dashboard.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid form data submission!.');window.location.href='../php/dashboard.php';</script>";
    exit();
}
?>

<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Prepare the SQL statement
    $sql = "DELETE FROM `learner_admission` WHERE `id` = ?";
    $stmt = $conn->prepare($sql);

    // Bind and execute the statement
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Success message or redirect
        echo "<script>alert('Learners is successfully deleted!');</script>";
        echo "<script>window.location.href ='../php/learner_admission_page.php';</script>";
        exit();
    } else {
        // Error message
        echo "<script>alert('Something went wrong with deleting a learner!');</script>";
        echo "<script>window.location.href ='../php/learner_admission_page.php';</script>";
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Something went wrong with deleting a learner!');</script>";
    echo "<script>window.location.href ='../php/learner_admission_page.php';</script>";
    exit();
}
?>

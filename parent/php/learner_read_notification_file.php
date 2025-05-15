<?php
session_start();
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $learnerId = $_SESSION['learnerId'];
    // Prepare the statement
    $sql = "UPDATE `parent_notifications` SET `status` = 1 WHERE `id` = ? AND `learner_id` = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $id , $learnerId); // "i" means integer type
// Execute the statement
    if ($stmt->execute()) {
        echo "<script>window.location.href='../php/parent_dashboard.php';</script>";
        exit();
    }
}
?>

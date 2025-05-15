<?php

session_start();
include_once '../database/config.php';

$parentId = $_SESSION['idNumber'];
$learnerId = $_SESSION['learnerId'];

$active = 0;     // Example value for active (1 for active, 0 for inactive)
// Prepare the SQL statement
$sql = "INSERT INTO parent_log (parent_id, learner_id, active) VALUES (?, ?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind the parameters: i = integer
    $stmt->bind_param("sss", $parentId, $learnerId, $active);

    if ($stmt->execute()) {
        session_destroy();
        // Close the statement
        $stmt->close();
        $conn->close();
        echo "<script>window.location.href='../../index.html';</script>";
        exit();
    }
}
?>

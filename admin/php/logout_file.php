<?php

session_start();
include_once '../database/config.php';

$userID = $_SESSION['userID'];

if(!isset( $_SESSION['userID'])){
    echo "<script>window.location.href='../php/login.php';</script>";
    exit();
}

$active = 0;     // Example value for active (1 for active, 0 for inactive)
// Prepare the SQL statement
$sql = "INSERT INTO admin_log (admin_id, active) VALUES (?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind the parameters: i = integer
    $stmt->bind_param("ss", $userID, $active);

    if ($stmt->execute()) {
        session_destroy();
        // Close the statement
        $stmt->close();
        $conn->close();
        echo "<script>window.location.href='../php/login.php'</script>";
        exit();
    }
}
?>


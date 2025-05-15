<?php
//start the session
session_start();
include_once '../database/config.php';

$idNumber = $_SESSION['idNumber'];

// Define the variables
$active = 0; // Set to 1 if active, 0 if not active
// Prepare the SQL query
$sql = "INSERT INTO `teacher_log` (`teacher_id`, `active`) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

// Bind the parameters
$stmt->bind_param("si", $idNumber, $active); // "s" for string, "i" for integer
// Execute the query
if ($stmt->execute()) {
    echo "<script>window.location.href='../../index.html';</script>";
    exit();
}

// Close the statement
$stmt->close();

session_destroy();
?>

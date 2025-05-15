<?php
session_start();
include_once '../database/config.php';

$idNumber = $_SESSION['idNumber'];

// Check if user is logged in
if (!isset($_SESSION['idNumber'])) {
    header("Location: ../php/learner_login.php");
    exit();
}

$sql = "SELECT * FROM `learner` WHERE `idno`=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $idNumber);
$stmt->execute();
$result = $stmt->get_result();

$imagePath = '../dist/img/default.png'; // Default image if not found

?>


<?php

session_start();
include('../database/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_SESSION['email'];
    $idNumber = $_SESSION['idNumber'];
    $password = $_POST['password'];

    // Prepare the SQL query using placeholders
    $updateSQL = "UPDATE parent SET password = ? WHERE idno = ? AND email = ?";

    $stmt = $conn->prepare($updateSQL);
    $stmt->bind_param("sss", $password, $idNumber, $email);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "<script>alert('Your password has been updated successfully');</script>";
        echo "<script>window.location.href = '../php/parent_login.php';</script>";
        exit();
    } else {
        echo "<script>alert('Something went wrong with updating password. Please try again.');window.history.back();</script>";
        exit();
    }

    $stmt->close();
    $conn->close();
}
    
    


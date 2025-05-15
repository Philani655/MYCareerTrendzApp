<?php

include '../database/config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $id = $_POST['id'];
    $status = $_POST['status'];

    if (!isset($_POST['status'])) {
        header('location: ../php/admin_page.php');
        exit;
    }
    // Initialize a variable for the query
    $query = '';

    // Use switch statement to handle status
    switch ($status) {
        case 'Pending':
            $query = "UPDATE admin SET status = 'Pending' WHERE id = ?";
            break;
        case 'Approved':
            $query = "UPDATE admin SET status = 'Approved' WHERE id = ?";
            break;
        case 'Rejected':
            $query = "UPDATE admin SET status = 'Rejected' WHERE id = ?";
            break;
        default:
            break;
    }

    // Prepare statement
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    // Execute and check if update was successful
    if ($stmt->execute()) {
        echo "<script>alert('Status updated successfully!'); window.location.href='../php/admin_page.php';</script>";
        exit();
    } else {
        echo "<script>alert('Failed to update status!'); window.location.href='../php/admin_page.php';</script>";
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
<?php
include '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Prepare and execute the delete query
    $sql = "DELETE FROM `timetable` WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Timetable deleted successfully.'); window.location.href = '../php/admin_timetable_page.php';</script>";
        exit();
    } else {
        echo "<script>alert('Failed to delete timetable. Please try again.'); window.location.href = '../php/admin_timetable_page.php';</script>";
        exit();
    }

    $stmt->close();
    $conn->close();
}

<?php

include '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Retrieve that from the form
    $id = $_POST['id'];
    $mark  = $_POST['mark'];
    
    // Prepare the UPDATE statement
    $sql = "UPDATE `learner_assignment` SET `marks` = ? WHERE `id` = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $mark, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Assignment marks are stored successfully!');window.location.href='../php/teacher_assignments.php';;</script>";
    } else {
        echo "<script>alert('Something went wrong!');window.location.href='../php/teacher_assignments.php';</script>";
    }
}
?>

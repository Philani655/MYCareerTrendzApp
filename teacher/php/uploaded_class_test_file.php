<?php

include '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Retrieve that from the form
    $id = $_POST['id'];
    $mark  = $_POST['mark'];
    
    // Prepare the UPDATE statement
    $sql = "UPDATE `learner_class_test` SET `score` = ? WHERE `id` = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $mark, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Learner marks are stored successfully!');window.location.href='../php/uploaded_class_test.php';;</script>";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
?>

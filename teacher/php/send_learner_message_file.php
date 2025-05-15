<?php

session_start();
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idNumber = $_SESSION['idNumber'];

    if (!empty($_POST['learners_id']) && isset($_POST['message'])) {
        $learners_id = $_POST['learners_id'];
        $message = $_POST['message'];
        $status = 0;
        
        // Prepare the insert statement
        $stmt = $conn->prepare("INSERT INTO `messages` (`teacher_id` ,`user_id` , `message` , `status`) VALUES (?,?,?,?)");

        foreach ($learners_id as $learners) {
            $stmt->bind_param("sssi", $idNumber , $learners , $message , $status);
            $stmt->execute();
        }
        
        echo "<script>alert('Message sent to learner'); window.location.href='../php/my_learner.php';</script>";
        exit();
    }else{
        echo "<script>alert('No learner is selected'); window.location.href='../php/my_learner.php';</script>";
        exit();
    }
}
?>

<?php

session_start();
include '../database/config.php';

if (isset($_GET['idno']) && isset($_GET['fullnames']) && isset($_GET['location'])) {
    $_SESSION['idno']=$_GET['idno'];
    $_SESSION['fullnames']=$_GET['fullnames'];
    $_SESSION['location']=$_GET['location'];
    
    $idno = $_GET['idno'];

    // SQL query to update the status
    $sql = "UPDATE messages SET status = 1 WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $idno);  // "i" means integer
    if($stmt->execute()){
        header("location: ../php/teacher_learner_chats_platform.php");
    }else{
         header("location: ../php/teacher_learner_chats_page.php");
    }
}
?>

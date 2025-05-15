<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the selected value
    $user = $_POST['user'];
    
    if(!$user){
        echo "<script>alert('Invalid selection!')<script>";
        header('location: ../php/school_page.php');
    }

    // Use switch to handle different cases
    switch ($user) {
        case 'learner':
            echo "<script>window.location.href='../php/school_add_learner.php';</script>";
            exit();
            break;
        case 'teacher':
            echo "<script>window.location.href='../php/school_add_teacher.php';</script>";
            exit();
            break;
        default:
            break;
    }
}
?>

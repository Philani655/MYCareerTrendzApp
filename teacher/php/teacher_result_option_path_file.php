<?php

session_start();
include '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if(!isset($_POST['term_id']) || !isset($_POST['view'])){
        echo "<script>alert('Please select in each box!');window.location.href='../php/teacher_results.php';</script>";
        exit();
    }
    
    $_SESSION['term_id'] = $_POST['term_id'];
    $_SESSION['learnerId'] = $_POST['learnerId'];

    $view = $_POST['view'];

    $path = '';
    switch ($view) {
        case 'online_test':
            $path = '../php/teacher_result_online_test.php';
        break;
        case 'class_test';
            $path = '../php/teacher_result_class_test.php';
        break;
        case 'assignments';
            $path = '../php/teacher_result_assignments.php';
        break;
        case 'exam';
            $path = '../php/teacher_result_exam.php';
        break;
    }
    
    echo header("location:".$path);
    exit();
}
?>
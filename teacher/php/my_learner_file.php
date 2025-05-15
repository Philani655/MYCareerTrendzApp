<?php

session_start();

if (!isset($_GET['id'])) {
    echo "<script>window.location.href = '../php/teacher_dashboard.php';</script>";
} else {
    $_SESSION['subject_id'] = $_GET['id'];
    $_SESSION['grade_id'] = $_GET['grade_id'];
    $_SESSION['subjectname'] = $_GET['subjectname'];
    $_SESSION['subjectcode'] = $_GET['subjectcode'];
    $_SESSION['grade_name'] = $_GET['grade_name'];
    $_SESSION['grade_id'] = $_GET['grade_id'];

    echo "<script>window.location.href = '../php/my_learner.php';</script>";
}
?>

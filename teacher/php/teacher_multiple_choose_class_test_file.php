<?php

session_start();
include_once '../database/config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($_SESSION['idNumber'])) {
        header('location: ../php/teacher_dashboard.php');
        exit();
    }

    //Retrieve the session
    $total = $_SESSION['total'];
    $subject_id = $_SESSION['subject_id'];
    $grade_id = $_SESSION['grade_id'];
    $idNumber = $_SESSION['idNumber'];
    $test_id = $_SESSION['test_id'] ;
   
    // Loop through the questions and insert them into the questions table
    for ($i = 1; $i <= $total; $i++) {
        $question_text = mysqli_real_escape_string($conn, $_POST["qns" . $i]);
        $option_a = mysqli_real_escape_string($conn, $_POST[$i . "1"]);
        $option_b = mysqli_real_escape_string($conn, $_POST[$i . "2"]);
        $option_c = mysqli_real_escape_string($conn, $_POST[$i . "3"]);
        $option_d = mysqli_real_escape_string($conn, $_POST[$i . "4"]);
        $correct_answer = $_POST["ans" . $i];

        // Insert each question into the questions table
        $query = "INSERT INTO online_class_test (teacher_id,test_id , subject_id, grade_id, question, option_a, option_b, option_c, option_d, correct_answer )
              VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ? )";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "siiissssss", $idNumber,$test_id , $subject_id, $grade_id, $question_text, $option_a, $option_b, $option_c, $option_d, $correct_answer );
        mysqli_stmt_execute($stmt);
    }

    echo "<script>alert('Quiz and questions inserted successfully!');window.location.href='../php/teacher_show_multiple_choose_test.php'</script>";

    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
} else {
    echo "Invalid request.";
}
?>

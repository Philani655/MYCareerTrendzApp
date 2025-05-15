<?php

session_start();
include_once '../database/config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Retrieve teacher_id, subject_id, and grade_id from session or form
    $teacher_id = $_SESSION['idNumber'];
    $subject_id = $_SESSION['subject_id'];
    $grade_id = $_SESSION['grade_id'];

    // Get the total number of questions from session
    $total = $_SESSION['total'];
    $test_id = $_SESSION['test_id'] ;

    // Prepare an SQL statement
    $stmt = $conn->prepare("INSERT INTO online_quiz (teacher_id,test_id, subject_id, grade_id, question, correct_answer) VALUES (?, ? ,?, ?, ?, ?)");

    for ($i = 1; $i <= $total; $i++) {
        // Get question and correct answer from POST request
        $question = $_POST["qns" . $i];
        $correct_answer = $_POST["ans" . $i];

        // Bind parameters and execute the query
        $stmt->bind_param("siiiss", $teacher_id, $test_id ,  $subject_id, $grade_id, $question, $correct_answer);
        $stmt->execute();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect to the quiz page with success message
    echo "<script>alert('Quiz is created successfully!');window.location.href='../php/teacher_show_trueORfalse_test.php';</script>";

    exit();
} else {
    // Redirect if the request method is not POST
    echo "<script>alert('Something went wrong!');window.location.href='../php/teacher_trueORfalse_class_test_details.php';</script>";

    exit();
}
?>
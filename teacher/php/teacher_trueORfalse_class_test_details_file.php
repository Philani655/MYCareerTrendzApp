<?php

session_start();
include('../database/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['name'];
    $total = $_POST['total'];

    //craete and declare variable
    $test_id = mt_rand(1, 10000000);

    // Retrieve session data
    $subject_id = $_SESSION['subject_id'];
    $grade_id = $_SESSION['grade_id'];
    $idNumber = $_SESSION['idNumber'];

    //Set total number of questions into the session
    $_SESSION['total'] = $total;
    $_SESSION['test_id'] = $test_id;

    try {
        // SQL query
        $query = "INSERT INTO online_quiz_details 
              (teacher_id,test_id, subject_id, grade_id, title, total) 
              VALUES (?, ?, ?, ?, ?, ?)";

        // Prepare statement
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "siiisi", $idNumber, $test_id, $subject_id, $grade_id, $title, $total);

        // Execute and check success
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Test created successfully!'); window.location.href='../php/teacher_trueORfalse_class_test.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.history.back();</script>";
        }

        // Close connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } catch (Exception $e) {
        // Handle the exception
        echo "<script>alert('Something went wrong.Please try again');window.location.href='../php/teacher_trueORfalse_class_test_details.php';</script>";
        exit();
    }
}

// Close connection
mysqli_close($conn);
?>

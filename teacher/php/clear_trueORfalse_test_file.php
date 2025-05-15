<?php

include '../database/config.php';

// Truncate the online_class_test_details table
$query1 = "DELETE FROM  online_quiz_details";
$query2 = "DELETE FROM  online_quiz";

// Execute the queries
if (mysqli_query($conn, $query1 ) ) {
    if(mysqli_query($conn, $query2 )){
    echo "<script>alert('True of False test is cleared!.');window.location.href='../php/teacher_class_test.php';</script>";
    exit();
    }
    echo "<script>alert('Something went wrong!.');window.location.href='../php/teacher_class_test.php';</script>";
    exit();
} else {
    echo "<script>alert('Something went wrong with clear test');window.location.href='../php/teacher_class_test.php';</script>";
    exit();
}

// Close the connection
mysqli_close($conn);
?>
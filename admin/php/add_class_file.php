<?php

include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $grade_no = $_POST["gradeNo"];

    $gradeNo = isset($_POST['gradeNo']) ? $_POST['gradeNo'] : null;

    if ($gradeNo === null) {
        header("Location: ../php/classes.php");
        exit();
    }


    // Prepare the query
    $sql = "SELECT * FROM `grade` WHERE `grade_no` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $grade_no);  // "s" for string (use "i" for integer)
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch and display the results
    if ($result->num_rows > 0) {
        echo "<script>alert('Grade alert exists!');window.location.href='../php/classes.php';</script>";
        exit();
    } else {

        $grade_name = '';

        switch ($grade_no) {
            case 8:
                $grade_name = "Grade 8";
                break;
            case 9:
                $grade_name = "Grade 9";
                break;
            case 10:
                $grade_name = "Grade 10";
                break;
            case 11:
                $grade_name = "Grade 11";
                break;
            case 12:
                $grade_name = "Grade 12";
                break;
            default:
                $grade_name = "Invalid grade selected";
                break;
        }



        // Prepare the query
        $sqlGrade = "INSERT INTO `grade`(`grade_no`, `grade_name`) VALUES (?, ?)";
        $stmtGrade = $conn->prepare($sqlGrade);
        $stmtGrade->bind_param("ss", $grade_no, $grade_name);  // "ss" for two strings
        $stmtGrade->execute();

        // Check if insert was successful
        if ($stmtGrade->affected_rows > 0) {
//            echo "<script>alert('Grade name is added successfully');window.location.href='../php/classes.php';</script>";
//            exit();
        } else {
//            echo "<script>alert('Something went wrong');window.location.href='../php/classes.php';</script>";
//            exit();
        }
    }
} else {
//    echo "<script>alert('Form data is not posted!');window.location.href='../php/classes.php';</script>";
//    exit();
}
?>

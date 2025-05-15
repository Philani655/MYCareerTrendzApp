<?php

session_start();
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $grade_no = $_POST['grade'];
    $content = $_POST['content'];
    $userID = $_SESSION['userID'];

    if (!isset($content)) {
        header('location:../php/login.php');
    }

    $grade_name = '';
    switch ($grade_no) {
        case '8':
            $grade_name = 'Grade 8';
            break;
        case '9':
            $grade_name = 'Grade 9';
            break;
        case '10':
            $grade_name = 'Grade 10';
            break;
        case '11':
            $grade_name = 'Grade 11';
            break;
        case '12':
            $grade_name = 'Grade 12';
            break;
        default:
            $grade_name = 'Invalid Grade';
    }

    // Prepare the SQL statement
    $sqlGrade = "SELECT * FROM `grade` WHERE `grade_no` = ? AND LOWER(`grade_name`) = LOWER(?)";
    $stmt = $conn->prepare($sqlGrade);

    $stmtGrade = $conn->prepare($sqlGrade);

    // Bind parameters
    $stmtGrade->bind_param("is", $grade_no, $grade_name);

    // Execute the query
    $stmtGrade->execute();

    // Get the result
    $resultGrade = $stmtGrade->get_result();

    if ($resultGrade->num_rows > 0) {
        while ($rowGrade = $resultGrade->fetch_assoc()) {

            // Prepare the SQL statement
            $sql = "INSERT INTO `timetable`(`admin_id`, `grade_id`, `content`) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);

            // Bind parameters (i = integer, s = string)
            $stmt->bind_param("iis", $userID, $rowGrade['id'], $content);

            if ($stmt->execute()) {
                echo "<script>alert('Timetable added successfully!'); window.location.href='../php/admin_timetable_page.php';</script>";
                exit();
            } else {
                echo "<script>alert('Failed to add timetable. Please try again.'); window.location.href='../php/admin_timetable_page.php';</script>";
                exit();
            }
        }
    }

    $stmt->close();
    $stmtGrade->close();
    $conn->close();
} else {
    echo "<script>alert('Failed to add timetable. Please try again.'); window.location.href='../php/admin_timetable_page.php';</script>";
    exit();
}
?>
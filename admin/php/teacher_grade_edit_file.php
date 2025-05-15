<?php

include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idno = $_POST['idno'];
    $grade = $_POST['grade'];
    
    if(empty($grade) || empty($idno)){
        header('location: ../php/teacher_grade_page.php');
        exit();
    }

    // SQL Query to check if the grade exists
    $checkSQL = "SELECT id FROM grade WHERE grade_no = ?";
    $stmt = $conn->prepare($checkSQL);
    $stmt->bind_param("i", $grade); // Bind integer value


    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $gradeId = $row['id'];

            // UPDATE SQL Query to update learner's grade in the database
            $updateSQL = "UPDATE teacher SET grade_id = ? WHERE idno = ?";
            $stmt = $conn->prepare($updateSQL);
            $stmt->bind_param("ii", $gradeId, $idno);

            // Execute query and check success
            if ($stmt->execute()) {
                echo "<script>alert('Grade updated successfully!'); window.location.href='../php/teacher_grade_page.php';</script>";
                exit();
            } else {
                echo "<script>alert('Grade failed update!');window.location.href='../php/teacher_grade_page.php';</script>";
                exit();
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        } else {
            echo "<script>alert('Invalid grade number!');window.location.href='../php/teacher_grade_page.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Grade number is not found!');window.location.href='../php/teacher_grade_page.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid form submission!');window.location.href='../php/teacher_grade_page.php';</script>";
    exit();
}
?>

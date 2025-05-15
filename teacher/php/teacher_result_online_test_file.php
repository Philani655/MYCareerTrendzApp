<?php

session_start();
include '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $term_id = $_SESSION['term_id'];
    $learnerId = $_SESSION['learnerId'];
    $idNumber = $_SESSION['idNumber'];
    $gradeId = $_SESSION['grade_id'];
    $subject_id = $_SESSION['subject_id'];
    $mark = $_POST['mark'];

    $sql = "SELECT * 
        FROM subject_final_mark 
        WHERE term_id = ? 
        AND learner_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $term_id, $learnerId);
    $stmt->execute();
    $result = $stmt->get_result();

    $count = 0;
    // Check if rows are found
    if ($result->num_rows > 0) {
        echo "<script>alert('update online test');</script>";

        $sqlUpdate = "UPDATE subject_final_mark 
        SET quiz_mark = ? 
        WHERE learner_id = ? 
        AND term_id = ?";

        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bind_param("dii", $mark, $learnerId, $term_id); // "dii" = double, integer, integer
        $stmtUpdate->execute();

        if ($stmtUpdate->affected_rows > 0) {
            echo "<script>alert('Record is updated successfully');window.location.href='../php/teacher_result_summary.php';</script>";
            exit();
        } else {
            echo "<script>alert('Fail to updated marks');window.location.href='../php/teacher_results.php';</script>";
            exit();
        }
    } else {
        $sqlInsert = "INSERT INTO subject_final_mark 
            (teacher_id, learner_id, term_id, subject_id , grade_id , quiz_mark) 
        VALUES (?, ?, ?, ? , ? ,?) ";

        $stmtInsert = $conn->prepare($sqlInsert);
        $stmtInsert->bind_param("ssiiid", $idNumber, $learnerId, $term_id,$subject_id ,  $gradeId , $mark); // "iiii" = four integers
        $stmtInsert->execute();

        if ($stmtInsert->affected_rows > 0) {
            echo "<script>alert('Record is added successfully');window.location.href='../php/teacher_result_summary.php';</script>";
            exit();
        }else{
            echo "<script>alert('Record  not is added');window.location.href='../php/teacher_results.php';</script>";
            exit();
        }
    }
}
?>

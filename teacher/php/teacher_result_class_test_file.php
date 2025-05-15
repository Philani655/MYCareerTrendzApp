<?php

session_start();
include '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $term_id = $_SESSION['term_id'];
    $learnerId = $_SESSION['learnerId'];
    $idNumber = $_SESSION['idNumber'];
    $gradeId = $_SESSION['grade_id'];
    $subject_id= $_SESSION['subject_id'];
    $mark = $_POST['mark'];
    $subjectname = $_SESSION['subjectname'];
    $subjectcode = $_SESSION['subjectcode'];

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
        SET class_mark = ? 
        WHERE learner_id = ? 
        AND term_id = ?";

        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bind_param("dii", $mark, $learnerId, $term_id); // "dii" = double, integer, integer
        $stmtUpdate->execute();
        
        // Prepare the statement
            $sqllearner = "SELECT l.idno AS idno 
                            FROM learner l, subjects su 
                            WHERE l.idno = su.learner_id 
                            AND l.grade_id = su.grade_id 
                            AND l.grade_id = ? 
                            AND su.subjectcode = ? 
                            AND su.subjectname = ?";

            $stmtLearner = $conn->prepare($sqllearner);
            $stmtLearner->bind_param("iss", $gradeId, $subjectcode, $subjectname);
            // "i" = integer, "s" = string
            // Execute the statement
            $stmtLearner->execute();
            $resultLearner = $stmtLearner->get_result();

            $isValid = false;

            if ($resultLearner->num_rows > 0) {
                while ($rowLearner = $resultLearner->fetch_assoc()) {

                    $learner_id = $rowLearner['idno'];
                    $status = 0;
                    $message = 'Class Test final mark is updated in ' . $_SESSION['subjectname'] ;

                    // Prepare the statement
                    $sqltn = "INSERT INTO `teacher_notifications`(`teacher_id`, `learner_id`, `subject_id`, `grade_id`, `message`, `status`) VALUES (?,?,?,?,?,?)";
                    $stmttn = $conn->prepare($sqltn);
                    $stmttn->bind_param("ssiisi", $idNumber, $learner_id, $subject_id, $gradeId, $message, $status);
                    // "iiiis" means: integer, integer, integer, integer, string
                    // Prepare the statement
                    $sqlpn = "INSERT INTO `parent_notifications`(`teacher_id`,`learner_id` , `subject_id`,  `grade_id`, `message`, `status`) VALUES (?,? ,?,?,?,?)";
                    $stmtpn = $conn->prepare($sqlpn);
                    $stmtpn->bind_param("ssiisi", $idNumber, $learner_id, $subject_id, $gradeId, $message, $status);
                    // "iiiis" means: integer, integer, integer, integer, string

                    if ($stmttn->execute() && $stmtpn->execute()) {
                        $isValid = true;
                    } else {
                        echo "<script>alert('Something went wrong with your subject!');</script>";
                        echo "<script>window.location.href='../php/teacher_results.php';</script>";
                        exit();
                    }
                }
            }

        if ($stmtUpdate->affected_rows > 0 && $isValid) {
            echo "<script>alert('Record is updated successfully');window.location.href='../php/teacher_result_summary.php';</script>";
            exit();
        } else {
            echo "<script>alert('Fail to updated marks');window.location.href='../php/teacher_results.php';</script>";
            exit();
        }
    } else {
        $sqlInsert = "INSERT INTO subject_final_mark 
            (teacher_id, learner_id, term_id, subject_id ,  grade_id , class_mark) 
        VALUES (?, ?, ?, ? , ? , ?)";

        $stmtInsert = $conn->prepare($sqlInsert);
        $stmtInsert->bind_param("ssiiid", $idNumber, $learnerId, $term_id, $subject_id , $gradeId , $mark); // "iiii" = four integers
        $stmtInsert->execute();
        
        // Prepare the statement
            $sqllearner = "SELECT l.idno AS idno 
                            FROM learner l, subjects su 
                            WHERE l.idno = su.learner_id 
                            AND l.grade_id = su.grade_id 
                            AND l.grade_id = ? 
                            AND su.subjectcode = ? 
                            AND su.subjectname = ?";

            $stmtLearner = $conn->prepare($sqllearner);
            $stmtLearner->bind_param("iss", $gradeId, $subjectcode, $subjectname);
            // "i" = integer, "s" = string
            // Execute the statement
            $stmtLearner->execute();
            $resultLearner = $stmtLearner->get_result();

            $isValid = false;

            if ($resultLearner->num_rows > 0) {
                while ($rowLearner = $resultLearner->fetch_assoc()) {

                    $learner_id = $rowLearner['idno'];
                    $status = 0;
                    $message = 'Class Test final mark in ' . $_SESSION['subjectname'] ;

                    // Prepare the statement
                    $sqltn = "INSERT INTO `teacher_notifications`(`teacher_id`, `learner_id`, `subject_id`, `grade_id`, `message`, `status`) VALUES (?,?,?,?,?,?)";
                    $stmttn = $conn->prepare($sqltn);
                    $stmttn->bind_param("ssiisi", $idNumber, $learner_id, $subject_id, $gradeId, $message, $status);
                    // "iiiis" means: integer, integer, integer, integer, string
                    // Prepare the statement
                    $sqlpn = "INSERT INTO `parent_notifications`(`teacher_id`,`learner_id` , `subject_id`,  `grade_id`, `message`, `status`) VALUES (?,? ,?,?,?,?)";
                    $stmtpn = $conn->prepare($sqlpn);
                    $stmtpn->bind_param("ssiisi", $idNumber, $learner_id, $subject_id, $gradeId, $message, $status);
                    // "iiiis" means: integer, integer, integer, integer, string

                    if ($stmttn->execute() && $stmtpn->execute()) {
                        $isValid = true;
                    } else {
                        echo "<script>alert('Something went wrong with your subject!');</script>";
                        echo "<script>window.location.href='../php/teacher_results.php';</script>";
                        exit();
                    }
                }
            }

        
        if ($stmtInsert->affected_rows > 0 && $isValid) {
            echo "<script>alert('Record is added successfully');window.location.href='../php/teacher_result_summary.php';</script>";
            exit();
        }else{
            echo "<script>alert('Record  not is added');window.location.href='../php/teacher_results.php';</script>";
            exit();
        }
    }
}
?>

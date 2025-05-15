<?php

session_start();
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST['content'];
    $userID = $_SESSION['userID'];
    $status = 0;

    // Prepare and execute the query
    $sqlt = "SELECT * FROM `teacher`";
    $resultt = $conn->query($sqlt);

    $isVaildTeacher = false;
    if ($resultt->num_rows > 0) {
        while ($rowt = $resultt->fetch_assoc()) {
            // Prepare the statement
            $sqlsct = "INSERT INTO `school_announcements` (`admin_id`, `user_id`, `message`, `status`) VALUES (?, ?, ?, ?)";
            $stmtsct = $conn->prepare($sqlsct);

            // Bind parameters (i = integer, s = string)
            $stmtsct->bind_param("sssi", $userID, $rowt['idno'], $content, $status);
            if ($stmtsct->execute()) {
                $isVaildTeacher = true;
            }
        }
    }


    // Prepare and execute the query
    $sqltl = "SELECT * FROM `learner` ";
    $resultl = $conn->query($sqltl);

    $isValidLearner = false;

    if ($resultl->num_rows > 0) {
        while ($rowtl = $resultl->fetch_assoc()) {
            // Prepare the statement
            $sqlscl = "INSERT INTO `school_announcements` (`admin_id`, `user_id`, `message`, `status`) VALUES (?, ?, ?, ?)";
            $stmtscl = $conn->prepare($sqlscl);

            // Bind parameters (i = integer, s = string)
            $stmtscl->bind_param("sssi", $userID, $rowtl['idno'], $content, $status);

            if ($stmtscl->execute()) {
                $isValidLearner = true;
            }
        }
    }
    
    // Prepare and execute the query
    $sqltp = "SELECT * FROM `parent`";
    $resulttp = $conn->query($sqltp);

    $isVaildParent = false;
    if ($resulttp->num_rows > 0) {
        while ($rowtp = $resulttp->fetch_assoc()) {
            // Prepare the statement
            $sqlsctp = "INSERT INTO `school_announcements` (`admin_id`, `user_id`, `message`, `status`) VALUES (?, ?, ?, ?)";
            $stmtsctp = $conn->prepare($sqlsctp);

            // Bind parameters (i = integer, s = string)
            $stmtsctp->bind_param("sssi", $userID, $rowtp['idno'], $content, $status);
            if ($stmtsctp->execute()) {
                $isVaildParent = true;
            }
        }
    }

    if ($isVaildTeacher && $isValidLearner && $isVaildParent) {
        echo "<script>alert('School announcements is sent.');window.location.href='../php/school_announcement.php';</script>";
        exit();
    } else {
        echo "<script>alert('Something went wrong!');window.location.href='../php/school_announcement.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Something went wrong!');window.location.href='../php/school_announcement.php';</script>";
    exit();
}
?>
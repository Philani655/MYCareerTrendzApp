<?php

include_once '../database/config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //learner information from page
    $validCertificate = $_POST["validCertificate"];
    $idNumber = $_POST["idNumber"];

    //store id number in session
    $_SESSION['idNumber'] = $_POST["idNumber"];

    //Personal Information
    $gender = $_POST["gender"];
    $dob = $_POST["date"];
    $title = $_POST["title"];
    $initials = $_POST["initials"];
    $surname = $_POST["surname"];
    $firstNames = $_POST["firstNames"];
    $maidenName = $_POST["maidenName"];
    $pstatus = $_POST["status"];
    $language = $_POST["langauge"];
    $ethinic = $_POST["ethinic"];

    //Address Information
    $streetName = $_POST["streetName"];
    $suburbName = $_POST["suburbName"];
    $postalCode = $_POST["postalCode"];

    //Contact Information
    $mobileNumber = $_POST["mobileNumber"];
    $email = $_POST["email"];
    $currentDate = date("Y-m-d H:i:s");

    // Check if idNumber exists in the database
    $checkSQL = "SELECT idno FROM learner_admission WHERE idno = ?";
    $checkStmt = $conn->prepare($checkSQL);
    $checkStmt->bind_param("s", $idNumber);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        // If ID exists, redirect to parent/guardian page
        echo "<script>alert('Learner is already applied!')</script>";
        echo "<script>window.location.href = '../php/learner_admission.php';</script>";
        exit();
    } else {
        // If ID does not exist, insert data into the database
        $insertSQL = "INSERT INTO `learner_admission` 
                 (`idno`, `title`, `initials`, `firstname`, `secondname`,`surname` , `gender`, `dob`, `language`, `ethnic`, `pstatus`, `citizen`, `mobileno`, `email`, `streetname`, `suburbname`, `postalcode`, `status`, `date_time`) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending', ?)";

        $insertStmt = $conn->prepare($insertSQL);
        $insertStmt->bind_param("ssssssssssssssssss", $idNumber, $title, $initials, $firstNames, $maidenName,$surname ,  $gender, $dob, $language, $ethinic, $pstatus, $validCertificate, $mobileNumber, $email, $streetName, $suburbName, $postalCode, $currentDate);

        if ($insertStmt->execute()) {
            echo "<script>window.location.href = '../php/parent_guardian.php';</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.')</script>";
            echo "<script>window.location.href = '../php/learner_admission.php';</script>";
            exit();
        }
        $insertStmt->close();
    }
    $checkStmt->close();
    $conn->close();
} else {
    echo "<script> "
    . "alert('Invalid request form submittion');"
    . "window.location.href = '../php/learner_admission.php';"
    . "</script>";
}
?>

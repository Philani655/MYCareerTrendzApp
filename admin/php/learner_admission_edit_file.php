<?php

session_start();
include '../database/config.php';

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

    // Prepare the SQL query
    $updateSQL = "UPDATE `learner_admission` 
                  SET `title`=?, `initials`=?, `firstname`=?, `secondname`=?, `gender`=?, `dob`=?, 
                      `language`=?, `ethnic`=?, `pstatus`=?, `citizen`=?, `mobileno`=?, `email`=?, 
                      `streetname`=?, `suburbname`=?, `postalcode`=? 
                  WHERE `idno`=?";

    // Prepare the statement
    $stmt = $conn->prepare($updateSQL);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("ssssssssssssssss", $title, $initials, $firstNames, $surname, $gender, $dob, $language, $ethinic, $pstatus, $validCertificate, $mobileNumber, $email, $streetName, $suburbName, $postalCode, $idNumber
        );

        // Execute the update query
        if ($stmt->execute()) {
            echo "<script>alert('Record updated successfully!'); window.location.href='../php/learner_admission_page.php';</script>";
            exit();
        } else {
            echo "<script>alert('Something went wrong!');window.location.href='../php/learner_admission_edit.php');</script>";
            exit();
        }
    }

    // Close statement
    $stmt->close();
} else {
    echo "<script> "
    . "alert('Invalid request form submittion');"
    . "window.location.href = '../php/learner_admission.php';"
    . "</script>";
}
?>

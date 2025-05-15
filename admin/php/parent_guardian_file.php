<?php

session_start();
include_once '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Parent/ Guardian Information
    $resides = $_POST["resides"];
    $working = $_POST["working"];
    $citizen = $_POST["validCertificate"];
    $idNumber = $_POST["idNumber"];
    $title = $_POST["title"];
    $names = $_POST["name"];
    $pstatus = $_POST["status"];
    $langauge = $_POST["langauge"];
    $ethinic = $_POST["ethinic"];
    $mobileNumber = $_POST["mobileNumber"];
    $homeNumber = $_POST["homeNumber"];
    $workNumber = $_POST["workNumber"];
    $email = $_POST["email"];

    //Address Information
    $streetName = $_POST["streetName"];
    $suburbName = $_POST["suburbName"];
    $postalCode = $_POST["postalCode"];

    //retrieve learner id from the session
    $_SESSION['idNumber'] = $idNumber;
    $learnerId = $_SESSION['learnerId'];
    $currentDate = date("Y-m-d H:i:s");

    //check learner id is empty
    if ($learnerId === null) {
        // Change the path (e.g., redirect to another page)
        echo "<script>window.location.href = '../php/learner_admission.php';</script>";
        exit(); // Make sure to exit to stop further execution
    }
    // Check if idNumber exists
    $checkSQL = "SELECT * FROM parent_guardian WHERE learner_id = ?";
    $stmt = $conn->prepare($checkSQL);
    $stmt->bind_param("s", $learnerId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If idNumber exists, redirect to next page
        echo "<script>window.location.href = '../php/learner_school_information.php';</script>";
    } else {

        // Insert data into the database
        $insertSQL = "INSERT INTO parent_guardian (idno, learner_id, title, fnames, pstatus, language, ethnic, mobileno, homecell, workno, email, reside, workstatus, citizen, streetname, suburbname, postalcode, date_time) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($insertSQL);
        $stmt->bind_param("ssssssssssssssssss", $idNumber, $learnerId, $title, $names, $pstatus, $langauge, $ethinic, $mobileNumber, $homeNumber, $workNumber, $email, $resides, $working, $citizen, $streetName, $suburbName, $postalCode, $currentDate);

        if ($stmt->execute()) {
            echo "<script>window.location.href = '../php/learner_school_information.php';</script>";
        } else {
            echo "<script>alert('Something went wrong!');</script>";
            echo "<script>window.location.href = '../php/parent_guardian.php';</script>";
        }
    }
} else {
    echo "<script> "
    . "alert('Invalid request form submittion');"
    . "window.location.href = '../php/parent_guardian.php';"
    . "</script>";
}
?>
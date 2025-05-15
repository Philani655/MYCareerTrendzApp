<?php

include_once '../database/config.php';
session_start();

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
    $learnerId = $_SESSION['idNumber'];
    $currentDate = date("Y-m-d H:i:s");

    //check learner id is empty
    if ($learnerId === null) {
        // Change the path (e.g., redirect to another page)
        echo "<script>window.location.href = '../php/learner_admission.php';</script>";
        exit(); // Make sure to exit to stop further execution
    }

    // Insert data into the database
    $insertSQL = "INSERT INTO parent_guardian (idno, learner_id, title, fnames, pstatus, language, ethnic, mobileno, homecell, workno, email, reside, workstatus, citizen, streetname, suburbname, postalcode, date_time) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insertSQL);
    $stmt->bind_param("ssssssssssssssssss", $idNumber, $learnerId, $title, $names, $pstatus, $langauge, $ethinic, $mobileNumber, $homeNumber, $workNumber, $email, $resides, $working, $citizen, $streetName, $suburbName, $postalCode, $currentDate);

    if ($stmt->execute()) {
        echo "<script>window.location.href = '../php/school_information.php';</script>";
    } else {
        echo "<script>alert('Something went wrong!');</script>";
        echo "<script>window.location.href = '../php/parent_guardian.php';</script>";
    }
} else {
    echo "<script> "
    . "alert('Invalid request form submittion');"
    . "window.location.href = '../php/parent_guardian.php';"
    . "</script>";
}
?>
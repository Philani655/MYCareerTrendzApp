<?php

session_start();
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Retrieving data from the form
    $idNumber = $_POST["idNumber"];
    $password = $_POST["password"];

    $checkSQL = "SELECT * FROM `learner_admission` WHERE `idno` = ? AND LOWER(`status`) != 'approved'";
    $stmtCheck = $conn->prepare($checkSQL);

    if ($stmtCheck) {
        $stmtCheck->bind_param("s", $idNumber); // Bind learnerId to idno
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();

        if ($result->num_rows > 0) {
            // Learner exists but status is not "approved"
            echo "<script>alert('Learner is not yet approved.');</script>";
            echo "<script>window.location.href = '../php/learner_login.php'</script>";
            exit();
        } else {

            // Prepare the SQL query
            $sqlLearner = "SELECT * FROM `learner` WHERE `idno` = ? and `password` = ?";
            $stmtLearner = $conn->prepare($sqlLearner);

            // Bind the parameter
            $stmtLearner->bind_param("ss", $idNumber, $password);

            // Execute the query
            $stmtLearner->execute();
            $result = $stmtLearner->get_result();

            // Check if any rows are found
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                $_SESSION['grade_id'] = $row['grade_id'];
                $_SESSION['idNumber'] = $idNumber;

                $active = 1; // Set to 1 if active, 0 if not active
                
                // Prepare the SQL query
                $sql = "INSERT INTO `learner_log` (`learner_id`, `active`) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);

                // Bind the parameters
                $stmt->bind_param("si", $idNumber, $active); // "s" for string, "i" for integer
                // Execute the query
                $stmt->execute();

                echo "<script>window.location.href='../php/learner_dashboard.php';</script>";
                exit();
            } else {
                echo "<script>alert('Invalid login details!');</script>";
                echo "<script>window.location.href='../php/learner_login.php';</script>";
                exit();
            }
            $stmtLearner->close();
        }
        $stmtCheck->close();
    }
} else {
    echo "<script>alert('Invalid login submission to server!');</script>";
    echo "<script>window.location.href='../php/learner_login.php';</script>";
    exit();
}
?>




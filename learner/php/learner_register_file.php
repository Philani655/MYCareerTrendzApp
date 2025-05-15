<?php

include_once '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Retrieving data from the form
    $idNumber = $_POST["idNumber"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $cell = $_POST["cell"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    //declare varaibles
    $gradeId = ' ';
    $schoolId = ' ';

    $checkSQL = "SELECT * FROM `learner_admission` WHERE `idno` = ? AND LOWER(`status`) != 'approved'";
    $stmtCheck = $conn->prepare($checkSQL);

    if ($stmtCheck) {
        $stmtCheck->bind_param("s", $idNumber); // Bind learnerId to idno
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();

        if ($result->num_rows > 0) {
            // Learner exists but status is not "approved"
            echo "<script>alert('Learner is not yet approved.');</script>";
            echo "<script>window.location.href = '../php/learner_register.php'</script>";
            exit();
        } else {
            //include file to register learner
            //aproved learner
            // Prepare the SQL query
            $sqlSubjects = "SELECT `id`, `grade_id` FROM `subjects` WHERE `learner_id` = ?";
            $stmtSubject = $conn->prepare($sqlSubjects);

            if ($stmtSubject) {
                // Bind the parameter
                $stmtSubject->bind_param("s", $idNumber);

                // Execute the query
                $stmtSubject->execute();

                // Get the result
                $result = $stmtSubject->get_result();

                // Check if any rows are returned
                if ($result->num_rows > 0) {
                    // Output the data for each row
                    while ($row = $result->fetch_assoc()) {
                        $gradeId = $row['grade_id'];
                    }
                }
                $stmtSubject->close();
            }

            // Prepare the SQL query
            $sqlSchool = "SELECT `id` FROM `school` WHERE `learner_id` = ?";
            $stmtSchool = $conn->prepare($sqlSchool);

            if ($stmtSchool) {
                // Bind the parameter
                $stmtSchool->bind_param("s", $idNumber);

                // Execute the query
                $stmtSchool->execute();

                // Get the result
                $result = $stmtSchool->get_result();

                // Check if any rows are returned
                if ($result->num_rows > 0) {
                    // Output the data for each row
                    while ($row = $result->fetch_assoc()) {
                        $schoolId = $row['id'];
                    }
                }
                $stmtSchool->close();
            }

            // Prepare the SQL statement
            $sqlLearner = "SELECT * FROM learner WHERE idno = ?";

            // Prepare the statement
            $stmtLearner = $conn->prepare($sqlLearner);

            // Bind parameters
            $stmtLearner->bind_param("s", $idNumber); // 's' denotes string type
            // Execute the query
            $stmtLearner->execute();

            // Get the result
            $resultLearner = $stmtLearner->get_result();

            // Check if any rows are returned
            if ($resultLearner->num_rows > 0) {
                echo "<script>alert('Learner is already registered!');</script>";
                echo "<script>window.location.href='../php/learner_login.php';</script>";
                exit();
            } else {

                //insert data to database 
                // Prepare the SQL query
                $sql = "INSERT INTO `learner` (`idno`, `name`, `surname`, `email`, `password`, `contactno`, `location`, `grade_id`, `school_id`) 
                        VALUES (?, ?, ?, ?, ?, ?, '../../image/download.png', ?, ?)";

                $stmt = $conn->prepare($sql);
       
                if ($stmt) {
                    // Bind the parameters
                    $stmt->bind_param("ssssssii", $idNumber, $name, $surname, $email, $password, $cell, $gradeId, $schoolId);

                    // Execute the query
                    if ($stmt->execute()) {
                        echo "<script>window.location.href='../php/learner_login.php';</script>";
                        exit();
                    }

                    // Close statement
                    $stmt->close();
                }
            }

            // Close the statement and connection
            $stmt->close();
            $conn->close();
        }
        $stmtCheck->close();
    }

    $conn->close();
} else {
    echo "<script>alert('Invalid register submission  to server!');</script>";
    echo "<script>window.location.href='../php/learner_register.php';</script>";
    exit();
}
?>


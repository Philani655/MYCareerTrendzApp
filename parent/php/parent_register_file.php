<?php

include_once '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idNumber = $_POST['idNumber'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $cell = $_POST['cell'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $idNumber = $_POST['idNumber'];
    $location = '../../image/download.png';

    // Prepare the SQL query
    $sqlParentGuardian = "SELECT * FROM parent_guardian WHERE idno = ?";
    $stmtParentGuardian = $conn->prepare($sqlParentGuardian);
    $stmtParentGuardian->bind_param("s", $idNumber); // 's' indicates the parameter is a string
    // Execute the query
    $stmtParentGuardian->execute();
    $result = $stmtParentGuardian->get_result();

    // Check if any rows are returned
    if ($result->num_rows > 0) {

        // Check if the idno already exists
        $checkQuery = "SELECT * FROM `parent` WHERE `idno` = ?";
        $checkStmt = $conn->prepare($checkQuery);

        if ($checkStmt) {
            $checkStmt->bind_param("s", $idNumber); // 's' for string
            $checkStmt->execute();
            $checkStmt->store_result();

            if ($checkStmt->num_rows > 0) {
                // ID Number already exists
                echo "<script>alert('Parent is already exists!.');</script>";
                echo "<script>window.location.href = '../php/parent_login.php';</script>";
            } else {
                // Proceed with insertion
                $insertQuery = "INSERT INTO `parent` (`idno`, `name`, `surname`, `email`, `password`, `contactno`, `location`) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
                $insertStmt = $conn->prepare($insertQuery);

                if ($insertStmt) {
                    $insertStmt->bind_param("sssssss", $idNumber, $name, $surname, $email, $password, $cell, $location);

                    if ($insertStmt->execute()) {
                        echo "<script>alert('Parent is registered successfully.');</script>";
                        echo "<script>window.location.href = '../php/parent_login.php';</script>";
                        exit();
                    } else {
                        echo "Error: " . $insertStmt->error;
                    }

                    $insertStmt->close();
                } else {
                    echo "<script>alert('Something went wrong!');</script>";
                    echo "<script>window.location.href='../php/parent_register.php';</script>";
                    exit();
                }
            }

            $checkStmt->close();
        } else {
            echo "Error in preparing the check statement: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "<script>alert('Your details were not included in learners admission');</script>";
        echo "<script>window.location.href='../php/parent_register.php';</script>";
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid form submission by parent!');</script>";
    echo "<script>window.location.href='../php/parent_register.php';</script>";
    exit();
}
  



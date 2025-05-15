<?php

session_start();
include '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idNumber = $_POST['idNumber'];
    $password = $_POST['password'];

    //store id number to session
    $_SESSION['idNumber'] = $idNumber;

    // Prepare the SQL query
    $sql = "SELECT * FROM `parent` WHERE `idno` = ? and `password`=? ";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameter (s = string)
        $stmt->bind_param("ss",$idNumber, $password);

        // Execute the query
        $stmt->execute();

        // Get the result set
        $result = $stmt->get_result();

        // Check if any rows are returned
        if ($result->num_rows > 0) {
            
            // Fetch the result as an associative array
            echo "<script>window.location.href='../php/parent_learner_check.php'</script>";
            exit();
        } else {
            echo "<script>alert('Invalid login details!')</script>";
            echo "<script>window.location.href='../php/parent_login.php'</script>";
            exit();
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error in preparing the statement: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "<script>alert('Invalid form submission by parent!');</script>";
    echo "<script>window.location.href='../php/parent_login.php';</script>";
    exit();
}




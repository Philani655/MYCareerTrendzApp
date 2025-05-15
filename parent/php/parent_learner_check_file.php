<?php

session_start();
include_once '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idNumber = $_POST["learnerId"];
    $_SESSION['learnerId'] = $_POST["learnerId"];

    $parentId = $_SESSION['idNumber'];

    if (empty($_SESSION['idNumber'])) {
        // Redirect to the desired page, e.g., login page
        header("Location: ../php/parent_login.php");
        exit(); // Stop further execution of the script
    }

    $checkSQL = "SELECT * FROM `learner_admission` WHERE `idno` = ? AND LOWER(`status`) != 'approved'";
    $stmtCheck = $conn->prepare($checkSQL);

    if ($stmtCheck) {
        $stmtCheck->bind_param("s", $idNumber); // Bind learnerId to idno
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();
        if ($result->num_rows > 0) {
            // Learner exists but status is not "approved"
            echo "<script>alert('Learner is not yet approved.');</script>";
            echo "<script>window.location.href = '../php/parent_login.php'</script>";
            exit();
        } else {
            $active = 1;     // Example value for active (1 for active, 0 for inactive)
            // Prepare the SQL statement
            $sql = "INSERT INTO parent_log (parent_id, learner_id, active) VALUES (?, ?, ?)";

            // Prepare the statement
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind the parameters: i = integer
                $stmt->bind_param("ssi", $parentId, $idNumber, $active);

                $stmt->execute();

                // Close the statement
                $stmt->close();
            }

            // Prepare the statement
            $sqll = "SELECT * FROM `learner` WHERE `idno` = ?";
            $stmtl = $conn->prepare($sqll);
            $stmtl->bind_param("s", $idNumber); // "i" means integer type
            // Execute the statement
            $stmtl->execute();
            $resultl = $stmtl->get_result();

            if ($resultl->num_rows > 0) {
                $row = $resultl->fetch_assoc();
                $_SESSION['grade_id'] = $row['grade_id'];
            }


            echo "<script>window.location.href = '../php/parent_dashboard.php'</script>";
            exit();
        }
    }
} else {
    echo "<script>alert('Invalid form submission!.');</script>";
    echo "<script>window.location.href = '../php/parent_login.php'</script>";
    exit();
}
?>

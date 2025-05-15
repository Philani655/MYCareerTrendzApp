<?php
session_start();
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $userID = htmlspecialchars(trim($_POST["idNumber"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    $_SESSION['userID'] = htmlspecialchars(trim($_POST["idNumber"]));
    
    // Check if the admin exists and if the status is not 'approved'
    $checkSQL = "SELECT `id`, `password`, `status` FROM `admin` WHERE `idno` = ?";
    $stmtCheck = $conn->prepare($checkSQL);

    if ($stmtCheck) {
        $stmtCheck->bind_param("s", $userID);
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedPassword = $row['password'];
            $status = strtolower($row['status']);

            // Check if status is not approved
            if ($status != 'approved') {
                echo "<script>alert('Admin is not yet approved.');</script>";
                echo "<script>window.location.href = '../php/login.php'</script>";
                exit();
            }

            // Verify the password
            if ($password === $storedPassword) {
                
                $active = 1; // Set to 1 if active, 0 if not active
                
                // Log the admin activity
                $sqlLog = "INSERT INTO `admin_log` (`admin_id`, `active`) VALUES (?, ?)";
                $stmtLog = $conn->prepare($sqlLog);
                $stmtLog->bind_param("si", $userID, $active);
                $stmtLog->execute();
                
                header('Location: ../php/dashboard.php');
                exit();
            } else {
                echo "<script>alert('Invalid login details!');</script>";
                echo "<script>window.location.href='../php/login.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Invalid ID number or Admin not found.');</script>";
            echo "<script>window.location.href='../php/login.php';</script>";
            exit();
        }
        $stmtCheck->close();
    }
} else {
    echo "<script>alert('Invalid login submission to server!');</script>";
    echo "<script>window.location.href='../php/login.php';</script>";
    exit();
}
?>

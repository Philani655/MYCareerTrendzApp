<?php
session_start();
include_once '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data  
    $idNumber = $_POST["idNumber"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];  // Hash the password
    $cell = $_POST["cell"];
    $date_time = date('Y-m-d H:i:s');

    // Handle file upload
    if (isset($_FILES['image'])) {
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $uploadDir = '../../profile_images/';
        $uploadFile = $uploadDir . basename($imageName);

        // Validate file type (allow only images)
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedTypes)) {
            if (move_uploaded_file($imageTmpName, $uploadFile)) {
                // File successfully uploaded
                // Update learner information in the database
                $sqlLearner = "UPDATE learner SET name=?, surname=?, email=?, password=?, contactno=?, location=?, date_time=? WHERE idno=?";
                $stmtLearner = $conn->prepare($sqlLearner);

                if ($stmtLearner) {
                    // Bind parameters to the SQL statement
                    $stmtLearner->bind_param("ssssssss", $firstName, $lastName, $email, $password, $cell, $uploadFile, $date_time, $idNumber);

                    // Execute the statement
                    if ($stmtLearner->execute()) {
                        echo "Profile updated successfully.";
                        echo "<script>window.location.href='../php/profile.php';</script>";
                    } else {
                        echo "Error updating profile: " . $stmtLearner->error;
                    }

                    // Close the statement
                    $stmtLearner->close();
                }
                exit();
            } else {
                
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
            exit();
        }
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>

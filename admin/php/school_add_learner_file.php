<?php

// Include database connection
include '../database/config.php'; // Adjust the path as needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data (Ensure proper validation/sanitization)
    $learner_id = $_POST['idno'];
    $school_name = $_POST['school'];
    $address = $_POST['address'];
    $suburb = $_POST['suburb'];
    $postalcode = $_POST['postalCode'];
    $email = $_POST['email'];
    $contact = $_POST['officeNo'];
    $date_time = date("Y-m-d H:i:s"); // Auto-generate current date & time

    $selectSQL = "SELECT * FROM `school` WHERE `learner_id` = ?";

    // Prepare the statement
    $stmt = $conn->prepare($selectSQL);

    if ($stmt) {
        // Bind parameter
        $stmt->bind_param("s", $learner_id); // "s" means string
        // Execute the query
        $stmt->execute();

        // Get result
        $result = $stmt->get_result();

        // Check if records exist
        if ($result->num_rows > 0) {
            echo "<script>alert('Learner already has a school!');window.location.href='../php/school_add_learner.php';</script>";
            exit();
        } else {
            
            // Prepare the SQL INSERT query
            $insertSQL = "INSERT INTO `school` (`learner_id`, `school_name`, `address`, `suburb`, `postalcode`, `email`, `contact`, `date_time`) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            // Prepare the statement
            $stmt = $conn->prepare($insertSQL);

            if ($stmt) {
                // Bind parameters
                $stmt->bind_param("ssssssss", $learner_id, $school_name, $address, $suburb, $postalcode, $email, $contact, $date_time);

                // Execute the query
                if ($stmt->execute()) {
                    echo "<script>alert('School is inserted successfully!'); window.location.href='../php/school_learner_page.php';</script>";
                    exit();
                } else {
                    echo "<script>alert('Something went wrong with adding school');window.location.href='../php/school_learner_page.php';</script>";
                    exit();
                }

                // Close the statement
            } else {
                echo "<script>alert('Invalid query statements!');window.location.href='../php/school_learner_page.php';</script>";
                exit();
            }
        }
    }

    $stmt->close();
    // Close database connection
    $conn->close();
}
?>

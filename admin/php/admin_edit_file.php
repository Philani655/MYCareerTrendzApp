<?php
session_start();
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get POST data and sanitize
    $idNumber = trim($_POST["idNumber"]);
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $password = trim($_POST["password"]);
    $email = trim($_POST["email"]);
    $contactno = trim($_POST["cell"]);
    $id = $_POST['id'];

    
    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $uploadDir = '../../profile_images/';
        $imagePath = $uploadDir . basename($imageName);

        // Validate file type (allow only images)
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedTypes)) {
            // Move file to the upload directory
            if (move_uploaded_file($imageTmpName, $imagePath)) {
                // File successfully uploaded

                // Update data in the database
                $sqlUpdateAdmin = "UPDATE admin SET idno = ?, firstname = ?, secondname = ?, password = ?, email = ?, contactno = ?, location = ? WHERE id = ?";

                // Prepare the statement
                $stmtUpdateAdmin = $conn->prepare($sqlUpdateAdmin);

                // Bind the parameters
                $stmtUpdateAdmin->bind_param("ssssssss", $idNumber, $firstName, $lastName, $password, $email, $contactno, $imagePath, $id);

                // Execute the query
                $stmtUpdateAdmin->execute();

                if ($stmtUpdateAdmin->execute()) {
                    echo "<script>alert('Admin is successfully updated!');window.location.href ='../php/admin_page.php';</script>";
                    exit();
                } else {
                    echo "<script>alert('Failed to update admin. Please try again.');window.location.href ='../php/admin_page.php';</script>";
                    exit();
                }
            } else {
                echo "<script>alert('Failed to upload image.');window.location.href ='../php/admin_page.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.');window.location.href ='../php/admin_page.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Please select an image to upload.');window.location.href ='../php/admin_page.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request method!');window.location.href ='../php/admin_page.php';</script>";
    exit();
}
?>

<?php 

include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get POST data and sanitize
    $idNumber = trim($_POST["idNumber"]);
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $password = trim($_POST["password"]);
    $email = trim($_POST["email"]);
    $contactno = trim($_POST["cell"]);


    // Check if admin with the same ID number already exists
    $sql = "SELECT * FROM admin WHERE idno = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $idNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Admin is already existing');window.location.href ='../php/admin_page.php';</script>";
        exit();
    } else {
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
                    $status = "Pending";

                    // Insert data into the database
                    $sqlInsertAdmin = "INSERT INTO admin (idno, firstname, secondname, password, email, contactno, location, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmtInsertAdmin = $conn->prepare($sqlInsertAdmin);
                    $stmtInsertAdmin->bind_param("ssssssss", $idNumber, $firstName, $lastName, $password, $email, $contactno, $imagePath, $status);

                    if ($stmtInsertAdmin->execute()) {
                        echo "<script>alert('Admin is successfully added!');window.location.href ='../php/admin_page.php';</script>";
                        exit();
                    } else {
                        echo "<script>alert('Failed to add admin. Please try again.');window.location.href ='../php/admin_page.php';</script>";
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
    }
} else {
    echo "<script>alert('Invalid request method!');window.location.href ='../php/admin_page.php';</script>";
    exit();
}
?>

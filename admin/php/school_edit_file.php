<?php
include '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $schoolName = $_POST['schoolName'];
    $address = $_POST['address'];
    $suburb = $_POST['suburb'];
    $postalCode = $_POST['postalCode'];
    $officeEmail = $_POST['officeEmail'];
    $officeNumber= $_POST['officeNumber'];
    $id = $_POST['id'];
    
     // Prepare the SQL statement
    $sql = "UPDATE school SET school_name=?, address=?, suburb=?, postalcode=?, email=?, contact=?, date_time=NOW() WHERE id=?";

    // Use prepared statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $schoolName, $address, $suburb, $postalCode, $officeEmail, $officeNumber, $id);

    // Execute the query
    if ($stmt->execute()) {
        echo "<script>alert('School is updated successfully!');window.location.href='../php/school_page.php';</script>";
        exit();
    }else{
       echo "<scsript>alert('School is not update!');window.location.href='../php/school_page.php';</script>";
        exit(); 
    }
    
}else{
    echo "<script>alert('Something went wrong with update form!');window.location.href='../php/school_page.php';</script>";
    exit();
}
?>

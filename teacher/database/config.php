<?php

$servername = "localhost"; // Change if using a remote server
$username = "root";        // Your database username
$password = "";            // Your database password (default is empty for XAMPP)
$database = "mycareertrendz"; // Change to your actual database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


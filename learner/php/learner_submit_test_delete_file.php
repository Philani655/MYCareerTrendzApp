<?php
// Include your database connection file
include '../database/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Prepare the DELETE statement
        $sql = "DELETE FROM `learner_class_test` WHERE `id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id); // "i" → integer

        if ($stmt->execute()) {
            // Redirect back to the page with a success message
            echo "<script>alert('Class test is removed successfully!');window.location.href='../php/learner_class_test.php';</script>";
            exit();
        } else {
            echo "<script>alert('Something went wrong!');window.location.href='../php/learner_class_test.php';</script>";
            exit();
        }

        $stmt->close();
    }
}

$conn->close();
?>

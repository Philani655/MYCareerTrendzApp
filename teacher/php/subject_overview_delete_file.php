
<?php
include '../database/config.php'; // your connection file

$sql = "TRUNCATE TABLE subject_overview";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Subject overview is removed');window.location.href='../php/subject_overview.php';</script>";
    exit();
} else {
    echo "<script>alert('Something went wrong!');window.location.href='../php/subject_overview.php';</script>";
    exit();
}

$conn->close();
?>
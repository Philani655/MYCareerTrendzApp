<?php

session_start();

$_SESSION['parent_id'] = $_GET['idno'];
header("location: ../php/teacher_sent_email_page.php");
?>

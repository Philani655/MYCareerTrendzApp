<?php
session_start();

$_SESSION['teacher_id'] = $_GET['idno'];
header('location: ../php/parent_sent_email_page.php');
?>

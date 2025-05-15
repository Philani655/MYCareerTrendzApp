<?php

session_start();

$class_test_id = $_GET['id'];
$option = $_GET['option'];

$_SESSION['class_test_id'] = $class_test_id;

$url = '';
switch ($option) {
    case 1:
        $url = '../php/uploaded_class_test.php';
        break;
    case 2:
        $url = '../php/uploaded_class_test.php';
        break;
}
header('location: '.$url);
?>
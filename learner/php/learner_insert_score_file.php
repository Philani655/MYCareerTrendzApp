<?php
include '../database/config.php';

// Get values from AJAX request
$learner_id = $_POST['learner_id'];
$test_id = $_POST['test_id'];
$subject_id = $_POST['subject_id'];
$grade_id = $_POST['grade_id'];
$score = $_POST['score'];

// Prepare the statement
$sql = "INSERT INTO `learner_class_test_score`(`learner_id`, `test_id`, `subject_id`, `grade_id`, `score`) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("siiii", $learner_id, $test_id, $subject_id, $grade_id, $score);

// Execute the statement
if ($stmt->execute()) {
   echo "Marks saved successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
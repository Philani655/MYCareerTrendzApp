<?php
include '../database/config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idno = $_POST['idno'];
    $grade_id = $_POST['grade_id'];
    $subjects = $_POST['subject'];

    if (empty($subjects) || empty($grade_id) || empty($idno)) {
        header('location: ../php/learner_subjects_page.php');
        exit();
    }

    // Default image path
    $location = '/subjects_images/images.jpg';
    $currentDate = date("Y-m-d H:i:s"); // Format: YYYY-MM-DD HH:MM:SS (24-hour format)

    // Map subjects to subject codes using an associative array
    $subjectMap = [
        'Accounting' => 'ACC', 'Afrikaans' => 'AFR', 'Agricultural Sciences' => 'AGR',
        'Business Studies' => 'BUS', 'Civil Technology' => 'CIV', 'Computer Applications Technology' => 'CAT',
        'Computer Science' => 'CS', 'Consumer Studies' => 'CON', 'Dance Studies' => 'DAN',
        'Drama' => 'DRA', 'Economics' => 'ECO', 'Economic Manangement Science' => 'EMS', 'Electrical Technology' => 'ELE',
        'Engineering Graphics and Design' => 'EGD', 'English First Additional Language' => 'EFL',
        'English Home Language' => 'EHL', 'Geography' => 'GEO', 'History' => 'HIS',
        'Hospitality Studies' => 'HOS', 'Information Technology' => 'IT', 'isiNdebele' => 'INDE',
        'isiZulu Home Language' => 'ZHL', 'isiZulu First Additional Language' => 'ZFA',
        'isiXhosa' => 'XHO', 'Life Sciences' => 'LIFE', 'Life Orientation' => 'LO',
        'Mathematics' => 'MATH', 'Mathematics Literacy' => 'MATHL', 'Music' => 'MUS',
        'Physical Science' => 'PHY', 'Sepedi' => 'SEP', 'Sesotho' => 'SES',
        'Setswana' => 'SET', 'siSwati' => 'SWATI', 'Tshivenda' => 'TSH',
        'Tourism' => 'TOUR', 'Visual Arts' => 'VIS', 'Xitsonga' => 'TSHO',
        'Natural Sciences' => 'NS', 'Social Sciences' => 'SOC', 'Technology' => 'TECH'
    ];

    // Insert SQL Query
    $insertSubjectSQL = "INSERT INTO subjects (learner_id, subjectname, subjectcode, grade_id, location, date_time) 
                         VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertSubjectSQL);

    if (!$stmt) {
        die("Error in SQL statement: " . $conn->error);
    }

    // Loop through subjects and insert into the database
    foreach ($subjects as $subject) {
        $subjectCode = $subjectMap[$subject] ?? "UNKNOWN";

        // **Check if the subject already exists for this learner**
        $checkSQL = "SELECT id FROM subjects WHERE learner_id = ? AND subjectname = ? AND subjectcode = ?";
        $checkStmt = $conn->prepare($checkSQL);
        $checkStmt->bind_param("sss", $idno, $subject, $subjectCode);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows == 0) { // If no duplicate found, insert the new subject
            $stmt->bind_param("ssssss", $idno, $subject, $subjectCode, $grade_id, $location, $currentDate);
            $stmt->execute();
        }
    }

    $stmt->close();
    $conn->close();

    // Redirect back with success message
    echo "<script>alert('Subjects added successfully!'); window.location.href='../php/learner_subjects_page.php';</script>";
    exit();
} else {
    echo "<script>alert('Invalid request!'); window.location.href='../php/learner_subjects_page.php';</script>";
    exit();
}
?>

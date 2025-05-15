<?php
session_start();
include_once '../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //school information from page
    $year = $_POST["year"];
    $schoolName = $_POST["school"];
    $schoolAddress = $_POST["address"];
    $suburb = $_POST["suburb"];
    $postalCode = $_POST["postalCode"];
    $email = $_POST["email"];
    $officeNo = $_POST["officeNo"];

    //Grade and subject Information
    $grade = $_POST["grade"];

    //Retrieve id number to session
    $learnerId = $_SESSION['learnerId'];
    $currentDate = date("Y-m-d H:i:s");
    $gradeId = '';
    $isValid = false;
    
    //check learner id is empty
    if ($learnerId === null) {
        // Change the path (e.g., redirect to another page)
        echo "<script>window.location.href = '../php/learner_admission.php';</script>";
        exit(); // Make sure to exit to stop further execution
    }

    // Prepare SQL query
    $checkLearnerIdSQL = "SELECT COUNT(*) FROM school WHERE learner_id = ?";
    $stmtCheck = $conn->prepare($checkLearnerIdSQL);

    if ($stmtCheck) {
        $stmtCheck->bind_param("s", $learnerId);
        $stmtCheck->execute();
        $stmtCheck->bind_result($count);
        $stmtCheck->fetch();
        $stmtCheck->close();

        // If learner_id already exists, do not insert
        if ($count > 0) {
            $isValid = true;
        } else {
            // Prepare SQL query for inserting school information
            $insertSchoolSQL = "INSERT INTO school (learner_id, school_name, address, suburb, postalcode, email, contact, date_time) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($insertSchoolSQL);

            if ($stmt) {
                $stmt->bind_param("ssssssss", $learnerId, $schoolName, $schoolAddress, $suburb, $postalCode, $email, $officeNo, $dateTime);

                // Execute the statement
                if ($stmt->execute()) {
                    $isValid = true;
                } else {
                    echo "<script>alert('Error inserting data: " . $stmt->error . "');</script>";
                    echo "<script>window.location.href = '../php/learner_school_information.php';</script>"; // Redirect to the next page
                    exit();
                }
            } else {
                echo "<script>alert('Failed to prepare the statement');</script>";
                echo "<script>window.location.href = '../php/learner_school_information.php';</script>"; // Redirect to the next page
                exit();
            }
        }
    } else {
        echo "<script>alert('Failed to check for existing learner_id');</script>";
        echo "<script>window.location.href = '../php/learner_school_information.php';</script>"; // Redirect to the next page
        exit();
    }


    // Prepare SQL query to retrieve grade_id based on grade_no
    $searchGradeIdSQL = "SELECT id FROM grade WHERE grade_no = ?";

    $stmt = $conn->prepare($searchGradeIdSQL);
    $stmt->bind_param("s", $grade); // Assuming grade_no is a string; change "s" to "i" if it's an integer
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the result
    $row = $result->fetch_assoc();

    if ($row && $isValid) {
        $gradeId = $row['id'];  
    } 

    $subjects = $_POST['subject']; // Get selected subjects as an array
    // Map the subject names to their corresponding subject codes
    $subjectCodes = [];
    foreach ($subjects as $subject) {
        switch ($subject) {
            case 'Accounting': $subjectCodes[] = "ACC";
                break;
            case 'Afrikaans': $subjectCodes[] = "AFR";
                break;
            case 'Agricultural Sciences': $subjectCodes[] = "AGR";
                break;
            case 'Business Studies': $subjectCodes[] = "BUS";
                break;
            case 'Civil Technology': $subjectCodes[] = "CIV";
                break;
            case 'Computer Applications Technology': $subjectCodes[] = "CAT";
                break;
            case 'Computer Science': $subjectCodes[] = "CS";
                break;
            case 'Consumer Studies': $subjectCodes[] = "CON";
                break;
            case 'Dance Studies': $subjectCodes[] = "DAN";
                break;
            case 'Drama': $subjectCodes[] = "DRA";
                break;
            case 'Economics': $subjectCodes[] = "ECO";
                break;
            case 'Economic Manangement Science': $subjectCodes[] = "EMS";
                break;
            case 'Electrical Technology': $subjectCodes[] = "ELE";
                break;
            case 'Engineering Graphics and Design': $subjectCodes[] = "EGD";
                break;
            case 'English First Additional Language': $subjectCodes[] = "EFL";
                break;
            case 'English Home Language': $subjectCodes[] = "EHL";
                break;
            case 'Geography': $subjectCodes[] = "GEO";
                break;
            case 'History': $subjectCodes[] = "HIS";
                break;
            case 'Hospitality Studies': $subjectCodes[] = "HOS";
                break;
            case 'Information Technology': $subjectCodes[] = "IT";
                break;
            case 'isiNdebele': $subjectCodes[] = "INDE";
                break;
            case 'isiZulu Home Language': $subjectCodes[] = "ZHL";
                break;
            case 'isiZulu First Additional Language': $subjectCodes[] = "ZFA";
                break;
            case 'isiXhosa': $subjectCodes[] = "XHO";
                break;
            case 'Life Sciences': $subjectCodes[] = "LIFE";
                break;
            case 'Life Orientation': $subjectCodes[] = "LO";
                break;
            case 'Mathematics': $subjectCodes[] = "MATH";
                break;
            case 'Mathematics Literacy': $subjectCodes[] = "MATHL";
                break;
            case 'Music': $subjectCodes[] = "MUS";
                break;
            case 'Physical Science': $subjectCodes[] = "PHY";
                break;
            case 'Sepedi': $subjectCodes[] = "SEP";
                break;
            case 'Sesotho': $subjectCodes[] = "SES";
                break;
            case 'Setswana': $subjectCodes[] = "SET";
                break;
            case 'siSwati': $subjectCodes[] = "SWATI";
                break;
            case 'Tshivenda': $subjectCodes[] = "TSH";
                break;
            case 'Tourism': $subjectCodes[] = "TOUR";
                break;
            case 'Visual Arts': $subjectCodes[] = "VIS";
                break;
            case 'Xitsonga': $subjectCodes[] = "TSHO";
                break;
            case 'Natural Sciences': $subjectCodes[] = "NS";
                break;
            case 'Social Sciences': $subjectCodes[] = "SOC";
                break;
            case 'Technology': $subjectCodes[] = "TECH";
                break;
            default: $subjectCodes[] = "UNKNOWN";
                break;
        }
    }

    $insertSubjectSQL = "INSERT INTO subjects(learner_id, subjectname,subjectcode, grade_id, location, date_time) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($insertSubjectSQL);

    //default image
    $location = '../../subjects_images/images.jpg';
        
    // Loop through subjects and insert into the database
    foreach ($subjects as $index => $subject) {
        $subjectCode = $subjectCodes[$index];

        // **Check if the subject already exists for this learner**
        $checkSQL = "SELECT id FROM subjects WHERE learner_id = ? AND subjectname = ? AND subjectcode = ?";
        $checkStmt = $conn->prepare($checkSQL);
        $checkStmt->bind_param("sss", $learnerId, $subject, $subjectCode);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows == 0) { // **If no duplicate found, insert the new subject**
            $stmt->bind_param("ssssss", $learnerId, $subject, $subjectCode, $gradeId, $location, $currentDate);
            $stmt->execute();
        }
    }

    $stmt->close();
    $conn->close();
    
    echo "<script> "
    . "window.location.href = '../php/learner_uploading_documents.php';"
    . "</script>";
} else {
    echo "<script> "
    . "alert('Invalid request form submittion');"
    . "window.location.href = '../php/learner_school_information.php';"
    . "</script>";
}
?>
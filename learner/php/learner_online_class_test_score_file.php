<?php
session_start();
include '../database/config.php'; // Include database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correct_answers = 0;
    $wrong_answers = 0;

    // ✅ Step 1: Fetch correct answers from the database
    $query = "SELECT id , test_id , correct_answer FROM online_class_test";
    $result = mysqli_query($conn, $query);

    $answers = [];
    $test_id = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $answers[$row['id']] = $row['correct_answer']; // Store question ID and correct answer
        $test_id = $row['test_id'];
    }

    // ✅ Step 2: Compare user answers with correct answers
    foreach ($_POST as $key => $user_answer) {
        // Extract numeric question ID from input name (e.g., "answer_1" -> "1")
        if (strpos($key, 'answer_') !== false) {
            $question_id = str_replace('answer_', '', $key);

            if (isset($answers[$question_id])) {
                if ($user_answer === $answers[$question_id]) {
                    $correct_answers++; // Increment correct count
                } else {
                    $wrong_answers++; // Increment wrong count
                }
            }
        }
    }

    // ✅ Step 3: Store results in session (or database)
    $_SESSION['correct_answers'] = $correct_answers;
    $_SESSION['wrong_answers'] = $wrong_answers;
    $_SESSION['test_id'] = $test_id;

    $markPerc = (($correct_answers) / ($correct_answers + $wrong_answers)) * 100;
    ?>
    <?php
    // Example condition (you can adjust based on your logic)
    $success = true;
    ?>


    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Modal Alert Example</title>

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>

            <?php if ($success): ?>
                <!-- Success Modal -->
                <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered"> <!-- Centered Modal -->
                        <div class="modal-content">
                            <div class="modal-header bg-success text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Success</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td><b>ID Number</b></td>
                                        <td><?php echo $_SESSION['idNumber']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Correct Answer</b></td>
                                        <td><?php echo $correct_answers; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Wrong Answer</b></td>
                                        <td><?php echo $wrong_answers; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Total Questions</b></td>
                                        <td><?php echo $wrong_answers + $correct_answers; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Total Score</b></td>
                                        <td><?php echo $markPerc; ?> <b>%</b></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" onclick="done()">OK</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // Show the modal when the page loads
                    window.onload = function () {
                        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();
                    };

                    // Handle the "OK" button click using AJAX
                    function done() {
                        let xhr = new XMLHttpRequest();
                        xhr.open("POST", "../php/learner_insert_score_file.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                        xhr.onload = function () {
                            if (xhr.status === 200) {
                                alert(xhr.responseText); // Success or error message
                                window.location.href = '../php/learner_class_test.php'; // Redirect after submission
                            }
                        };

                        // Pass data to PHP
                        let params = `learner_id=<?php echo $_SESSION['idNumber']; ?>&test_id=<?php echo $test_id; ?>&subject_id=<?php echo $_SESSION['subject_id']; ?>&grade_id=<?php echo $_SESSION['grade_id']; ?>&score=<?php echo $markPerc; ?>`;
                        xhr.send(params);
                    }
                </script>
            <?php endif; ?>

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        </body>
    </html>
    <?php
    exit();
}
?>

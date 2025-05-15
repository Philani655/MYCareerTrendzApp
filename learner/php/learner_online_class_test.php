<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <?php include '../php/header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/page_nav.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        School Year: <?php
                        $currentYear = date('Y');
                        $nextYear = $currentYear + 1;
                        $yearRange = $currentYear . '-' . $nextYear;
                        echo $yearRange;
                        ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../php/learner_dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Learner Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Multiple Choose Test</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="chart">
                                                <?php
                                                include '../database/config.php';

                                                $subjectname = $_SESSION['subjectname'];
                                                $subjectcode = $_SESSION['subjectcode'];
                                                $grade_id = $_SESSION['grade_id'];
                                                

                                                if (!isset($_SESSION['subjectname'])) {
                                                    echo "<script>window.location.href='../php/my_classes.php';</scrpt>";
                                                    exit();
                                                }

                                                // Fetch all questions
                                                $sql = "
                                                        SELECT oct.id, oct.question, oct.option_a, oct.option_b, oct.option_c, oct.option_d, oct.correct_answer, oct.date_time 
                                                        FROM online_class_test oct
                                                        JOIN subjects s ON s.id = oct.subject_id 
                                                        WHERE s.subjectname = ?  
                                                        AND s.subjectcode = ?  
                                                        AND oct.grade_id = ?
                                                    ";

                                                $stmt = $conn->prepare($sql);
                                                $stmt->bind_param("sss", $subjectname, $subjectcode, $grade_id);

                                                // Execute the query
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                $questions = [];
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $questions[] = $row;
                                                    }
                                                }
                                                ?>
                                                <form action="../php/learner_online_class_test_score_file.php" method="POST">
                                                    <?php foreach ($questions as $index => $question): ?>
                                                        <div class="mb-4">
                                                            <label class="form-label"><?php echo ($index + 1) . ". " . htmlspecialchars($question['question']); ?></label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="answer_<?php echo $question['id']; ?>" value="A" required>
                                                                <label class="form-check-label">A. <?php echo htmlspecialchars($question['option_a']); ?></label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="answer_<?php echo $question['id']; ?>" value="B" required>
                                                                <label class="form-check-label">B. <?php echo htmlspecialchars($question['option_b']); ?></label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="answer_<?php echo $question['id']; ?>" value="C" required>
                                                                <label class="form-check-label">C. <?php echo htmlspecialchars($question['option_c']); ?></label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="answer_<?php echo $question['id']; ?>" value="D" required>
                                                                <label class="form-check-label">D. <?php echo htmlspecialchars($question['option_d']); ?></label>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                    <button type="submit" class="btn btn-primary w-100">Submit Answers</button>
                                                </form>
                                            </div>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div><!-- ./box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php include '../php/footer.php'; ?>
        </div> <!-- /.wrapper -->

        <?php include '../javascript/script.js'; ?>

        <style>

            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

            body {
                font-family: "Montserrat", sans-serif;
            }

        </style>


    </body>
</html>

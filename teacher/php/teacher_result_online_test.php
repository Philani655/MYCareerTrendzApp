<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <?php include '../php/teacher_header.php'; ?>
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
                        <li><a href="../php/teacher_dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Online Test</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../icons/result-1.png" width="28"> Results</h3>
                                    <div class="box-tools pull-right">
                                        <a href="./teacher_results.php" style="text-decoration: none;"><i class="fa-solid fa-arrow-left"></i> <b>Back</b></a>
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="chart">
                                                <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Title</th>
                                                            <th>Score</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        include '../database/config.php';

                                                        // Assuming the values are coming from a form or request
                                                        $learnerId = $_SESSION['learnerId'];


                                                        $sql = "SELECT 
                                                                    octd.title AS title  , 
                                                                    lcts.score AS score  
                                                                FROM  learner_class_test_score lcts ,  online_class_test_details octd
                                                                WHERE octd.test_id = lcts.test_id 
                                                                AND 
                                                                lcts.grade_id  = octd.grade_id 
                                                                AND  
                                                                lcts.learner_id = ? ";

                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->bind_param("s", $learnerId);
                                                        $stmt->execute();
                                                        $result = $stmt->get_result();

                                                        $count = 0;
                                                        // Check if rows are found
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                $count++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $count; ?></td>
                                                                    <td><?php echo $row['title']; ?></td>
                                                                    <td><?php echo $row['score']; ?><b>%</b></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }

                                                        $sqlt = "SELECT  
                                                                    oqd.title AS title, 
                                                                    lcts.score AS score 
                                                                FROM online_quiz_details oqd, learner_class_test_score lcts
                                                                WHERE oqd.test_id = lcts.test_id 
                                                                AND lcts.grade_id = oqd.grade_id 
                                                                AND lcts.learner_id = ?";

                                                        $stmtt = $conn->prepare($sqlt);
                                                        $stmtt->bind_param("s", $learnerId); // "i" = integer
                                                        $stmtt->execute();
                                                        $resultt = $stmtt->get_result();

                                                        if ($resultt->num_rows > 0) {
                                                            while ($rowt = $resultt->fetch_assoc()) {
                                                                $count++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $count; ?></td>
                                                                    <td><?php echo $rowt['title']; ?></td>
                                                                    <td><?php echo $rowt['score']; ?><b>%</b></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div><!-- /.chart-responsive -->

                                            <?php
                                            // Assuming the values are coming from a form or request
                                            $learnerId = $_SESSION['learnerId'];
                                            $teacherId = $_SESSION['idNumber'];

                                            $sqlsf = "SELECT * 
                                                    FROM subject_final_mark sfm  , term t
                                                    WHERE sfm.teacher_id = ? 
                                                    AND sfm.learner_id = ? 
                                                    AND sfm.term_id = t.id";

                                            $stmtsf = $conn->prepare($sqlsf);
                                            $stmtsf->bind_param("ss", $teacherId, $learnerId); // "ii" = two integers
                                            $stmtsf->execute();
                                            $resultsf = $stmtsf->get_result();

                                            if ($resultsf->num_rows > 0) {
                                                $rowsf = $resultsf->fetch_assoc();
                                                ?>

                                                <div class="col-md-4" style="margin-top: 20px;">
                                                    <p class="text-center">
                                                        <i class="fa fa-circle-plus" aria-hidden="true"></i>
                                                        <strong><?php echo $rowsf['term_name'];?><br>Final Mark is:><?php echo ($rowsf['quiz_mark'] !== null) ? $rowsf['quiz_mark'].'%' : 'Mark not available';  ?></strong>
                                                    </p>
                                                    <div class="progress-group" style="margin-bottom: 20px;">
                                                        <div class="mb-3">
                                                            <label for="formFileSm" class="form-label">Online Class Test Mark</label>
                                                        </div>
                                                    </div><!-- /.progress-group -->
                                                </div><!-- /.col -->

                                            <?php } ?>
                                            </div><!-- /.col -->

                                        </div><!-- /.row -->

                                        
                                    </div><!-- ./box-body -->

                                    <form action="../php/teacher_result_online_test_file.php" method="post">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="progress-group" style="margin-bottom: 20px;">
                                                        <div class="mb-5">
                                                            <input type="number" name="mark" class="form-control" placeholder="Enter the final mark for the online class test" required="" style="margin: -30px 0px 10px 15px; width: 90%;">
                                                            <button class="btn btn-info" type="submit" style="margin-left: 15px;"> Enter</button>
                                                        </div>
                                                    </div><!-- /.progress-group -->
                                                </div>
                                            </div><!-- /.row -->
                                        </div><!-- ./box-body -->
                                    </form>
                                    
                                </div><!-- /.box -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </section><!-- /.content -->
                </div><!-- /.content-wrapper -->
                <?php include '../php/footer.php'; ?>

                <?php include '../javascript/script.js'; ?>

            <script>
                function printPage() {
                    window.print();
                }
            </script>

            <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
            <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap.js"></script>
            <script>
                new DataTable('#example');
            </script>

            <style>

                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

                body {
                    font-family: "Montserrat", sans-serif;
                }

            </style>
    </body>
</html>

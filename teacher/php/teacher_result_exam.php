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
                        <li class="active">Exams Results</li>
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
             
                                                <?php
                                                include '../database/config.php';
                                                
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
                                                                <strong><?php echo $rowsf['term_name']; ?><br>Final Mark including exam is :><?php echo ($rowsf['final_mark'] !== null) ? $rowsf['final_mark'].'%' : 'Mark not available'; ?></strong>
                                                            </p>
                                                            <div class="progress-group" style="margin-bottom: 20px;">
                                                                <div class="mb-3">
                                                                    <label for="formFileSm" class="form-label" style="margin-left: 10px;">Exam Mark</label>
                                                                </div>
                                                            </div><!-- /.progress-group -->
                                                        </div><!-- /.col -->

                                                <?php } ?>

                                            </div>
                                        </div><!-- /.col --><!-- /.chart-responsive -->
                                    </div><!-- /.col -->


                                    <form action="../php/teacher_result_exam_file.php" method="post">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="progress-group" style="margin-bottom: 20px;">
                                                        <div class="mb-5">
                                                            <input type="number" name="mark" class="form-control" placeholder="Enter the final mark for the assignments" required="" style="margin: -30px 0px 10px 15px; width: 90%;">
                                                            <button class="btn btn-info" type="submit" style="margin-left: 15px;"> Enter</button>
                                                        </div>
                                                    </div><!-- /.progress-group -->
                                                </div>
                                            </div><!-- /.row -->
                                        </div><!-- ./box-body -->
                                    </form>

                                </div><!-- /.row -->
                            </div><!-- ./box-body -->
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

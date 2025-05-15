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
                        <li class="active">Results</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><i class="fa fa-book-open" aria-hidden="true"></i> Results</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="chart">
                                                <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Learner ID</th>
                                                            <th>Quiz</th>
                                                            <th>Class Test</th>
                                                            <th>Assignments</th>
                                                            <th>Final Marks</th>
                                                            <th>Term</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        include '../database/config.php';

                                                        // Assuming the values are coming from a form or request
                                                        $learnerId = $_SESSION['learnerId'];
                                                        $teacherId = $_SESSION['idNumber'];

                                                        $sql = "SELECT * 
                                                                FROM subject_final_mark sfm  , term t
                                                                WHERE sfm.teacher_id = ? 
                                                                AND sfm.learner_id = ? 
                                                                AND sfm.term_id = t.id";

                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->bind_param("ss", $teacherId, $learnerId); // "ii" = two integers
                                                        $stmt->execute();
                                                        $result = $stmt->get_result();

                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $row['learner_id']; ?></td>
                                                                    <td><?php echo ($row['quiz_mark'] !== null) ? $row['quiz_mark'] : 'Marks not updated'; ?></td>
                                                                    <td><?php echo ($row['class_mark'] !== null) ? $row['class_mark'] : 'Marks not updated'; ?></td>
                                                                    <td><?php echo ($row['assignment_mark'] !== null) ? $row['assignment_mark'] : 'Marks not updated'; ?></td>
                                                                    <td><?php echo ($row['final_mark'] !== null) ? $row['final_mark'] : 'Marks not updated'; ?></td>
                                                                    <td><?php echo $row['term_name']; ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div><!-- /.chart-responsive -->
                                        </div><!-- /.col -->
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

            
            <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
            <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap.js"></script>
            <script>
                new DataTable('#example');
            </script>
    </body>
</html>

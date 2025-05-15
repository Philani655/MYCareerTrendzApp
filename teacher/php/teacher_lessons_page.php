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
                        School Year:<?php
                        $currentYear = date("Y");
                        $nextYear = $currentYear + 1;
                        $yearRange = $currentYear . '-' . $nextYear;
                        ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../php/teacher_dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Lessons</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../icons/book-1.png" width="25"> Lessons</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="chart">
                                                <div class="chart no-print">
                                                    <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>TOPICS</th>
                                                                <th>LESSON ACTION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            include '../database/config.php';
                                                            $subjectcode = $_SESSION['subjectcode'];
                                                            $subjectname = $_SESSION['subjectname'];
                                                            $grade_id = $_SESSION['grade_id'];

                                                            $sql = "SELECT 
                                                                t.id AS id, 
                                                                t.teacher_id AS teacher_id, 
                                                                t.content AS content, 
                                                                t.date_time AS date_time 
                                                            FROM topics t, subjects su 
                                                            WHERE su.id = t.subject_id 
                                                            AND su.grade_id = t.grade_id 
                                                            AND t.grade_id = ? 
                                                            AND su.subjectcode = ? 
                                                            AND su.subjectname = ? ";

                                                            $stmt = $conn->prepare($sql);
                                                            $stmt->bind_param("iss", $grade_id, $subjectcode, $subjectname);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();

                                                            $count = 0;
                                                            // Fetch and display data
                                                            if ($result->num_rows > 0) {
                                                                while ($row = $result->fetch_assoc()) {
                                                                    $count++;
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $count; ?></td>
                                                                        <td><?php echo $row['content']; ?></td>
                                                                        <td>
                                                                            <a href="../php/teacher_lessons.php?id=<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-primary"><img src="../icons/add-1.png" alt="add" width="20"> Lesson</a>
                                                                            <a href="#delete<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><img src="../icons/bin.png" alt="add" width="20"> Delete Topic</a>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Modal -->
                                                                <div class="modal fade" id="delete<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                                <h4 class="modal-title">Confirm Delete</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Are you sure that you want to delete <b><?php echo $row['content']; ?> </b> topic and it lessons?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <form method="POST" action="../php/teacher_lessons_delete_file.php">
                                                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?><tr>
                                                                <td>No Record is found!</td>
                                                            </tr>
                                                        <?php }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
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
            <script src="../ckeditor/ckeditor.js"></script>

            <style>

                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

                body {
                    font-family: "Montserrat", sans-serif;
                }

            </style>
    </body>
</html>
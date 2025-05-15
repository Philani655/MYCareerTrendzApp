<html>
    <?php
    include './head.php';

    $id = $_GET['id'];
    ?>
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
                                    <h3 class="box-title"><i class="fa fa-book-open-reader" aria-hidden="true"></i> Lessons</h3>
                                    <div class="box-tools pull-right">
                                        <a href="./teacher_lessons_page.php" style="text-decoration: none;"><i class="fa-solid fa-arrow-left"></i> <b>Back</b></a>
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <a href="../php/teacher_lessons_content.php?id=<?php echo $id; ?>" data-toggle="modal" class="btn btn-primary" style="margin-left: 30px;"><img src="../icons/add-1.png" alt="add" width="25"> New Lesson</a>
                                                <a href="#" class="btn btn-success pull-right" onclick="window.print()" style="margin-right: 50px;">
                                                    <span class="glyphicon glyphicon-print"></span> Print
                                                </a>   
                                            </div>

                                            <p></p>

                                            <table id="myTable" class="table table-striped table-bordered" style="max-width: 100%;">
                                                <thead>
                                                <th>No.</th>
                                                <th>Lesson Content</th>
                                                <th>ACTION</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // SQL Query to Fetch All Data
                                                    // Prepare statement
                                                    $sqlLesson = "SELECT * FROM lesson_content WHERE topic_id = ?";
                                                    $stmtLesson = $conn->prepare($sqlLesson);
                                                    $stmtLesson->bind_param("i", $id); // "s" = string type
                                                    // Execute statement
                                                    $stmtLesson->execute();
                                                    $resultLesson = $stmtLesson->get_result();

                                                    $count = 0;

                                                    // Check if there are rows returned
                                                    if ($resultLesson->num_rows > 0) {
                                                        // Output data for each row
                                                        while ($rowLesson = $resultLesson->fetch_assoc()) {
                                                            $count++;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $count; ?></td>
                                                                <td><?php echo $rowLesson['content']; ?></td>
                                                                <td>
                                                                    <a href="../php/teacher_lesson_show.php?topic_id=<?php echo $id; ?>&lesson_content_id=<?php echo $rowLesson['id']; ?>&lesson_content=<?php echo $rowLesson['content']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><img src="../icons/add-1.png" alt="add" width="25"> Note OR Video</a>
                                                                </td>
                                                            </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                        <tr>
                                                            <td>No record found!</td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
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
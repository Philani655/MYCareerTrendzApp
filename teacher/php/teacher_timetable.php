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
                        <li class="active">Time Table</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../icons/schedule-1.png" width="25"> Time Table</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Display announcements -->
                                            <div class="container-fluid">
                                                <?php
                                                include '../database/config.php';

                                                $id = $_SESSION['grade_id'];

                                                // Prepare and execute the SELECT query
                                                $sqlt = "SELECT * FROM `timetable` WHERE `grade_id` = ?";
                                                $stmtt = $conn->prepare($sqlt);
                                                $stmtt->bind_param("i", $id);  // Bind the ID as an integer

                                                $stmtt->execute();
                                                $resultt = $stmtt->get_result();  // Get the result

                                                if ($resultt->num_rows > 0) {
                                                    // Fetch the data and display it in a table
                                                    $rowt = $resultt->fetch_assoc();
                                                    ?><p><?php echo $rowt['content']; ?></p><?php
                                                } else {
                                                    ?><span>No timetable created!</span> <?php
                                                }
                                                $stmtt->close();
                                                ?>
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

            <?php include '../javascript/script.js'; ?>

            <style>

                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

                body {
                    font-family: "Montserrat", sans-serif;
                }

            </style>
    </body>
    <script src="../ckeditor/ckeditor.js"></script>
</html>

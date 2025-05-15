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
                        <li><a href="../php/dashboard.php"><i class="fa fa-house"></i> Home</a></li>
                        <li class="active">Subject overview</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../icons/overview-1.png" width="25"> Subject Overview</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="chart">
                                                <!-- Sales Chart Canvas -->
                                                <div class="container-fluid">
                                                    <?php
                                                    $sql = "SELECT * FROM subject_overview";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {

                                                        while ($row = $result->fetch_assoc()) {
                                                            ?>
                                                            <p><?php echo $row['message']; ?></p>
                                                        <?php }
                                                    } else {
                                                        ?><p>There is no subject overview.</p><?php } ?>
                                                </div>
                                            </div><!-- /.chart-responsive -->
                                        </div><!-- /.col -->
                                        <div class="col-md-4">
                                            <p class="text-center">
                                                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm" style="margin-left: 50px;"><img src="../icons/add-1.png" alt="add" width="20"> Add subject overview</a>
                                                <a href="../php/subject_overview_delete_file.php" data-toggle="modal" class="btn btn-danger btn-sm" style="margin-left: 10px;"><img src="../icons/bin.png" alt="add" width="20"> Delete</a></a>
                                            </p>
                                            <!-- /.progress-group -->
                                            <?php include './subject_overview_modal.php'; ?>
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
</html>

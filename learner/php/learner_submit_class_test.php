<?php
$test_id = $_GET['test_id'];
$class_test_name = $_GET['ctn'];
$filename = $_GET['filename'];
?>
<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-purple sidebar-mini">
        <?php
        $_SESSION['class_test_name'] = $class_test_name;
        $_SESSION['test_id'] = $test_id;
        ?>
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
                        <li class="active">Class Test</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><i class="fa fa-circle-plus" aria-hidden="true"></i> <b>Submit Class test</b> </h3>

                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="chart">
                                            
                                                <form action="../php/learner_submit_class_test_file.php" method="post" enctype="multipart/form-data" style="width: 80%; margin: 20px 0 15px 15px;">
                                                    <div class="progress-group" style="margin-bottom: 20px;">
                                                        <div class="mb-3">
                                                            <label for="formFileSm" class="form-label">File</label>
                                                            <input class="form-control" type="file" id="document" name="document" accept=".pdf, .doc, .docx" required>
                                                        </div>
                                                    </div><!-- /.progress-group -->

                                                    <div class="form-floating" style="margin-top: 20px;">
                                                        <textarea class="form-control" name="description" placeholder="Description" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea"></label>
                                                    </div>

                                                    <div class="progress-group" style="margin-top: 20px;">
                                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-upload" aria-hidden="true"></i>  Upload</button>
                                                    </div><!-- /.progress-group -->
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



            <!-- Include jQuery (CDN) -->
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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

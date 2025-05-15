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
                        School Year:<?php
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
                                    <h3 class="box-title"><img src="../icons/testing-1.png" alt="test" width="25"> Write A Class Test</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="chart">
                                                    <!-- Display announcements -->
                                                    <div class="col-md-4">
                                                        <p class="text-center">
                                                            <i class="fa fa-circle-plus" aria-hidden="true"></i>
                                                            <strong>Write a Test</strong>
                                                        </p>
                                                        <div class="progress-group" style="margin-bottom: 20px;">
                                                            <div class="mb-3">
                                                                <label for="formFileSm" class="form-label">Online Class Test</label>
                                                                <form action="../php/learner_online_class_test.php" method="post">
                                                                    <button class="btn btn-info form-control" type="submit"><i class="fa-solid fa-pen"></i> Online Class Test</button>
                                                                </form>
                                                            </div>
                                                        </div><!-- /.progress-group -->

                                                        <div class="progress-group" style="margin-bottom: 20px;">
                                                            <div class="mb-3">
                                                                <label for="formFileSm" class="form-label">Multiple Choice Test</label>
                                                                <form action="../php/learner_online_quiz.php" method="post">
                                                                    <button class="btn btn-info form-control" type="submit"><i class="fa-solid fa-pen"></i> Multiple Choose Class Test</button>
                                                                </form>
                                                            </div>
                                                        </div><!-- /.progress-group -->
                                                    </div><!-- /.col -->

                                                </div><!-- /.chart-responsive -->
                                            </div><!-- /.col -->
                                        </div><!-- /.row -->
                                    </div>
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

                @media only screen and (max-width: 500px) {
                    table {
                        font-size: 12px;
                    }

                    .btn{
                        margin-bottom: 5px;
                    }
                }

            </style>

    </body>
</html>

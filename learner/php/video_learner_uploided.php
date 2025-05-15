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
                    <li class="active">Video</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title"> <?php echo $_GET['video_name'];?> </h3>
                                <div class="box-tools pull-right">
                                    <a href="../php/lessons.php" style="text-decoration: none;"><i class="fa-solid fa-arrow-left"></i> <b>Back</b></a>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="chart">
                                                <!-- Video -->
                                            <video width="100%" controls style="border-radius: 10px;">
                                                <source src="<?php echo $_GET['video_path'];?>" type="video/mp4">
                                                <source src="mov_bbb.ogg" type="video/ogg">
                                            </video>

                                        </div><!-- /.chart-responsive --><!-- /.chart-responsive -->
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

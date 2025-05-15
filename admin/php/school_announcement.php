<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">
            <?php include '../php/header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/aside_nav.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <img src="../icons/announcement-1.png" width="28">
                        <b>SCHOOL ANNOUNCEMENT</b>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">SCHOOL ANNOUNCEMENT</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <form action="../php/school_announcement_file.php" method="post">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-13">
                                                <div class="chart">
                                                    <!-- Display announcements -->
                                                    <div class="container-fluid">
                                                        <textarea name="content" class="ckeditor"></textarea>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary" style="margin: 15px 0 0 30px;">Send</button>
                                                <!-- /.chart-responsive -->
                                            </div><!-- /.col -->
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
            <script src="../ckeditor/ckeditor.js"></script>

            <style>

                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

                body {
                    font-family: "Montserrat", sans-serif;
                }

            </style>
    </body>
</html>

<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <?php include '../php/teacher_header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/assignment_aside_nav.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        School Year: <?php
                        $currentYear = date('Y');
                        $nextYear = $currentYear + 1;
                        $yearRange = $currentYear . '-' . $nextYear;
                        ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../php/dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Assignment</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Assignment</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <div class="btn-group">
                                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p class="text-center">
                                                <i class="fa fa-bars" aria-hidden="true"></i>
                                                <strong>Assignment</strong>
                                            </p>

                                            <div class="chart">
                                                <table class="table caption-top">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">DATE UPLOAD</th>
                                                            <th scope="col">FILE NAME</th>
                                                            <th scope="col">DESCRIPTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                        </tr>

                                                        <tr>
                                                        </tr>

                                                        <tr>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div><!-- /.chart-responsive -->

                                        </div><!-- /.col -->
                                        <div class="col-md-4">
                                            <p class="text-center">
                                                <i class="fa fa-circle-plus" aria-hidden="true"></i>
                                                <strong>Add Assignment</strong>
                                            </p>
                                            <div class="progress-group" style="margin-bottom: 20px;">
                                                <div class="mb-3">
                                                    <label for="formFileSm" class="form-label">File</label>
                                                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                                                </div>
                                            </div><!-- /.progress-group -->

                                            <div class="progress-group" style="margin-top: 20px;">
                                                <input type="text" class="form-control" placeholder="File name">
                                            </div><!-- /.progress-group -->

                                            <div class="form-floating" style="margin-top: 20px;">
                                                <textarea class="form-control" placeholder="Description" id="floatingTextarea"></textarea>
                                                <label for="floatingTextarea"></label>
                                            </div>

                                            <div class="progress-group" style="margin-top: 20px;">
                                                <button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-upload" aria-hidden="true"></i>  Upload</button>
                                            </div><!-- /.progress-group -->
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
    </body>
</html>

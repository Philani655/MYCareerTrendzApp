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
                        <li><a href="../php/dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Class Test</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../icons/class-test-1.png" width="25"> Class Test</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>

                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-8">

                                                <div class="chart">
                                                    <p class="text-center">
                                                        <i class="fa fa-circle-plus" aria-hidden="true"></i>
                                                        <strong>Add Class Test</strong>
                                                    </p>

                                                    <form  action="../php/teacher_class_test_file.php" method="post" enctype="multipart/form-data">
                                                        <div class="progress-group" style="margin-bottom: 20px;">
                                                            <div class="mb-3">
                                                                <label for="formFileSm" class="form-label">File</label>
                                                                <input class="form-control form-control-sm" id="formFileSm" name="document" type="file" accept=".pdf, .doc, .docx" required>
                                                            </div>
                                                        </div><!-- /.progress-group -->

                                                        <div class="progress-group" style="margin-top: 20px;">
                                                            <input type="text" class="form-control" placeholder="File name" name="classTestName">
                                                        </div><!-- /.progress-group -->

                                                        <div class="form-floating" style="margin-top: 20px;">
                                                            <textarea class="form-control" placeholder="Description" id="floatingTextarea" name="description"></textarea>
                                                            <label for="floatingTextarea"></label>
                                                        </div>

                                                        <div class="progress-group" style="margin-top: 20px;">
                                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-upload" aria-hidden="true"></i>  Upload</button>
                                                        </div>
                                                    </form>

                                                    <hr class="border border-danger border-1 opacity-50">

                                                    <h5 class="text-center"><i class="fa-solid fa-pen"></i> <strong>Create Online Class Test</strong></h5>
                                                    <div class="dropdown text-center" style="margin-top: 20px;">
                                                        <button class="btn btn-success dropdown-toggle" type="button" id="testDropdown" data-bs-toggle="dropdown" aria-expanded="true">
                                                            <img src="../icons/testing.png" alt="test" width="18"> Online Test
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="testDropdown">
                                                            <li><a class="dropdown-item" href="../php/teacher_multiple_choose_class_test_details.php">Multiple Choose</a></li>
                                                            <li><a class="dropdown-item" href="../php/teacher_trueORfalse_class_test_details.php">True Or False Statements</a></li>
                                                        </ul>
                                                    </div>  

                                                    <hr class="border border-danger border-1 opacity-50">

                                                    <div>
                                                        <p class="text-center">
                                                            <i class="fa fa-eye"></i>
                                                            <strong>View Submitted Class Tests</strong>
                                                        </p>
                                                        
                                                        <div class="progress-group text-center" style="margin-top: 20px;">
                                                            <a href="./view_submitted_class_test.php" class="btn btn-primary btn-sm"><img src="../icons/research.png" alt="view" width="18">  View Submitted</a>
                                                        </div><!-- /.progress-group -->
                                                    </div>

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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

            <?php include '../javascript/script.js'; ?>

            <style>

                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

                body {
                    font-family: "Montserrat", sans-serif;
                }

            </style>
    </body>
</html>

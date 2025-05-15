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
                                    <h3 class="box-title"><img src="../icons/testing-1.png" alt="test" width="25"> Multiple Choose Test</h3>
                                    <div class="box-tools pull-right">
                                        <a href="teacher_class_test.php" style="text-decoration: none;"><i class="fa-solid fa-arrow-left"></i> <b>Back</b></a>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="scrollable-form"> <!-- Scrollable area -->
                                                <form action="../php/teacher_multiple_choose_class_test_details_file.php" method="POST">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Quiz Title</label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Quiz title" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="total" class="form-label">Total Questions</label>
                                                        <input type="number" class="form-control" id="total" name="total" placeholder="Enter total number of questions" min="1" required>
                                                    </div>

                                                   
                                                    <br>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary w-100">Create Test</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.progress-group -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
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

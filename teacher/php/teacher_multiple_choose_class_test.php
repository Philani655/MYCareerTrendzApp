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
                                    <h3 class="box-title"><img src="../icons/testing.png" alt="test" width="18"> Multiple Choose Test</h3>
                                    <div class="box-tools pull-right">
                                        <a href="teacher_class_test.php" style="color: #333; text-decoration: none;"><strong><i class="fa-solid fa-arrow-left"></i> Back</strong></a>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- Scrollable Form -->
                                            <div class="scrollable-form">
                                                <form action="../php/teacher_multiple_choose_class_test_file.php" method="POST">
                                                    <fieldset>
                                                        <?php
                                                        $total = $_SESSION['total'];
                                                        for ($i = 1; $i <= $total; $i++) {
                                                            echo '
                                                                <b>Question ' . $i . ':</b>
                                                                <div class="mb-2">
                                                                    <textarea rows="2" name="qns' . $i . '" class="form-control" placeholder="Enter question ' . $i . '" required></textarea>
                                                                </div>

                                                                <input name="' . $i . '1" class="form-control mb-2" placeholder="Option A" type="text" required>
                                                                <input name="' . $i . '2" class="form-control mb-2" placeholder="Option B" type="text" required>
                                                                <input name="' . $i . '3" class="form-control mb-2" placeholder="Option C" type="text" required>
                                                                <input name="' . $i . '4" class="form-control mb-2" placeholder="Option D" type="text" required>

                                                                <label class="fw-bold">Correct Answer:</label>
                                                                <select name="ans' . $i . '" class="form-control mb-3" required>
                                                                    <option value="" disabled selected>Select answer</option>
                                                                    <option value="a">Option A</option>
                                                                    <option value="b">Option B</option>
                                                                    <option value="c">Option C</option>
                                                                    <option value="d">Option D</option>
                                                                </select>
                                                                <hr>';
                                                        }
                                                        ?>

                                                        <!-- Submit Button -->
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary w-100">Submit Quiz</button>
                                                        </div>
                                                    </fieldset>
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
    </body>
</html>

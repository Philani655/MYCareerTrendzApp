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
                                    <h3 class="box-title"><b>Submited Class test</b><br><br><?php echo $filename ?> </h3>

                                    <div class="box-tools pull-right">
                                        <a href="learner_class_test.php" style="text-decoration: none;"><strong><i class="fa-solid fa-arrow-left"></i> Back</strong></a>
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="chart">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">FILE NAME</th>
                                                            <th scope="col">DESCRIPTION</th>
                                                            <th scope="col">ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        include '../database/config.php';
                                                        $sql = "SELECT * FROM `learner_class_test` WHERE `test_id` = ?";
                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->bind_param("i", $test_id); // "i" = integer type
                                                        // Execute the statement
                                                        $stmt->execute();

                                                        // Get result
                                                        $result = $stmt->get_result();

                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $row['file_name']; ?></td>
                                                                    <td><?php echo $row['description']; ?></td>
                                                                    <td>
                                                                        <a href="#delete<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></a>
                                                                    </td>
                                                                </tr>
                                                                <!-- Modal -->
                                                            <div class="modal fade" id="delete<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <!-- Modal Header -->
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            <h4 class="modal-title">Confirm Delete</h4>
                                                                        </div>

                                                                        <!-- Modal Body -->
                                                                        <div class="modal-body">
                                                                            Are you sure you want to delete <b><?php echo $row['file_name']; ?></b>?
                                                                        </div>

                                                                        <!-- Modal Footer -->
                                                                        <div class="modal-footer">
                                                                            <form method="POST" action="../php/learner_submit_test_delete_file.php">
                                                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td>No submission!;</td>
                                                        </tr><?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div><!-- /.chart-responsive -->

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

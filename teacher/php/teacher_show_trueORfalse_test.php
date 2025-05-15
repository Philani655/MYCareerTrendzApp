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
                        <li><a href="../php/teacher_dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Multiple Choose Test</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Multiple Choose Test</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="chart">
                                                <!-- Sales Chart Canvas -->
                                                <div class="container-fluid">
                                                    <?php
                                                    include '../database/config.php';  // Include the database connection
                                                    // Query to fetch quiz data
                                                    $result = mysqli_query($conn, "SELECT * FROM `online_quiz_details`") or die('Error');

                                                    // Displaying data in a table
                                                    echo '
                                                  <div class="row">
                                                        <a href="#clear" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Clear</a>
                                                        <a href="#" onclick="window.print()"class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> PDF</a>
                                                    </div>      
                                                    <div class="panel">
                                                            <table class="table table-striped title1">
                                                            <tr><td style="vertical-align:middle"><b>No.</b></td>
                                                                <td style="vertical-align:middle"><b>Topic</b></td>
                                                                <td style="vertical-align:middle"><b>Total question</b></td>
                                                            </tr>';

                                                    $c = 1;
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        // Retrieve data from the row
                                                        $title = $row['title'];
                                                        $total = $row['total'];
                                                        $eid = $row['id'];

                                                        // Display the quiz data
                                                        echo '<tr>
                                                                <td style="vertical-align:middle">' . $c++ . '</td>
                                                                <td style="vertical-align:middle">' . $title . '</td>
                                                                <td style="vertical-align:middle">' . $total . '</td>
                                                                <td style="vertical-align:middle">
                                                              
                                                            </tr>';
                                                    }

                                                    echo '</table></div>';
                                                    ?>
                                                </div>
                                            </div><!-- /.chart-responsive -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div><!-- ./box-body -->
                            </div><!-- /.box -->

                            <!-- Modal -->
                            <div class="modal fade" id="clear" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title">Clear True or False Test</h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure that you want to clear <b>True or False Test</b>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="../php/clear_trueORfalse_test_file.php">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Clean</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php include '../php/footer.php'; ?>


            <?php include '../javascript/script.js'; ?>
    </body>
</html>


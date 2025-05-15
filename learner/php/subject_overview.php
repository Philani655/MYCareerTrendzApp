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
                        <li><a href="../php/learner_dashboard.php"><i class="fa fa-house"></i> Home</a></li>
                        <li class="active">Subject Overview</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../icons/overview-1.png" alt="megaphone" width="25"/> Subject Overview</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="chart">
                                                <div class="container-fluid">
                                                    <?php
                                                    include '../database/config.php';

                                                    $subjectname = $_SESSION['subjectname'];
                                                    $subjectcode = $_SESSION['subjectcode'];
                                                    $grade_id = $_SESSION['grade_id'];
                                                    // Your query with placeholders
                                                    $sql = "SELECT 
                                                            so.message AS message,
                                                            so.id AS id 
                                                        FROM subject_overview so 
                                                        JOIN subjects su ON su.grade_id = so.grade_id AND so.subject_id = su.id
                                                        WHERE so.grade_id = ? 
                                                        AND su.subjectcode = ? 
                                                        AND su.subjectname = ?";

                                                    // Prepare the statement
                                                    $stmt = $conn->prepare($sql);

                                                    // Bind the parameters
                                                    $stmt->bind_param("iss", $grade_id, $subjectcode, $subjectname);

                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            ?> 
                                                                <p><?php echo $row['message']; ?></p>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                            <p>There is no subject overiew</p>
                                                    <?php } ?>
                                                </div><!-- /.container-fluid -->
                                            </div><!-- /.chart -->
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

                .chart {
                    height: 70%;
                    overflow: scroll;
                }

                .chart::-webkit-scrollbar {
                    display: none;
                }

                .chart {
                    -ms-overflow-style: none;  /* IE and Edge */
                    scrollbar-width: none;  /* Firefox */
                }

            </style>

    </body>
</html>

<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <?php include '../php/parent_header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/page_nav.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        School Year:  <?php
                        $currentYear = date("Y");
                        $nextYear = $currentYear + 1;
                        $yearRange = $currentYear . '-' . $nextYear;
                        ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../php/learner_dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Exams</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../../image/exam.png" alt="exams" width="25"> Exams Scopes</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="chart">
                                                <?php
                                                include '../database/config.php';

                                                $subjectname = $_SESSION['subjectname'];
                                                $subjectcode = $_SESSION['subjectcode'];
                                                $grade_id = $_SESSION['grade_id'];

                                                if (!isset($_SESSION['subjectname'])) {
                                                    echo "<script>window.location.href='../php/my_classes.php';</scrpt>";
                                                    exit();
                                                }

                                                // Prepare the SQL query using prepared statements
                                                $sql = "SELECT exam 
                                                            FROM exam_scope es 
                                                            JOIN subjects s ON s.id = es.subject_id
                                                            WHERE s.subjectname = ? 
                                                            AND s.subjectcode = ? 
                                                            AND es.grade_id = ? ";

                                                $stmt = $conn->prepare($sql);
                                                $stmt->bind_param("sss", $subjectname, $subjectcode, $grade_id);

                                                // Execute the query
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                        <!-- Display announcements -->
                                                        <div class="alert alert" role="alert" style="border-radius: 1.125rem 1.125rem 0 1.125rem; border: 1px solid black;">
                                                            <p><img src="../icons/conversation.png" width="25"> <?php echo $row['exam']; ?></p>
                                                        </div><?php
                                                        
                                                    }
                                                } else {
                                                    ?>   
                                                    <div class="container-fluid">
                                                        <p>There are no exam to display.</p>
                                                    </div><?php
                                                }
                                                $stmt->close();
                                                ?>
                                            </div><!-- /.chart-responsive -->
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

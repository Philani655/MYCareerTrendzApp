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
                        <li class="active">Topics</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <?php
                                    include '../database/config.php';
                                    $grade_id = $_SESSION['grade_id'];

                                    $sqlGrade = "SELECT * FROM grade WHERE id=?";
                                    $stmt = $conn->prepare($sqlGrade);
                                    $stmt->bind_param("i", $grade_id);

                                    // Execute the statement
                                    $stmt->execute();

                                    // Get the result
                                    $result = $stmt->get_result();
                                    $row = $result->fetch_assoc();
                                    ?>
                                    <h3 class="box-title"><img src="../../image/teacherrs.png" alt="topics" width="25"> <?php echo $_SESSION['subjectname'] . ' - ' . $row['grade_name']; ?> </h3>

                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="chart">
                                                <?php
                                                $subjectname = $_SESSION['subjectname'];
                                                $subjectcode = $_SESSION['subjectcode'];


                                                if (!isset($_SESSION['subjectname'])) {
                                                    echo "<script>window.location.href='../php/my_classes.php';</scrpt>";
                                                    exit();
                                                }

                                                // Prepare the SQL query using prepared statements
                                                $sql = "SELECT content 
                                                            FROM topics t 
                                                            JOIN subjects s ON s.id = t.subject_id
                                                            WHERE s.subjectname = ? 
                                                            AND s.subjectcode = ? 
                                                            AND t.grade_id = ? ";

                                                $stmt = $conn->prepare($sql);
                                                $stmt->bind_param("sss", $subjectname, $subjectcode, $grade_id);

                                                // Execute the query
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                        <!-- Display announcements -->
                                                        <div class="container-fluid">
                                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                <div class="panel panel-primary">
                                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                                        <h4 class="panel-title">
                                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration: none; color: #fff; font-weight: bold; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                                                                <?php echo $row['content']; ?>
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div><?php
                                                    }
                                                } else {
                                                    ?>   
                                                    <div class="container-fluid">
                                                        <p>There are no topics to display.</p>
                                                    </div><?php
                                                }
                                                $stmt->close();
                                                ?>
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

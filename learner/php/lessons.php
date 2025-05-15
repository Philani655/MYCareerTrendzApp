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
                        $currentYear = date("Y");
                        $nextYear = $currentYear + 1;
                        $yearRange = $currentYear . '-' . $nextYear;
                        ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../php/learner_dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Lessons</li>
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
                                    <h3 class="box-title"><img src="../../image/learned.png" alt="learned" width="25"> <?php echo $_SESSION['subjectname'] .' - '.$row['grade_name'];?> Content</h3>
                                   
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="chart">
                                                <?php include '../php/lesson_content.php'; ?>
                                            </div><!-- /.chart-responsive -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div>
                            </div>
                        </div><!-- /.box -->
                    </div>

                </section><!-- /.content -->
            </div><!-- /. content-wrapper-->
            <?php include '../php/footer.php'; ?>
        </div><!-- /.row -->
        <?php include '../javascript/script.js'; ?>

        <style>

            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

            body {
                font-family: "Montserrat", sans-serif;
            }

        </style>
        
    </body>
</html>

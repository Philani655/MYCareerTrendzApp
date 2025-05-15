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
                        School Year:<?php
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
                                    <h3 class="box-title"><img src="../../image/online-test.png" alt="test" width="25"> Class Test</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="chart">
                                                <!-- Display announcements -->
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">FILE NAME</th>
                                                            <th scope="col">DESCRIPTION</th>
                                                            <th scope="col">ACTION</th>
                                                        </tr>
                                                    </thead>
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
                                                    $sql = "SELECT 
                                                            tct.id AS id,
                                                            tct.file_name AS file_name , 
                                                            tct.file_path AS file_path , 
                                                            tct.class_test_name AS class_test_name , 
                                                            tct.description AS description , 
                                                            tct.date_time AS date_time
                                                            FROM teacher_class_test tct 
                                                            JOIN subjects s ON s.id = tct.subject_id
                                                            WHERE s.subjectname = ? 
                                                            AND s.subjectcode = ? 
                                                            AND tct.grade_id = ? ";

                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bind_param("sss", $subjectname, $subjectcode, $grade_id);

                                                    // Execute the query
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo $row['file_name']; ?></td>
                                                                    <td><?php echo $row['description']; ?></td>
                                                                    <td>
                                                                        <a href="../php/view_learner_class_test.php?file_name=<?php echo $row['file_name'];?>&file_path=<?php echo $row['file_path'];?>" ><button type="button" class="btn btn-info"><i class="fa-solid fa-eye"></i></button></i></a>
                                                                        <a href="../php/learner_submit_class_test.php?test_id=<?php echo $row['id']; ?>&ctn=<?php echo $row['class_test_name']; ?>&filename=<?php echo $row['file_name']; ?>"><button type="button" class="btn btn-info"><i class="fa-solid fa-upload"></i></button></a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </table>

                                                <div class="col-md-4" style="margin-top: 10px;">
                                                    <p class="text-center">
                                                        <i class="fa fa-pen"></i>
                                                        <strong>Write a Test</strong>
                                                    </p>
                                                    
                                                    <div class="progress-group text-center" style="margin-top: 20px;">
                                                        <a href="./write_test.php" class="btn btn-primary btn-sm"><img src="../icons/testing.png" alt="test" width="18"> Write an Online Test</a>
                                                    </div><!-- /.progress-group -->
                                                </div><!-- /.col -->

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

                @media only screen and (max-width: 500px) {
                    table {
                        font-size: 10px;
                    }

                    .btn{
                        margin-bottom: 5px;
                    }
                }

            </style>

    </body>
</html>

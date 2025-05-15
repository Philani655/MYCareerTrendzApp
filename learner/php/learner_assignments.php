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
                        <li class="active">Assignments</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../../image/open-book.png" alt="book" width="25"> Assignment</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="chart">
                                                <!-- Display announcements -->
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">FILE NAME</th>
                                                            <th scope="col">DESCRIPTION</th>
                                                            <th scope="col">DATE</th>
                                                            <th scope="col">ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
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
                                                            ta.id AS id ,
                                                            ta.assignment_name AS assignment_name , 
                                                            ta.description AS description ,
                                                            ta.date_time AS date_time , 
                                                            ta.file_path AS file_path
                                                            FROM teacher_assignment ta 
                                                            JOIN subjects s ON s.id = ta.subject_id
                                                            WHERE s.subjectname = ? 
                                                            AND s.subjectcode = ? 
                                                            AND ta.grade_id = ? ";

                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->bind_param("sss", $subjectname, $subjectcode, $grade_id);

                                                        // Execute the query
                                                        $stmt->execute();
                                                        $result = $stmt->get_result();
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $row['assignment_name']; ?></td>
                                                                    <td><?php echo $row['description']; ?></td>
                                                                    <td><?php echo $row['date_time']; ?></td>
                                                                    <td>
                                                                        <a href="../php/assignment_learner_uploaded.php?assignment_name=<?php echo $row['assignment_name']; ?>&file_path=<?php echo $row['file_path']; ?>"><button type="button" class="btn btn-info"><i class="fa-solid fa-eye"></i></button></a>
                                                                        <a href="../php/learner_submit_assignment.php?id=<?php echo $row['id']; ?>&assignment_name=<?php echo $row['assignment_name']; ?>"><button type="button" class="btn btn-info"><i class="fa-solid fa-upload"></i></button></a>
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                            }
                                                        } else {
                                                            ?><tr>
                                                                <td>No submisson</td>
                                                            </tr>
                                                            <?php
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

            <?php include '../php/footer.php'; ?>

            <?php include '../javascript/script.js'; ?>

            <style>

                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

                body {
                    font-family: "Montserrat", sans-serif;
                }

                @media only screen and (max-width: 500px) {
                    table {
                        font-size: 9px;
                    }

                    .btn{
                        margin-top: 5px;
                    }
                }

            </style>

    </body>
</html>

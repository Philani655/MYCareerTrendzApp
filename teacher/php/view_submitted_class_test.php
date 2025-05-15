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
                                    <h3 class="box-title"><img src="../icons/class-test-1.png" width="25"> Class Test</h3>
                                    <div class="box-tools pull-right">
                                        <a href="./teacher_class_test.php" style="text-decoration: none;"><i class="fa-solid fa-arrow-left"></i> <b>Back</b></a>
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>

                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-center">
                                                <i class="fa fa-bars" aria-hidden="true"></i>
                                                <strong>Class Test</strong>
                                            </p>

                                            <div class="chart">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">DATE UPLOAD</th>
                                                            <th scope="col">FILE NAME</th>
                                                            <th scope="col">DESCRIPTION</th>
                                                            <th scope="col">ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        include '../database/config.php';

                                                        $subject_code = $_SESSION['subjectcode'];
                                                        $subject_name = $_SESSION['subjectname'];
                                                        $teacher_id = $_SESSION['idNumber'];
                                                        // Prepare the statement
                                                        $sql = "SELECT 
                                                        lct.id AS id, 
                                                        lct.learner_id AS learner_id, 
                                                        lct.file_name AS file_name, 
                                                        lct.file_path AS file_path, 
                                                        lct.description AS description , 
                                                        lct.date_time as date_time
                                                        FROM 
                                                            learner_class_test lct, 
                                                            subjects su , teacher_class_test tct
                                                        WHERE 
                                                            lct.learner_id = su.learner_id 
                                                        AND 
                                                            lct.grade_id = tct.grade_id 
                                                        AND 
                                                            su.subjectcode = ? 
                                                        AND 
                                                            su.subjectname = ?
                                                        AND 
                                                            tct.teacher_id = ?
                                                        AND 
                                                            lct.test_id =tct.id
                                                            
                                                        GROUP BY lct.id ,lct.learner_id ,lct.file_name , lct.description   ";

                                                        // Prepare and bind
                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->bind_param("sss", $subject_code, $subject_name, $teacher_id); // "ss" = two string values
                                                        // Execute the statement
                                                        $stmt->execute();

                                                        // Get result
                                                        $result = $stmt->get_result();

                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $row['date_time']; ?></th>
                                                                    <td><?php echo $row['file_name']; ?></td>
                                                                    <td><?php echo $row['description']; ?></td>
                                                                    <td>
                                                                        <a href="store_id_file.php?id=<?php echo $row['id'] ?>&option=1" style="color: #333;"><button type="button" class="btn btn-primary"><i class="fa-solid fa-eye"></i></button></a>
                                                                        <a href="<?php echo $row['file_path'];?>" download="<?php echo $row['file_name'];?>"><button type="button" class="btn btn-success"><i class="fa-solid fa-download"></i></button></a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?><tr>
                                                                <td>No submission!</td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        // Close statement and connection
                                                        $stmt->close();
                                                        $conn->close();
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

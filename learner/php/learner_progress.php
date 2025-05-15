<html>
    <?php include './head.php'; ?>
     <link rel="stylesheet" href="../css/result_table_score.css">
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
                        <li class="active">Progress</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../../image/result(1).png" alt="result" width="25"> Progress</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <?php
                                            include '../database/config.php';
                                            
                                            $idNumber = $_SESSION['idNumber'];
                                            $subjectcode = $_SESSION['subjectcode'];
                                            $subjectname = $_SESSION['subjectname'];
                                            $grade_id = $_SESSION['grade_id'];
                                            
                                            // Fetch data from the database (Filter scores greater than 50)
                                            $sql = "SELECT lct.class_test_name AS class_test_name , 
                                                    lct.score AS score  
                                                    FROM learner_class_test lct , subjects su 
                                                    WHERE su.id = lct.subject_id 
                                                    AND 
                                                    su.grade_id = lct.grade_id 
                                                    AND
                                                    lct.learner_id = ? 
                                                    AND 
                                                    su.subjectcode = ? 
                                                    AND
                                                    su.subjectname = ? 
                                                    AND 
                                                    su.grade_id = ?
                                                    ";

                                            // Prepare and bind
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bind_param("sssi", $idNumber, $subjectcode, $subjectname , $grade_id); // "ss" = two string values
                                            // Execute the statement
                                            $stmt->execute();

                                            $result = $stmt->get_result();
                                            ?>
                                            <div class="" style="margin-bottom: 20px;">
                                                <h4 class="box-title"><img src="../icons/progress.png" width="28"> Class Tests Progress</h4>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Class Test</th>
                                                            <th>Score</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $count = 0;
                                                        if ($result->num_rows > 0): ?>
                                                            <?php while ($row = $result->fetch_assoc()): 
                                                                $count++?>
                                                                <tr class="<?php echo $row['score'] >= 50 ? 'pass' : 'fail'; ?>">
                                                                    <td data-label="No."><?php echo $count; ?></td>
                                                                    <td data-label="Class Test"><?php echo $row['class_test_name']; ?></td>
                                                                    <td data-label="Score"><?php echo ($row['score'] === null) ? '<b>Not Marked</b>' : $row['score']; ?></td>
                                                                    <td data-label="Status">
                                                                        <?php echo $row['score'] >= 50 ? '<b>Pass</b>' : '<b>Fail</b>'; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td colspan="5" style="text-align: center;">No records found</td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>

                                            </div><!-- /.chart-responsive -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                    
                                    <div class="row">
                                        <div class="col-md-8">

                                            <?php
                                            include '../database/config.php';
                                            
                                            $idNumber = $_SESSION['idNumber'];
                                            $subjectcode = $_SESSION['subjectcode'];
                                            $subjectname = $_SESSION['subjectname'];
                                            $grade_id = $_SESSION['grade_id'];
                                            
                                            // Fetch data from the database (Filter scores greater than 50)
                                            $sql = "SELECT la.assignment_name AS assignment_name , 
                                                    la.marks AS score  
                                                    FROM learner_assignment la , subjects su 
                                                    WHERE su.id = la.subject_id 
                                                    AND 
                                                    su.grade_id = la.grade_id 
                                                    AND
                                                    la.learner_id = ? 
                                                    AND 
                                                    su.subjectcode = ? 
                                                    AND
                                                    su.subjectname = ? 
                                                    AND 
                                                    su.grade_id = ?
                                                    ";

                                            // Prepare and bind
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bind_param("sssi", $idNumber, $subjectcode, $subjectname , $grade_id); // "ss" = two string values
                                            // Execute the statement
                                            $stmt->execute();

                                            $result = $stmt->get_result();
                                            ?>
                                           <div class="">
                                                <h4 class="box-title"><img src="../icons/progress.png" width="28"> Assignments Progress</h4>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Assignment</th>
                                                            <th>Score</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $count = 0;
                                                        if ($result->num_rows > 0): ?>
                                                            <?php while ($row = $result->fetch_assoc()): 
                                                                $count++?>
                                                                <tr class="<?php echo $row['score'] >= 50 ? 'pass' : 'fail'; ?>">
                                                                    <td data-label="No."><?php echo $count; ?></td>
                                                                    <td data-label="Assignments"><?php echo $row['assignment_name']; ?></td>
                                                                    <td data-label="Score"><?php echo ($row['score'] === null) ? '<b>Not Marked</b>' : $row['score']; ?></td>
                                                                    <td data-label="Status">
                                                                        <?php echo $row['score'] >= 50 ? '<b>Pass</b>' : '<b>Fail</b>'; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        <?php else: ?>
                                                            <tr>
                                                                <td colspan="5" style="text-align: center;">No records found</td>
                                                            </tr>
                                                        <?php endif; ?>
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

        </style>

    </body>
</html>

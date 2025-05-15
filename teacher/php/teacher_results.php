<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <?php include '../php/teacher_header.php';?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/page_nav.php';?>
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
                        <li class="active">Results</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../icons/report-1.png" width="25"> Result</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="chart">
                                               <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Learner ID</th>
                                                            <th>First Name</th>
                                                            <th>Second Name</th>
                                                            <th>Grade</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        include '../database/config.php';

                                                        // Assuming the values are coming from a form or request
                                                        $learner_id = $_SESSION['idNumber'];
                                                        $grade_id = $_SESSION['grade_id'];
                                                        $subjectcode = $_SESSION['subjectcode'];
                                                        $subjectname = $_SESSION['subjectname'];

                                                        $sql = "SELECT l.idno AS idno,
                                                                        l.name AS name,
                                                                        l.surname AS surname,
                                                                        g.grade_name AS grade_name
                                                                 FROM learner l
                                                                 JOIN grade g ON l.grade_id = g.id
                                                                 JOIN teacher t ON t.grade_id = g.id
                                                                 JOIN subjects su ON su.grade_id = g.id
                                                                 WHERE su.learner_id = ? 
                                                                 AND su.grade_id = ?
                                                                 AND su.subjectcode = ?
                                                                 AND su.subjectname = ?";

                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->bind_param("siss", $learner_id, $grade_id, $subjectcode, $subjectname);
                                                        $stmt->execute();
                                                        $result = $stmt->get_result();

                                                        $count = 0;
                                                        // Check if rows are found
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                $count++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $count; ?></td>
                                                                    <td><?php echo $row['idno']; ?></td>
                                                                    <td><?php echo $row['name']; ?></td>
                                                                    <td><?php echo $row['surname']; ?></td>
                                                                    <td><?php echo $row['grade_name']; ?></td>
                                                                    <td>
                                                                        <a href="#marks<?php echo $row['idno']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Marks</a>
                                                                    </td>
                                                                     <?php include '../php/teacher_result_modal.php'; ?>
                                                                </tr>
                                                                <?php
                                                            }
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

           <?php include '../php/footer.php';?>
               
           <?php include '../javascript/script.js';?>

           <style>

                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

                body {
                    font-family: "Montserrat", sans-serif;
                }

            </style>
    </body>
</html>

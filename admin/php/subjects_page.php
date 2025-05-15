<?php include '../database/config.php'; ?>
<!DOCTYPE html>
<html>
    <?php include '../php/head.php'; ?>
    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">
            <?php include '../php/header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/aside_nav.php'; ?>
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <img src="../icons/stack.png" width="28">
                        <b>SUBJECTS</b>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">SUBJECT IN SCHOOLS</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <a href="#" onclick="window.print()" class="btn btn-success pull-right" style="margin-right: 50px;"><span class="glyphicon glyphicon-print"></span> PDF</a>
                                            </div>

                                            <p></p>

                                            <table id="myTable" class="table table-striped table-bordered" style="max-width: 100%;">
                                                <thead>
                                                <th>No.</th>
                                                <th>Subjects Name</th>
                                                <th>Subjects Code</th>
                                                <th>Grades</th>
                                                <th>Schools</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Query to select all data from the 'school' table
                                                    $sql = "SELECT sb.subjectname as subjectname , sb.subjectcode as subjectcode , g.grade_name as grade_name , sc.school_name as school_name FROM subjects sb, school sc , grade g "
                                                            . "WHERE sb.learner_id = sc.learner_id "
                                                            . "AND sb.grade_id= g.id "
                                                            . "ORDER BY g.grade_name ASC ";

                                                    $result = $conn->query($sql);
                                                    $count = 0;

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $count++;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $count ?></td>
                                                                <td><?php echo $row['subjectname']; ?></td>
                                                                <td><?php echo $row['subjectcode']; ?></td>
                                                                <td><?php echo $row['grade_name']; ?></td>
                                                                <td><?php echo $row['school_name']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <?php include '../php/footer.php'; ?>
        </div>

        <?php include('../php/subject_add_modal.php') ?>

        <?php include '../javascript/script.js'; ?>
       
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap.js"></script>
        <script>
            new DataTable('#example');
        </script>
       
       <style>

            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

            body {
                font-family: "Montserrat", sans-serif;
            }

        </style>

    </body>
</html>
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
                        <img src="../icons/result-1.png" width="28">
                        <b>LEARNER PROGRESS</b>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">LEARNER PROGRESS</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <p></p>

                                            <table id="myTable" class="table table-striped table-bordered" style="max-width: 100%;">
                                            <thead>
                                                <th>No.</th>
                                                <th>Learner ID</th>
                                                <th>Name</th>
                                                <th>Surname</th>
                                                <th>Grade</th>
                                                <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT l.idno AS idno, 
                                                                    l.name AS name, 
                                                                    l.surname AS surname, 
                                                                    g.grade_name AS grade_name 
                                                            FROM learner l, grade g 
                                                            WHERE g.id = l.grade_id ";

                                                    $result = $conn->query($sql);
                                                    $count = 0;
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
                                                                    <a href="../php/learner_progress.php?idno=<?php echo $row['idno'];?>" class="btn btn-success btn-sm" data-toggle="modal" style="margin-right: 5px;"><span class="glyphicon glyphicon-eye-open"></span> View Report</a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                           
                                                        }
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
            <?php
                include '../php/school_add_modal.php'; 
                include '../php/footer.php'; 
            ?>
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
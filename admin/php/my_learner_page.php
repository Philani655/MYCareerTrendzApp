<?php
include '../database/config.php';
?>
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
                        <img src="../icons/teacher-1.png" width="28">
                        <b>TEACHERS</b>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">TEACHER LEARNERS</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <a href="#" class="btn btn-success pull-right" onclick="window.print()" style="margin-right: 50px;">
                                                    <span class="glyphicon glyphicon-print"></span> Print
                                                </a> 
                                            </div>

                                            <p></p>

                                            <table id="myTable" class="table table-striped table-bordered" style="max-width: 100%;">
                                              
                                                <thead>
                                                <th>No.</th>
                                                <th>ID Number</th>
                                                <th>Name</th>
                                                <th>Surname</th>
                                                <th>Contact No</th>
                                                <th>Grade</th>
                                                <th>ACTION</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // SQL Query to Fetch All Data
                                                    $sql =  "SELECT t.id AS id , 
                                                                t.idno AS idno,
                                                                t.name AS name , 
                                                                t.surname AS surname , 
                                                                t.email AS email , 
                                                                t.contactno AS contactno , 
                                                                g.grade_name AS grade_name ,
                                                                g.id AS grade_id
                                                            FROM teacher t , grade g
                                                            WHERE t.grade_id = g.id ";
                                                    
                                                    $result = $conn->query($sql);

                                                    $count = 0;

                                                    // Check if there are rows returned
                                                    if ($result->num_rows > 0) {
                                                        // Output data for each row
                                                        while ($row = $result->fetch_assoc()) {
                                                            $count++;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $count; ?></td>
                                                                <td><?php echo $row['idno']; ?></td>
                                                                <td><?php echo $row['name']; ?></td>
                                                                <td><?php echo $row['surname']; ?></td>
                                                                <td><?php echo $row['contactno']; ?></td>
                                                                <td><?php echo $row['grade_name']; ?></td>
                                                                <td>
                                                                    <a href="#status<?php echo $row['idno']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon"></span>View Learners</a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            include '../php/teacher_subjects_modal.php';
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
            include '../php/footer.php';
            ?>
        </div>

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
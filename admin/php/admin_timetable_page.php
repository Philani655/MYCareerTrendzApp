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
                        <img src="../icons/calendar-1.png" width="28">
                        <b>TIMETABLE</b>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">TIMETABLE</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <a href="#addnew" data-toggle="modal"  style="margin-left: 30px;" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New</a>
                                                <a href="#" onclick="window.print()" class="btn btn-success pull-right" style="margin-right: 50px;"><span class="glyphicon glyphicon-print"></span> PDF</a>  
                                            </div>

                                            <p></p>

                                            <table id="myTable" class="table table-striped table-bordered" style="max-width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Admin ID</th>
                                                        <th>Grade</th>
                                                        <th>Date & Time</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include '../database/config.php';

                                                    $userID = $_SESSION['userID'];

                                                    // Prepare the SQL statement
                                                    $sql = "SELECT 
                                                t.id AS id, 
                                                t.admin_id AS admin_id, 
                                                g.grade_name AS grade_name, 
                                                t.date_time AS date_time, 
                                                g.id AS grade_id 
                                            FROM 
                                                timetable t 
                                            INNER JOIN 
                                                grade g ON g.id = t.grade_id 
                                            WHERE 
                                                t.admin_id = ?";

                                                    $stmt = $conn->prepare($sql);

                                                    // Bind parameters (i = integer)
                                                    $stmt->bind_param("s", $userID);

                                                    // Execute the query
                                                    $stmt->execute();

                                                    // Get the result
                                                    $result = $stmt->get_result();

                                                    // Check if data exists
                                                    $count = 0;
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $count++;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $count; ?></td>
                                                                <td><?php echo $row['admin_id']; ?></td>
                                                                <td><?php echo $row['grade_name']; ?></td>
                                                                <td><?php echo $row['date_time']; ?></td>
                                                                <td>
                                                                    <a href="#edit<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                                                    <a href="#delete<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                                                    <a href="../php/admin_timetable_display.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span> View Timetable</a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            include '../php/admin_timetable_edit_modal.php';
                                                            include '../php/admin_timetable_delete_modal.php';
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td>No timetable created</td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- Add New -->
                    <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <center><h4 class="modal-title" id="myModalLabel"><img src="../icons/edit.png" alt="edit" width="20"> CREATE TIMETABLE</h4></center>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <form method="POST" action="../php/admin_timetable_file.php">
                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label modal-label">Grade:</label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <select id="dropdown" name="grade" class="form-control" required="">
                                                        <option value="">---Select Grade---</option>
                                                        <option value="8">Grade 8</option>
                                                        <option value="9">Grade 9</option>
                                                        <option value="10">Grade 10</option>
                                                        <option value="11">Grade 11</option>
                                                        <option value="12">Grade 12</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="container-fluid">
                                                    <textarea name="content" class="ckeditor"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                                <button type="submit" name="add" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Send</a>
                                            </div>
                                        </form>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <?php
            include '../php/school_add_modal.php';
            include '../php/footer.php';
            ?>
        </div>

        <?php include '../javascript/script.js'; ?>
        <script src="../ckeditor/ckeditor.js"></script>

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
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
                        <img src="../icons/pencil-1.png" width="28">
                        <b>GRADES</b>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">GRADES IN SCHOOLS</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <a href="#addClass" data-toggle="modal" class="btn btn-primary" style="margin-left: 50px;"><span class="glyphicon glyphicon-plus"></span> New</a>
                                                <?php include '../php/add_class_modal.php';?>
                                                <a href="#" class="btn btn-success pull-right" onclick="window.print()" style="margin-right: 50px;">
                                                    <span class="glyphicon glyphicon-print"></span> Print
                                                </a>   
                                            </div>

                                            <p></p>

                                            <table id="myTable" class="table table-striped table-bordered" style="max-width: 100%;">
                                                <thead>
                                                <th>ID</th>
                                                <th>Grade Name</th>
                                                <th>ACTION</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include_once('../database/config.php');
                                                    
                                                    // SQL Query to Fetch All Data
                                                    $sql = "SELECT * FROM grade ";
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
                                                                <td><?php echo $row['grade_name']; ?></td>
                                                                <td>
                                                                    <a href="#delete<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                                                </td>
                                                                <?php include '../php/delete_class_model.php';?>
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
                include '../php/add_class_modal.php';
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
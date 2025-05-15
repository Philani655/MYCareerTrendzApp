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
                        <img src="../icons/school-1.png" width="28">
                        <b>SCHOOLS</b>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">AVAILABLE SCHOOLS</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <a href="#addnew" data-toggle="modal" class="btn btn-primary" style="margin-left: 50px;"><span class="glyphicon glyphicon-plus"></span> New</a>
                                                <a href="#" onclick="window.print()" class="btn btn-success pull-right" style="margin-right: 50px;"><span class="glyphicon glyphicon-print"></span> PDF</a> 
                                            </div>

                                            <p></p>

                                            <table id="myTable" class="table table-striped table-bordered" style="max-width: 100%;">
                                            <thead>
                                                <th>No.</th>
                                                <th>School Name</th>
                                                <th>Address</th>
                                                <th>Suburb</th>
                                                <th>Postal Code</th>
                                                <th>Office Email</th>
                                                <th>Office Contact</th>
                                                <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * 
                                                            FROM `school`
                                                            GROUP BY `school_name`, `address`, `postalcode`, `email`, `contact`
                                                            ORDER BY `school_name` ASC ";

                                                    $result = $conn->query($sql);
                                                    $count = 0;
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $count++;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $count; ?></td>
                                                                <td><?php echo $row['school_name']; ?></td>
                                                                <td><?php echo $row['address']; ?></td>
                                                                <td><?php echo $row['suburb']; ?></td>
                                                                <td><?php echo $row['postalcode']; ?></td>
                                                                <td><?php echo $row['email']; ?></td>
                                                                <td><?php echo $row['contact']; ?></td>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td><a href="#edit<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal" style="margin-right: 5px;"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                                                                            <td><a href="#delete<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> </a></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            include '../php/school_edit_modal.php';
                                                            include '../php/school_delete_modal.php';
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
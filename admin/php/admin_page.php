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
                        <img src="../icons/add-user-1.png" width="28">
                        <b>ADMINISTRATION USERS</b>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">ADMINISTRATIONS</h3>
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
                                                <a href="#" onclick="window.print()"class="btn btn-success pull-right" style="margin-right: 50px;"><span class="glyphicon glyphicon-print"></span> PDF</a>
                                            </div>

                                            <p></p>

                                            <table id="myTable" class="table table-striped table-bordered" style="max-width: 100%;">
                                                <thead>
                                                <th>ID</th>
                                                <th>Username</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email Address</th>
                                                <th>Contact No</th>
                                                <th>Status</th>
                                                <th>ACTION</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM `admin` ";
                                                    $result = mysqli_query($conn, $sql);
                                                    $count = 0;

                                                    if (mysqli_num_rows($result) > 0) {
                                                        // Output data
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $count++;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $count; ?></td>
                                                                <td><?php echo $row['idno']; ?></td>
                                                                <td><?php echo $row['firstname']; ?></td>
                                                                <td><?php echo $row['secondname']; ?></td>
                                                                <td><?php echo $row['email']; ?></td>
                                                                <td><?php echo $row['contactno']; ?></td>
                                                                <td><?php echo $row['status']; ?></td>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td style="margin-left: 5px;"><a href="#edit<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                                                                            <td><a href="#delete<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal" style="margin-left: 5px;"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                                            <td><a href="#status<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" data-toggle="modal" style="margin-left: 5px;"><span class="glyphicon glyphicon-edit"></span> Change Status</a></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            include '../php/admin_edit_modal.php';
                                                            include '../php/admin_delete_modal.php';
                                                            include '../php/track_admin_modal.php';
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
                include '../php/admin_add_modal.php';
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
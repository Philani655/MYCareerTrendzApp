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
                        <b>TEACHER SUBJECTS</b>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">SUBJECTS</h3>
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
                                                <th>Grade</th>
                                                <th>School Name</th>
                                                <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT l.id as id , l.idno AS idno, l.name AS name, l.surname AS surname, 
                                                                        g.grade_name AS grade_name, l.grade_id as grade_id ,  s.school_name AS school_name 
                                                                 FROM teacher l, grade g, school s 
                                                                 WHERE l.grade_id = g.id 
                                                                 AND l.school_id = s.id ";

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
                                                                <td><?php echo $row['school_name']; ?></td>
                                                                <td>
                                                                    <a href="#add<?php echo $row['id']; ?>" class="btn btn-primary btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Add</a>
                                                                    <a href="#delete<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            include '../php/teacher_subject_add_modal.php';
                                                            include '../php/teacher_subject_delete_modal.php';
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

        <?php include '../javascript/script.js'; ?>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap.js"></script>
        <script>
                                                    new DataTable('#example');
        </script>

        <!-- Multi select tag -->
        <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>
        <script>

            new MultiSelectTag('subject', {
                rounded: true, // default true
                shadow: true, // default false
                placeholder: 'Search', // default Search...
                tagColor: {
                    textColor: '#327b2c',
                    borderColor: '#92e681',
                    bgColor: '#eaffe6',
                },
                onChange: function (values) {
                    console.log(values)
                }
            })

        </script>

        <style>

            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

            body {
                font-family: "Montserrat", sans-serif;
            }

        </style>
    </body>
</html>
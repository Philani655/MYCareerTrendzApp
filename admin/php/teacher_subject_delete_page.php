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
                    <h1 style="font-family: Georgia, 'Times New Roman', Times, serif;">
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
                                    <h3 class="box-title" style="font-family: 'Times New Roman', Times, serif;">SUBJECTS</h3>
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
                                                <th>Subject Name</th>
                                                <th>Subject Code.</th>
                                                <th>ACTION</th>
                                              
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $idno = $_POST['idno'];
                                                    $grade_id = $_POST['grade_id'];

                                                    // Prepare SQL query
                                                    $sql = "SELECT * FROM `subjects` WHERE `learner_id` = ? AND `grade_id` = ?";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bind_param("ss", $idno, $grade_id); // Bind parameters
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    $count = 0;
                                                    // Fetch and display results
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $count++;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $count ?></td>
                                                                <td><?php echo $row['subjectname']; ?></td>
                                                                <td><?php echo $row['subjectcode']; ?></td>
                                                                <td><a href="#delete<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
                                                            </tr>
                                                            <?php
                                                            include '../php/teacher_delete_modal.php';
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
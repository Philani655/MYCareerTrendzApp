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
                        <img src="../icons/overview-1.png" width="28">
                        <b>LEARNERS DOCUMENTS</b>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">LEARNER DOCUMENTS</h3>
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
                                                <th>Learner ID</th>
                                                <th>First Name</th>
                                                <th>Second Name</th>
                                                <th>School</th>
                                                <th>VIEW DOCUMENTS</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Query to select all data from the 'school' table
                                                    $sql = "SELECT
                                                                    la.idno AS idno , 
                                                                    la.firstname AS firstname , 
                                                                    la.secondname AS secondname , 
                                                                    la.surname AS surname , 
                                                                    s.school_name AS school_name  , 
                                                                    ld.birth_certificate AS birth_certificate , 
                                                                    ld.parent_id AS parent_id , 
                                                                    ld.school_report AS school_report
                                                            FROM learner_admission la , learner_documents ld , school s
                                                            WHERE ld.learner_id = la.idno 
                                                            AND 
                                                            s.learner_id  = ld.learner_id 
                                                            GROUP BY  la.idno ";

                                                    $result = $conn->query($sql);
                                                    $count = 0;

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $count++;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $count ?></td>
                                                                <td><?php echo $row['idno']; ?></td>
                                                                <td><?php echo $row['firstname']; ?></td>
                                                                <td><?php echo $row['surname']; ?></td>
                                                                <td><?php echo $row['school_name']; ?></td>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td><a href="view_learner_documents_page.php?file_path=<?php echo $row['birth_certificate']; ?>" class="btn btn-primary btn-sm" data-toggle="modal" style="margin-right: 5px;"><span class="glyphicon glyphicon-eye-open"></span> Birth Certificate</a></td>
                                                                            <td><a href="view_learner_documents_page.php?file_path=<?php echo $row['parent_id']; ?>" class="btn btn-warning btn-sm" data-toggle="modal" style="margin-right: 5px;"><span class="glyphicon glyphicon-eye-open"></span> Parent ID</a></td>
                                                                            <td><a href="view_learner_documents_page.php?file_path=<?php echo $row['school_report']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span> Report</a></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td>No learners record!</td>
                                                        </tr><?php
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
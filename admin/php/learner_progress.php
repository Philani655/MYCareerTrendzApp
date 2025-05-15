<?php $idno = $_GET['idno'];?>
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
                                        <a href="learner_progress_page.php" style="color: steelblue; text-decoration: none;"><strong><i class="fa-solid fa-arrow-left"></i> Back</strong></a>
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
                                                <th>Term</th>
                                                <th>Subject Name</th>
                                                <th>Online Test Mark</th>
                                                <th>Class Test Mark</th>
                                                <th>Assignment Mark</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include '../database/config.php';
                                                    
                                                    $sql = "SELECT t.term_name AS term_name , 
                                                            su.subjectname AS subjectname , 
                                                            sfm.quiz_mark AS quiz_mark , 
                                                            sfm.class_mark AS class_mark ,
                                                            sfm.assignment_mark AS assignment_mark 
                                                            FROM term t ,subjects su , subject_final_mark sfm 
                                                            WHERE sfm.term_id = t.id
                                                            AND 
                                                            su.id = sfm.subject_id
                                                            AND 
                                                            sfm.learner_id = ? ";

                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bind_param("s", $idno); // "i" = integer type
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    $count = 0;
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $count++;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $count; ?></td>
                                                                <td><?php echo $row['term_name']; ?></td>
                                                                <td><?php echo $row['subjectname']; ?></td>
                                                                <td><?php echo ($row['quiz_mark'] !== null) ? $row['quiz_mark'] : 'No mark'; ?></td>
                                                                <td><?php echo ($row['class_mark'] !== null) ? $row['class_mark'] : 'No mark'; ?></td>
                                                                <td><?php echo ($row['assignment_mark'] !== null) ? $row['assignment_mark'] : 'No mark'; ?></td>
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
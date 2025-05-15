<?php 
if(empty($_POST['subject_id'])){
    header('location: ../php/my_learner_page.php');
}
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
                        <img src="../icons/pencil-1.png" width="28">
                        <b>TEACHERS LEARNERS</b>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">LEARNERS</h3>
                                    <div class="box-tools pull-right">
                                        <a href="my_learner_page.php" style="color: steelblue; text-decoration: none;"><strong><i class="fa-solid fa-arrow-left"></i> Back</strong></a>
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
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include '../database/config.php';
                                                    
                                                    // SQL Query to Fetch All Data
                                                    $sqlSubject = "SELECT * FROM subjects WHERE id = ?";
                                                    $stmtSubjects = $conn->prepare($sqlSubject);
                                                    $stmtSubjects->bind_param("i", $_POST['subject_id']); // "i" indicates an integer parameter
                                                    $stmtSubjects->execute();
                                                    $resultSubject = $stmtSubjects->get_result();

                                                    $rowSubject = $resultSubject->fetch_assoc();
                                                  
                                                    $sql = "SELECT l.idno AS idno,
                                                                    l.name AS name, 
                                                                    l.surname AS surname, 
                                                                    l.contactno AS contactno,
                                                                    g.grade_name AS grade_name
                                                             FROM learner l, grade g, subjects su 
                                                             WHERE g.id = l.grade_id 
                                                             AND l.grade_id = ? 
                                                             AND su.subjectcode = ? 
                                                             AND su.subjectname = ?
                                                             GROUP BY l.idno, l.name, l.surname, l.contactno, g.grade_name ";

                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bind_param("iss", $rowSubject['grade_id'], $rowSubject['subjectcode'], $rowSubject['subjectname']);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();
                                                    $count = 0;
                                                    // Fetch and display data
                                                    if ($result->num_rows > 0) {
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
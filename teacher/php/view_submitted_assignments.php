<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <?php include '../php/teacher_header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/page_nav.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        School Year:<?php
                        $currentYear = date("Y");
                        $nextYear = $currentYear + 1;
                        $yearRange = $currentYear . '-' . $nextYear;
                        ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../php/dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Assignment</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../icons/research-1.png" alt="view" width="25"> Submitted Assignments</h3>
                                    <div class="box-tools pull-right">
                                        <a href="./teacher_assignments.php" style="text-decoration: none;"><i class="fa-solid fa-arrow-left"></i> <b>Back</b></a>
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-center">
                                                <i class="fa fa-bars" aria-hidden="true"></i>
                                                <strong>Assignment</strong>
                                            </p>

                                            <div class="chart">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">DATE UPLOAD</th>
                                                            <th scope="col">FILE NAME</th>
                                                            <th scope="col">DESCRIPTION</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        include '../database/config.php';

                                                        $subjectcode = $_SESSION['subjectcode'];
                                                        $subjectname = $_SESSION['subjectname'];
                                                        $grade_id = $_SESSION['grade_id'];

                                                        // Prepare the SQL statement
                                                        $sql = "SELECT 
                                                                    la.id AS id, 
                                                                    la.assignment_id AS assignment_id, 
                                                                    la.file_name AS file_name, 
                                                                    la.file_path AS file_path, 
                                                                    la.assignment_name AS assignment_name, 
                                                                    la.description AS description ,
                                                                    la.date_time AS date_time
                                                                FROM learner_assignment la, teacher_assignment ta, subjects s
                                                                WHERE la.grade_id = ta.grade_id 
                                                                AND ta.subject_id = s.id 
                                                                AND la.assignment_id = ta.id 
                                                                AND s.subjectcode = ? 
                                                                AND s.subjectname = ? 
                                                                AND s.grade_id = ?";

                                                        // Prepare and bind
                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->bind_param("ssi", $subjectcode, $subjectname, $grade_id);

                                                        // Execute the statement
                                                        $stmt->execute();

                                                        // Get the result
                                                        $result = $stmt->get_result();

                                                        // Fetch and display results
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $row['date_time']; ?></th>
                                                                    <td><?php echo $row['file_name']; ?></td>
                                                                    <td><?php echo $row['description']; ?></td>
                                                                    <td>
                                                                        <a href="../php/uploaded_assignments.php?id=<?php echo $row['id']; ?>" style="color: #333;"><button type="button" class="btn btn-primary"><i class="fa-solid fa-eye"></i></button></a>
                                                                        <a href="<?php echo $row['file_path']; ?>" download="<?php echo $row['file_name']; ?>"><button type="button" class="btn btn-success"><i class="fa-solid fa-download"></i></button></a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?><tr>
                                                                <td>No submission!</td>
                                                            </tr>
                                                        <?php }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div><!-- /.chart-responsive -->

                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div><!-- ./box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php include '../php/footer.php'; ?>

            <?php include '../javascript/script.js'; ?>
            <script>
                function printPage() {
                    window.print();
                }
            </script>


            <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
            <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap.js"></script>
            <script>
                new DataTable('#example');
            </script>
            <script src="../ckeditor/ckeditor.js"></script>

            <style>

                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

                body {
                    font-family: "Montserrat", sans-serif;
                }

            </style>
    </body>
</html>

<?php
$id = $_GET['id'];
?>
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
                        School Year: <?php
                        $currentYear = date('Y');
                        $nextYear = $currentYear + 1;
                        $yearRange = $currentYear . '-' . $nextYear;
                        echo $yearRange;
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
                                    <h3 class="box-title">Submitted Assessement</h3>
                                    <div class="box-tools pull-right">
                                        <a href="teacher_assignments.php" style="text-decoration: none;"><i class="fa-solid fa-arrow-left"></i> <b>Back</b></a>
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="chart no-print">
                                                <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">DATE UPLOADED</th>
                                                            <th scope="col">FILE NAME</th>
                                                            <th scope="col">DESCRIPTION</th>
                                                            <th scope="col">SUBMITTED BY</th>
                                                            <!-- Download assignment button -->
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        include '../database/config.php';
                                                        // Prepare the SQL statement
                                                        $sql = "SELECT * FROM `learner_assignment` WHERE `id` = ?";

                                                        // Prepare and bind
                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->bind_param("i", $id); // "i" → integer
                                                        // Execute the statement
                                                        $stmt->execute();

                                                        // Get the result
                                                        $result = $stmt->get_result();

                                                        // Fetch and display results
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $row['date_time'];?></th>
                                                                    <td><?php echo $row['file_name'];?></td>
                                                                    <td><?php echo $row['description'];?></td>
                                                                    <td><?php echo $row['learner_id'];?></td>
                                                                    <td>
                                                                        <table>
                                                                        <tr>
                                                                            <td>
                                                                                <a></a>
                                                                                <form action="../php/view_assignments.php" method="get">
                                                                                    <input type="hidden" name="file_path" value="<?php echo $row['file_path']; ?>">
                                                                                    <input type="hidden" name="file_name" value="<?php echo $row['file_name']; ?>">
                                                                                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-eye"></i></button>
                                                                                </form>
                                                                            </td>
                                                                            <td>
                                                                                <form action="../php/uploaded_assignments_file.php" method="post">
                                                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                                                    <input type="text" name="mark" id="mark" style="width: 40px; margin-left: 5px;">
                                                                                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i></button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?><tr>
                                                                <td>There are no submission available</td>
                                                            </tr><?php }
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

            <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

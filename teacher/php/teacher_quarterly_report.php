<html>
    <?php
    include './head.php';
    include '../database/config.php';

    $idNumber = '0105100822086';
    $grade_id = $_SESSION['grade_id'];
    $subject_id = $_SESSION['subject_id'];

    if (!isset($_SESSION['idNumber'])) {
        echo "<script>alert('Something went wrong');</script>";
        echo "<script>window.location.href='../php/teacher_dashboard.php'</script>";
        exit();
    }

    // Prepare the SQL query
    $sql = "SELECT * FROM `reports` WHERE `teacher_id` = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $idNumber);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();
    ?>
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
                        <li class="active">Quarterly Report</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><i class="fa fa-signal" aria-hidden="true"></i> Quarterly Report</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p class="text-center">
                                                <i class="fa fa-bars" aria-hidden="true"></i>
                                                <strong>Quarterly Report</strong>
                                            </p>

                                            <div class="chart">
                                                <table class="table caption-top">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">DATE UPLOAD</th>
                                                            <th scope="col" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">FILE NAME</th>
                                                            <th scope="col" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">DESCRIPTION</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <tr>
                                                                    <th ><?php echo $row['date_time']; ?></th>
                                                                    <td><?php echo $row['term']; ?></td>
                                                                    <td><?php echo $row['description']; ?></td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-primary"><i class="fa-solid fa-download"></i></button>
                                                                        <button type="button" class="btn btn-primary" style="margin-top: 1px;"><i class="fa-solid fa-trash"></i></button>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                        } else {
                                                               ?>
                                                                <tr>
                                                                    <th ><?php echo $row['date_time']; ?></th>
                                                                    <td><?php echo $row['term']; ?></td>
                                                                    <td><?php echo $row['description']; ?></td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-primary"><i class="fa-solid fa-download"></i></button>
                                                                        <button type="button" class="btn btn-primary" style="margin-top: 1px;"><i class="fa-solid fa-trash"></i></button>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            
                                                        }
                                                        $stmt->close();
                                                        ?>

                                                    </tbody>
                                                </table>
                                            </div><!-- /.chart-responsive -->

                                        </div><!-- /.col -->
                                        <div class="col-md-4">
                                            <p class="text-center">
                                                <i class="fa fa-circle-plus" aria-hidden="true"></i>
                                                <strong>Submit Quarterly Report</strong>
                                            </p>
                                            <form action="../php/teacher_quarterly_report_file.php" method="post" enctype="multipart/form-data">
                                                <div class="progress-group" style="margin-bottom: 20px;">
                                                    <div class="mb-3">
                                                        <label for="formFileSm" class="form-label">File</label>
                                                        <input class="form-control form-control-sm" name="document" id="formFileSm" type="file" accept=".pdf, .doc, .docx" required>
                                                    </div>
                                                </div><!-- /.progress-group -->

                                                <div class="progress-group" style="margin-top: 20px;">
                                                    <input type="text" class="form-control" name="term" placeholder="File name">
                                                </div><!-- /.progress-group -->

                                                <div class="form-floating" style="margin-top: 20px;">
                                                    <textarea class="form-control" name="description" placeholder="Description" id="floatingTextarea"></textarea>
                                                    <label for="floatingTextarea"></label>
                                                </div>

                                                <div class="progress-group" style="margin-top: 20px;">
                                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-upload" aria-hidden="true"></i>  Upload</button>
                                                </div><!-- /.progress-group -->
                                            </form>
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
    </body>
</html>

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
                        $currentYear = date('Y');
                        $nextYear = $currentYear + 1;
                        $yearRange = $currentYear . '-' . $nextYear;
                        echo $yearRange;
                        ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../php/teacher_dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Announcements</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../../image/attendance.png" alt="attendance" width="25"> Attendance</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="chart">
                                                <!-- Display announcements -->
                                                <div class="container-fluid">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Attendance</th>
                                                                <!-- Download assignment button -->
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                        include '../database/config.php';
                                                        // Query to get attendance data (counts present and absent for each date)
                                                        $sql = "SELECT DATE(date_time) AS date, 
                                                                       SUM(CASE WHEN active = 1 THEN 1 ELSE 0 END) AS present_count,
                                                                       COUNT(*) AS total_count
                                                                FROM teacher_log 
                                                                WHERE teacher_id = ?
                                                                GROUP BY DATE(date_time)
                                                                ORDER BY date_time DESC";

                                                        // Prepare and bind
                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->bind_param("s", $idNumber); // "ss" = two string values
                                                        // Execute the statement
                                                        $stmt->execute();

                                                        $result = $stmt->get_result();
                                                        if ($result->num_rows > 0):
                                                            while ($row = $result->fetch_assoc()):

                                                                // Calculate attendance percentage
                                                                $present = $row['present_count'];
                                                                $total = $row['total_count'];
                                                                $attendance_percentage = ($total > 0) ? ($present / $total) * 100 : 0;
                                                                ?>
                                                            <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="progress-group">
                                                                                <!-- / Days of the weeek and date --> <span class="progress-text"> <?php echo $row['date']; ?></span> 
                                                                                <span class="progress-number"><b><?php echo $present; ?></b> / <?php echo $total; ?></span>
                                                                                <div class="progress sm">
                                                                                    <div class="progress-bar <?php echo ($attendance_percentage >= 50) ? 'progress-bar-success' : 'progress-bar-danger'; ?>" style="width: <?php echo $attendance_percentage; ?>%"></div>
                                                                                </div>
                                                                            </div><!-- /.progress-group -->
                                                                        </td>
                                                                    </tr>
                                                            <tbody>
                                                                <?php
                                                            endwhile;
                                                        endif;
                                                        ?>
                                                    </table><!-- /.col -->
                                                </div>
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

            <style>
                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
                body {
                    font-family: "Montserrat", sans-serif;
                }
                .chart {
                    height: 70%;
                    overflow: hidden;
                    overflow-y: scroll;
                }

        </style>
    </body>
</html>

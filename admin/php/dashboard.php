<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">
            <?php include '../php/header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php
            include '../php/aside_nav.php';

            // Prepare SQL query to count pending learners
            $sql = "SELECT COUNT(*) AS total FROM `learner` ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $learnerNum = $row['total']; // Get the count value
            //
            // Prepare SQL query to count pending learners
            $sql = "SELECT COUNT(*) AS total FROM `teacher`";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $teacherNum = $row['total']; // Get the count value
            // Prepare SQL query to count pending learners
            $sql = "SELECT COUNT(*) AS total FROM `parent` ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $parentNum = $row['total']; // Get the count value
            // Prepare SQL query to count pending learners
            $sql = "SELECT COUNT(*) AS total
                    FROM (
                        SELECT 1
                        FROM `school`
                        GROUP BY `school_name`, `address`, `postalcode`, `email`, `contact`
                    ) AS grouped_schools ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $schools = $row['total']; // Get the count value
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <img src="../icons/dashboard-1.png" width="28">
                        Dashboard
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../php/dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua">
                                    <img src="../icons/learners.png" width="60"> <!-- Updated icon -->
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><b>Learners</b></span>
                                    <span class="info-box-number"><?php echo $learnerNum; ?></span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-red">
                                    <img src="../icons/teacher.png" width="60"> <!-- Updated icon -->
                                </span>                                
                                <div class="info-box-content">
                                    <span class="info-box-text"><b>Teachers</b></span>
                                    <span class="info-box-number"><?php echo $teacherNum; ?></span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow">
                                    <img src="../icons/parents.png" width="60">
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><b>Parents</b></span>
                                    <span class="info-box-number"><?php echo $parentNum; ?></span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green">
                                    <img src="../icons/school.png" width="60">
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><b>Schools</b></span>
                                    <span class="info-box-number"><?php echo $schools; ?></span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="font-family: 'Times New Roman', Times, serif;">Learners Report Per/Term</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p class="text-center">
                                                <strong><?php echo date("F Y"); ?></strong>
                                            </p>
                                            <div class="chart">
                                                <!-- Sales Chart Canvas -->
                                                <canvas id="salesChart" style="height: 180px;"></canvas>
                                            </div><!-- /.chart-responsive -->
                                        </div><!-- /.col -->
                                        <div class="col-md-4">
                                            <p class="text-center">
                                                <strong>System</strong>
                                            </p>
                                            <div class="progress-group">
                                                <span class="progress-text">Learners</span>
                                                <span class="progress-number"><b><?php echo $learnerNum ?></b>/1000</span>
                                                <div class="progress sm">
                                                    <div class="progress-bar progress-bar-aqua" style="width: <?php echo ($learnerNum / 1000) * 100 ;?>"></div>
                                                </div>
                                            </div><!-- /.progress-group -->
                                            <div class="progress-group">
                                                <span class="progress-text">Tearchers</span>
                                                <span class="progress-number"><b><?php echo $teacherNum ?></b>/1000</span>
                                                <div class="progress sm">
                                                    <div class="progress-bar progress-bar-red" style="width: <?php echo ($teacherNum / 1000) * 100 ;?>"></div>
                                                </div>
                                            </div><!-- /.progress-group -->
                                            <div class="progress-group">
                                                <span class="progress-text">Schools</span>
                                                <span class="progress-number"><b><?php echo $schools ?></b>/1000</span>
                                                <div class="progress sm">
                                                    <div class="progress-bar progress-bar-green" style="width: <?php echo ($schools / 1000) * 100; ?>"></div>
                                                </div>
                                            </div><!-- /.progress-group -->
                                            <div class="progress-group">
                                                <span class="progress-text">Parents</span>
                                                <span class="progress-number"><b><?php echo $parentNum ?></b>/1000</span>
                                                <div class="progress sm">
                                                    <div class="progress-bar progress-bar-yellow" style="width:  <?php echo ($parentNum / 1000) * 100 ;?>"></div>
                                                </div>
                                            </div><!-- /.progress-group -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div><!-- ./box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php include '../php/footer.php'; ?>
        </div><!-- ./wrapper --><!-- jQuery 2.1.4 -->

        <?php include '../javascript/script.js'; ?>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../dist/js/pages/dashboard2.js"></script>

        <style>

            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

            body {
                font-family: "Montserrat", sans-serif;
            }

        </style>
    </body>
</html>

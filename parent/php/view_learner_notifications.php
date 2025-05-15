<?php
$id = $_GET['id'];
?>
<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <?php include '../php/parent_header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/parent_aside_nav.php'; ?>
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
                        <li><a href="../php/learner_dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Announcement</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../../image/megaphone.png" alt="megaphone" width="25"/> Announcements</h3>
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
                                                <?php
                                                include '../database/config.php';

                                                // Prepare the statement
                                                $sql = "SELECT * FROM `parent_notifications` WHERE `id` = ?";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->bind_param("i", $id); // "i" means integer type
                                                // Execute the statement
                                                $stmt->execute();
                                                $result = $stmt->get_result();

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                        <form action="../php/learner_read_notification_file.php" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                            <button class="btn" style="border-radius: 1.125rem 1.125rem 0 1.125rem; border: 1px solid black; width: 100%; text-align: start; background: #fff"><img src="../icons/conversation.png" width="25"><?php echo $row['message']; ?></button>
                                                        </form>
                                                    <?php }
                                                    } ?>
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
                        overflow: scroll;
                    }

                    .chart::-webkit-scrollbar {
                        display: none;
                    }

                    .chart {
                        -ms-overflow-style: none;  /* IE and Edge */
                        scrollbar-width: none;  /* Firefox */
                    }

                </style>

    </body>
</html>

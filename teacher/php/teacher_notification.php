<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <?php include '../php/teacher_header.php';?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/teacher_aside_nav.php';?>
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
                        <li class="active">Teacher Notification</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../../image/megaphone.png" alt="megaphone" width="25"/> School Announcements</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="chart">
                                                <div class="container-fluid">
                                                    <?php
                                                    include '../database/config.php';
                                                   
                                                    $idNumber = $_SESSION['idNumber'];

                                                    if (!isset($_SESSION['idNumber'])) {
                                                        echo "<script>window.location.href='../php/my_classes.php';</scrpt>";
                                                        exit();
                                                    }

                                                    // Prepare the SQL query using prepared statements
                                                    $sql = "SELECT * 
                                                            FROM school_announcements
                                                            WHERE user_id = ? ";

                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bind_param("s", $idNumber);

                                                    // Execute the query
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {

                                                            if ($row['status'] === 0) {
                                                                $display = "class='alert alert-success'";
                                                                ?>
                                                                <!-- Display announcements -->
                                                                <form action="../php/teacher_notification_file.php" method="Post">
                                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                                    <button class="btn" style="border-radius: 1.125rem 1.125rem 0 1.125rem; border: 1px solid black; width: 100%; text-align: start; background:  #e8192f; color: #fff;"><img src="../icons/conversation.png" width="25"> <?php echo $row['message']; ?></button>
                                                                </form>
                                                                <?php
                                                            } else {
                                                                ?> 
                                                                <div class="alert alert" role="alert" style="border-radius: 1.125rem 1.125rem 0 1.125rem; border: 1px solid black;">
                                                                    <p><img src="../icons/conversation.png" width="25"> <?php echo $row['message']; ?></p>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    } else {
                                                        ?>   
                                                        <div class="container-fluid">
                                                            <p>There are no school announcement to display.</p>
                                                        </div><?php
                                                }
                                                $stmt->close();
                                                    ?>
                                                </div><!-- /.container-fluid -->
                                            </div><!-- /.chart-responsive -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div><!-- ./box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

           <?php include '../php/footer.php';?>
               
           <?php include '../javascript/script.js';?>

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

           </style>

    </body>
</html>


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
                        $currentYear = date("Y");
                        $nextYear = $currentYear + 1;
                        $yearRange = $currentYear . '-' . $nextYear;
                        ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../php/teacher_dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Learners List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../icons/bubble-chat-1.png" width="25"> Learners Chats</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                    <br><br>
                                    <div class="profile-container">
                                        <ul class="profile-list">
                                            <?php
                                            include '../database/config.php';

                                            $grade_id = $_SESSION['grade_id'];
                                            $subjectcode = $_SESSION['subjectcode'];
                                            $subjectname = $_SESSION['subjectname'];
                                            $idNumber = $_SESSION['idNumber'];

                                            // SQL query with placeholders
                                            $sql = "SELECT 
                                                l.idno AS idno,
                                                l.name AS name,
                                                l.surname AS surname,
                                                l.location AS location
                                            FROM 
                                                learner l
                                            JOIN 
                                                subjects su ON l.grade_id = su.grade_id
                                            JOIN 
                                                teacher t ON t.grade_id = l.grade_id AND t.grade_id = su.grade_id
                                            WHERE 
                                                t.idno = ?
                                            AND 
                                                su.subjectcode = ?
                                            AND 
                                                su.subjectname = ?
                                            AND 
                                                su.grade_id = ?
                                            GROUP BY 
                                                l.idno, l.name, l.surname, l.location;";

                                            // Prepare the statement
                                            $stmt = $conn->prepare($sql);

                                            // Bind the parameters to the placeholders
                                            // Assuming that the parameters are strings except for `grade_id` (which is an integer)
                                            $stmt->bind_param("ssss", $idNumber, $subjectcode, $subjectname, $grade_id);


                                            // Execute the query
                                            $stmt->execute();

                                            // Get the result
                                            $result = $stmt->get_result();

                                            // Check if there are any results
                                            if ($result->num_rows > 0) {
                                                // Fetch and display the results
                                                while ($row = $result->fetch_assoc()) {
                                                    
                                                    $learnerID = $row['idno'];
                                                    // Prepare the SQL statement
                                                    $sqlMsg = "SELECT COUNT(*) AS count FROM `messages` WHERE `status`=0 AND `user_id` = ?";

                                                    // Prepare statement
                                                    $stmtMsg = $conn->prepare($sqlMsg);

                                                    // Bind parameters
                                                    $stmtMsg->bind_param("s", $learnerID);  // 'i' denotes an integer parameter

                                                    // Execute the statement
                                                    $stmtMsg->execute();

                                                    // Get the result
                                                    $resultMsg = $stmtMsg->get_result();

                                                    // Fetch the count
                                                    $rowMsg = $resultMsg->fetch_assoc();
                                                    $fullnames = $row['name'] . ' ' . $row['surname'];
                                                    ?>
                                                    <a href="../php/teacher_learner_chats_platform_file.php?idno=<?php echo $row['idno']; ?>&fullnames=<?php echo $fullnames;?>&location=<?php echo  $row['location']; ?>" style="text-decoration: none;"class="profile-link">
                                                        <li class="profile-item">
                                                            <img src="<?php echo $row['location']; ?>" alt="<?php echo $row['name']; ?>">
                                                            <sup style="color:red;"><b><?php echo $rowMsg['count']?><b></sup>
                                                            <span><?php echo $fullnames?></span>
                                                        </li>
                                                    </a>
                                                <?php
                                                }
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </section>
            </div><!-- /.col -->
            <?php include '../php/footer.php'; ?>
        </div><!-- /.row -->

        <?php include '../javascript/script.js'; ?>

        <style>

            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

            body {
                font-family: "Montserrat", sans-serif;
            }

        </style>
    </body>
</html>

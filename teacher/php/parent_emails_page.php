
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
                        <li class="active">Parent Emails</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../icons/gmail-1.png" width="25"> Parent Emails</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                    <br><br>

                                    <div class="container mt-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <form method="GET" action="teacher_sent_parent_email.php">
                                                    <button class="btn btn-primary w-100 mb-2"><i class="fa fa-pen"></i> Compose Email</button>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Email List Section -->
                                            <div class="col-md-4">
                                                <div class="email-list list-group">
                                                    <?php
                                                    include '../database/config.php';

                                                    $grade_id = $_SESSION['grade_id'];
                                                    $subjectcode = $_SESSION['subjectcode'];
                                                    $subjectname = $_SESSION['subjectname'];

                                                    // SQL query
                                                    $sql = "SELECT p.idno AS idno,
                                                                    p.name AS name,
                                                                    p.surname AS surname, 
                                                                    p.email AS email 
                                                             FROM parent p, parent_guardian pg, subjects su, learner l
                                                             WHERE su.learner_id = l.idno
                                                             AND l.grade_id = su.grade_id
                                                             AND p.idno = pg.idno
                                                             AND l.idno = pg.learner_id
                                                             AND su.grade_id = ?
                                                             AND su.subjectcode = ?
                                                             AND su.subjectname = ?
                                                             AND l.idno = pg.learner_id
                                                             GROUP BY p.idno, p.name, p.surname, p.email";

                                                    // Prepare statement
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bind_param("iss", $grade_id, $subjectcode, $subjectname);


                                                    // Execute query
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    // Fetch results
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            ?>
                                                            <a href="../php/teacher_sent_email_store_file.php?idno=<?php echo $row['idno']; ?>"class="email-item list-group-item">
                                                                <strong><?php echo $row['name'] . ' ' . $row['surname']; ?></strong><br><small><?php echo $row['email']; ?></small>
                                                            </a>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
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

            <script>
                function showEmail(sender, subject, message) {
                    document.getElementById("emailSender").innerText = sender;
                    document.getElementById("emailSubject").innerText = subject;
                    document.getElementById("emailMessage").innerText = message;
                    document.querySelector(".email-box").style.display = "block";
                }

                function sendReply() {
                    let replyText = document.getElementById("replyMessage").value.trim();
                    if (replyText === '') {
                        alert("Please enter a reply before sending.");
                    } else {
                        alert("Reply sent successfully!");
                        document.getElementById("replyMessage").value = ''; // Clear after sending
                    }
                }
            </script>

            <style>

            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

            body {
                font-family: "Montserrat", sans-serif;
            }

            </style>
    </body>
</html>

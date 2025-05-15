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
                        <li><a href="../php/teacher_dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Email</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../icons/message.png" width="28"> Compose New Message</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <div class="btn-group">
                                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="teacher_sent_parent_email_file.php" method="post" enctype="multipart/form-data">
                                                <!-- send message to -->
                                                <div class="input-group" style="width: 80%; margin: 0 0 15px 15px;">
                                                    <span class="input-group-addon">To: </span>
                                                    <select name="parent_id" class="form-control">
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
                                                                <option value="<?php echo $row['idno']; ?>"><?php echo $row['email']; ?></option>
                                                            <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <!-- send message cc -->
                                                <div class="input-group" style="width: 80%; margin: 0 0 15px 15px;">
                                                    <span class="input-group-addon">Cc: </span>
                                                    <select name="cc_parent_id[]" class="form-control" multiple="">
                                                        <?php
                                                        include '../database/config.php';

                                                        $grade_id = $_SESSION['grade_id'];
                                                        $subjectcode = $_SESSION['subjectcode'];
                                                        $subjectname = $_SESSION['subjectname'];

                                                        // SQL query
                                                        $sqlcc = "SELECT p.idno AS idno,
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
                                                        $stmtcc = $conn->prepare($sqlcc);
                                                        $stmtcc->bind_param("iss", $grade_id, $subjectcode, $subjectname);


                                                        // Execute query
                                                        $stmtcc->execute();
                                                        $resultcc = $stmtcc->get_result();

                                                        // Fetch results
                                                        if ($resultcc->num_rows > 0) {
                                                            while ($rowcc = $resultcc->fetch_assoc()) {
                                                                ?>
                                                                <option value="<?php echo $rowcc['idno']; ?>"><?php echo $rowcc['email']; ?></option>
                                                            <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="input-group" style="width: 80%; margin: 0 0 15px 15px;">
                                                    <span class="input-group-addon">Subject: </span>
                                                    <input type="text" class="form-control" name="subject_header">
                                                </div>

                                                <!-- Display announcements -->
                                                <div class="container-fluid">
                                                    <textarea name="message" class="ckeditor"></textarea>
                                                </div>

                                                <!-- Attachement -->
                                                <div class="" style="width: 80%; margin: 20px 0 15px 15px;">
                                                    <label for="formFile" class="form-label" style="font-size: 20px;">Attachement</label>
                                                    <input class="form-control form-control-sm" id="formFileSm" name="document" type="file" accept=".pdf, .doc, .docx">
                                                </div>
                                                <button type="submit" class="btn btn-success" style="margin: 15px 0 0 15px;">Send</button>
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

            <style>
                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

                body {
                    font-family: "Montserrat", sans-serif;
                }
            </style>

    </body>
    <script src="../ckeditor/ckeditor.js"></script>
</html>

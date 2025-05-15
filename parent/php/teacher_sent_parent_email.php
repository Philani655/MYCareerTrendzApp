<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <?php include '../php/parent_header.php'; ?>
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
                        <li><a href="../php/parent_dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
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
                                            <form action="../php/parent_sent_email_file.php" method="post" enctype="multipart/form-data">
                                                <!-- send message to -->
                                                <div class="input-group" style="width: 80%; margin: 0 0 15px 15px;">
                                                    <span class="input-group-addon">To: </span>
                                                    <select name="teacher_id" class="form-control">
                                                        <?php
                                                        include '../database/config.php';

                                                        $subjectcode = $_SESSION['subjectcode'];
                                                        $subjectname = $_SESSION['subjectname'];
                                                        $grade_id = $_SESSION['grade_id'];

                                                        $sql = "SELECT t.idno AS idno,
                                                                        t.name AS name , 
                                                                        t.surname AS surname , 
                                                                        t.email AS email
                                                                FROM teacher t , subjects su 
                                                                WHERE su.learner_id = t.idno
                                                                AND 
                                                                su.subjectcode = ?
                                                                AND 
                                                                su.subjectname  = ?
                                                                AND 
                                                                su.grade_id = ? ";

                                                        // Prepare statement
                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->bind_param("ssi", $subjectcode, $subjectname, $grade_id);

                                                        // Execute query
                                                        $stmt->execute();
                                                        $result = $stmt->get_result();

                                                        // Fetch results
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <option value="<?php echo $row['idno'] ?>"><?php echo $row['email'] ?></option>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <option disabled="" selected="">No Teacher</option><?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <!-- send message cc -->
                                                <div class="input-group" style="width: 80%; margin: 0 0 15px 15px;">
                                                    <span class="input-group-addon">Subjects: </span>
                                                    <input type="text" name="subject_header" class="form-control">
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

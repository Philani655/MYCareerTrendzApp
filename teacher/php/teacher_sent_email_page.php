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
                        <li class="active">Inbox</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../icons/mail-inbox-app.png" alt="inbox" width="28"> Inbox </h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                    <br><br>
                                    <div class="box-body">
                                        <?php
                                        include '../database/config.php';
                                        $idNumber = $_SESSION['idNumber'];
                                        $parent_id = $_SESSION['parent_id'];

                                        $sql = "SELECT p.idno AS idno ,
                                                    p.name AS name , 
                                                    p.surname AS surname , 
                                                    p.email AS email , 
                                                    e.subject_header AS subject_header , 
                                                    e.message AS message , 
                                                    e.file_name AS file_name , 
                                                    e.file_path AS file_path ,
                                                    e.date_time AS date_time
                                                    FROM parent p, email e ,teacher t
                                                WHERE p.idno = e.user_id 
                                                AND 
                                                t.idno = e.teacher_id
                                                AND 
                                                p.idno = ?
                                                AND
                                                t.idno = ?
                                                ORDER BY e.date_time DESC ";

                                        // Prepare statement
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bind_param("ss", $parent_id, $idNumber);


                                        $subject_header = null;

                                        // Execute query
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        // Fetch results
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            ?>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <style>
                                                        .scroble {
                                                            max-height: 500px;
                                                            overflow-y: scroll;
                                                            border: 1px solid #ccc;
                                                            padding: 10px;
                                                        }

                                                        /* Hide scrollbar for Chrome, Safari and Opera */
                                                        .scroble::-webkit-scrollbar {
                                                            width: 0px;
                                                            background: transparent;
                                                        }

                                                        /* Hide scrollbar for Firefox */
                                                        .scroble {
                                                            scrollbar-width: none; /* Firefox */
                                                            -ms-overflow-style: none; /* Internet Explorer 10+ */
                                                        }
                                                    </style>

                                                        <div class="scroble">
                                                            <?php
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>

                                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                                        <h4 class="panel-title">
                                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration: none;">
                                                                                <img src="../icons/dots.png" alt="box" width="15"> 
                                                                                <small><span id="fromEmail"><?php echo $row['email']; ?></span><img src="../icons/envelope.png" alt="inbox" width="18" style="margin-left: 100px;"> <span id="subjectLine" style="font-weight: bold;"><?php echo isset($row['subject_header']) && !empty($row['subject_header']) ? $row['subject_header'] : 'No Subject'; ?></span></small><small style="margin-left: 45%;"><?php echo $row['date_time']; ?></small>
                                                                            </a>
                                                                        </h4>
                                                                        </div>
                                                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                        <div class="panel-body">
                                                                            <p><strong>From:</strong> <span id="fromEmail"><?php echo $row['email']; ?></span></p>
                                                                            <p><strong>Subject:</strong> <span id="subjectLine"><?php echo isset($row['subject_header']) && !empty($row['subject_header']) ? $row['subject_header'] : 'No Subject'; ?></span></p>
                                                                            <hr>
                                                                            <div id="messageBody">
                                                                                <?php echo $row['message']; ?>
                                                                                <small><?php echo $row['date_time']; ?></small>
                                                                            </div>

                                                                            <!-- Trigger the Modal with dynamic data from PHP -->
                                                                            <a href="javascript:void(0)" class="btn" data-toggle="modal" data-target="#exampleModal" onclick="setModalData('<?php echo $row['subject_header']; ?>', '<?php echo $row['message']; ?>')" style="margin-top: 20px; border-radius: 50px;">
                                                                                <img src="../icons/reply.png" alt="reply" width="18"> Reply
                                                                            </a>

                                                                            <!-- Large modal -->
                                                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog modal-lg" role="document">
                                                                                    <div class="modal-content">
                                                                                        <form action="../php/teacher_sent_email_file.php" method="post" enctype="multipart/form-data" style="margin-top: 50px;">
                                                                                            <!-- Hidden fields to pass dynamic data -->
                                                                                            <input type="hidden" name="parent_id" value="<?php echo $parent_id; ?>">
                                                                                            <input type="hidden" name="subject_header" value="<?php echo $row['subject_header']; ?>">

                                                                                            <div class="container-fluid">
                                                                                                <textarea name="message" class="ckeditor" rows="2" placeholder="Try here...." style="width: 100%;"></textarea>
                                                                                            </div>

                                                                                            <!-- Attachement -->
                                                                                            <div class="" style="width: 80%; margin: 20px 0 15px 15px;">
                                                                                                <label for="formFile" class="form-label" style="font-size: 20px;">Attachement</label>
                                                                                                <input class="form-control form-control-sm" id="formFileSm" name="document" type="file" accept=".pdf, .doc, .docx">
                                                                                            </div>
                                                                                            <br>

                                                                                            <button type="submit" class="btn btn-success">Send Reply</button>
                                                                                        </form>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>                                          
                                                                
                                                                <hr>
                                                                                                        
                                                                    <?php if (!empty($row['file_name']) && !empty($row['file_path'])) { ?>
                                                                        <div style="margin-left: 15px;">
                                                                            <p><b>Attached:</b></p>
                                                                            <form method="GET" action="<?php echo $row['file_path']; ?>">
                                                                                <input type="submit" value="<?php echo $row['file_name'] ?>" />
                                                                            </form>
                                                                        </div>
                                                                        <hr style="border: 1px solid grey;">
                                                                        <?php
                                                                    }
                                                                    $subject_header = $row['subject_header'];
                                                            }
                                                            ?>
                                                        
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else { ?><div>No emails</div><?php } ?>
                                </div><!-- /.box-header -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                </section><!-- /.content -->
            </div><!-- /.row -->
            <?php include '../php/footer.php'; ?>
        </div><!-- /.content-wrapper -->

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

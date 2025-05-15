<html>
    <?php 
    include './head.php'; 
    $topic_id = $_GET['topic_id'];
    $lesson_content_id = $_GET['lesson_content_id'];
    $lesson_content = $_GET['lesson_content'];
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
                        $currentYear = date("Y");
                        $nextYear = $currentYear + 1;
                        $yearRange = $currentYear . '-' . $nextYear;
                        ?>
                    </h1>
                    <ol class="breadcrumb">
                        <i class="fa-solid fa-book"></i> <li class=""><?php echo $lesson_content;?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><i class="fa fa-book-open-reader" aria-hidden="true"></i> Lessons</h3>
                                    <div class="box-tools pull-right">
                                        <a href="../php/teacher_lessons_page.php" style="text-decoration: none;"><i class="fa-solid fa-arrow-left"></i> <b>Back</b></a>
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="chart">
                                                <!-- Display announcements -->
                                                <!-- Attachement File-->
                                                <form action="../php/teacher_lesson_document_file.php" method="post" enctype="multipart/form-data" style="width: 80%; margin: 20px 0 15px 15px;">
                                                    <label for="formFile" class="form-label" style="font-size: 20px;">Upload a document:</label>
                                                    <input class="form-control" type="file" id="document" name="document" accept=".pdf, .doc, .docx" required>

                                                    <div class="form-floating" style="margin-top: 20px;">
                                                        <textarea class="form-control" name="description" placeholder="Description" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea"></label>
                                                    </div>

                                                    <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
                                                    <input type="hidden" name="lesson_content_id" value="<?php echo $lesson_content_id; ?>">
                                                    <button type="submit" class="btn btn-primary" style="margin: 15px 0 0 5px;"><i class="fa-solid fa-upload" aria-hidden="true"></i>Upload</button>

                                                </form>

                                                <hr class="border border-danger border-1 opacity-50">

                                                <!-- Attachement video -->
                                                <form action="../php/teacher_lesson_video_file.php" method="post" enctype="multipart/form-data" style="width: 80%; margin: 20px 0 15px 15px;">
                                                    <label for="videoUpload" class="form-label" style="font-size: 20px;">Upload a video:</label>
                                                    <input type="file" class="form-control" id="video" name="video" accept="video/*" required>

                                                    <div class="form-floating" style="margin-top: 20px;">
                                                        <textarea class="form-control" name="description" placeholder="Description" id="floatingTextarea"></textarea>
                                                        <label for="floatingTextarea"></label>
                                                    </div>
                                                    <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
                                                    <input type="hidden" name="lesson_content_id" value="<?php echo $lesson_content_id; ?>">
                                                    <button type="submit" class="btn btn-primary" style="margin: 15px 0 0 5px;"><i class="fa-solid fa-upload" aria-hidden="true"></i> Upload</button>
                                                </form>

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
            <script>
                function printPage() {
                    window.print();
                }
            </script>


            <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
            <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap.js"></script>
            <script>
                new DataTable('#example');
            </script>
            <script src="../ckeditor/ckeditor.js"></script>

            <style>

                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

                body {
                    font-family: "Montserrat", sans-serif;
                }

            </style>
    </body>
</html>
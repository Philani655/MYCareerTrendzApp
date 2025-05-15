<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">
            <?php include '../php/header.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <?php include '../php/aside_nav.php'; ?>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h4>
                        SCHOOL WEB APPLICATION PROCESS
                    </h4>
                    <ol class="breadcrumb">
                        <li><a href="../php/learner_admission.php"><i class="fa-solid fa-house"></i> Learner_admission</a></li>
                        <li class="active"><a href="../php/parent_guardian.php"><i class="fa-solid fa-person-breastfeeding"></i> Parent/Guardian</a></li>
                        <li><a href="../php/learner_school_information.php"><i class="fa-solid fa-school"></i> School Information</a></li>
                        <li><a href="../php/learner_uploading_documents.php"><i class="fa-solid fa-upload"></i> Upload document</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="color: steelblue;">Uploading Documents</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">

                                    <form id="uploadDocuments"  action="../php/learner_uploading_documents_file.php" enctype="multipart/form-data" method="post" class="form-horizontal" onsubmit="return isUploadDocuments();">

                                        <!-- Requested Documents -->
                                        <p>Please make sure to submit all the requested documents.</p>
                                        <ol>
                                            <li>Certified copy of Birth Certificate/ ID</li>
                                            <li>Certified copy of a parent or guardian</li>
                                            <li>School report</li>
                                        </ol> 

                                        <p><b>Please take note:</b></p>
                                        <p>if <b>All</b> the above mentioned documents are not submitted, the <b>application will Not be processed!</b></p>

                                        <div class="form-group" style="padding-top: 30px;">
                                            <label for="birthDoc" class="col-sm-3 control-label">Birth Certificate/ ID</label>
                                            <div class="col-sm-3">
                                                <input type="file" name="birthDoc" id="birthDoc" class="form-control form-control-sm">
                                                <span id="birthDoc-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="parentIdDoc" class="col-sm-3 control-label">Parent/ Guardian</label>
                                            <div class="col-sm-3">
                                                <input type="file" name="parentIdDoc" id="parentIdDoc" class="form-control form-control-sm">
                                                <span id="parentIdDoc-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="reportDoc" class="col-sm-3 control-label">Final School Report</label>
                                            <div class="col-sm-3">
                                                <input type="file" name="reportDoc" id="reportDoc" class="form-control form-control-sm">
                                                <span id="reportDoc-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <button type="submit" class="btn">Submit</button>

                                    </form><!-- /.form -->

                                </div><!-- ./box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php include '../php/footer.php'; ?>
        </div>
        <script src="../javascript/learner_uploading_documents.js"></script> 
        <?php include '../javascript/script.js'; ?>   

        <script>
            function goBack() {
                window.location = '../php/parent_guardian.php'; // Navigate to the previous page
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

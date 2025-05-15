<?php
$id = $_GET['id'];
$idno = $_GET['idno'];

if (empty($id)|| empty($idno)) {
    header('location: ../php/school_teacher_page.php');
    exit();
}
?>
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
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="color: steelblue;">Add School Under Teacher</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">

                                    <form id="schoolInformation" class="form-horizontal" action="../php/school_add_teacher_file.php" method="post"    onsubmit="return isSchoolInformation()">

                                        <!-- School Information -->
                                        <p>Please enter the school information below. All fields indicated with a <label style="color: red;">&ast;</label> must be completed.</p> 

                                        <div class="form-group">
                                            <label for="year" class="col-sm-3 control-label">Year:</label>
                                            <div class="col-sm-9">
                                                <select name="year" id="year">
                                                    <option value="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="school" class="col-sm-3 control-label">School Name:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="school" id="school" style="padding-right: 100px;">
                                                <label style="color: red;">&ast;</label>
                                                <span id="school-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="address" class="col-sm-3 control-label">School Address:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="address" id="address" style="padding-right: 100px;">
                                                <label style="color: red;">&ast;</label>
                                                <span id="address-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="suburb" class="col-sm-3 control-label">Suburb:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="suburb" id="suburb" style="padding-right: 100px;">
                                                <label style="color: red;">&ast;</label>
                                                <span id="suburb-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="postalCode" class="col-sm-3 control-label">Postal code:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="postalCode" id="postalCode">
                                                <label style="color: red;">&ast;</label>
                                                <span id="postalCode-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-sm-3 control-label">Office Email:</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" id="email" style="padding-right: 100px;">
                                                <label style="color: red;">&ast;</label>
                                                <span id="email-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="officeNo" class="col-sm-3 control-label">Office Contact No:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="officeNo" id="officeNo" style="padding-right: 100px;">
                                                <label style="color: red;">&ast;</label>
                                                <span id="officeNo-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <nav aria-label="..." style="padding-top: 10px;">
                                            <ul class="pager">
                                                <input type="hidden" name="idno" value="<?php echo $idno;?>">
                                                <button type="submit" style="color: #333;">Add School</button>
                                            </ul>
                                        </nav>
                                    </form><!-- /.form -->
                                </div><!-- ./box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php include '../php/footer.php'; ?>
        </div>

        <script src="../javascript/school_add.js"></script> 
        <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script> 

        <?php include '../javascript/script.js'; ?>  
    </body>
</html>

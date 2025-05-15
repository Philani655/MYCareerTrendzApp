<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include '../php/teacher_admission_header.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h4>
                        SCHOOL WEB APPLICATION PROCESS
                    </h4>
                    <ol class="breadcrumb">
                        <li><a href="../php/teacher_admission.php"><i class="fa-solid fa-house"></i> Learner_admission</a></li>
                        <li class="active"><a href="../php/school_information.php"><i class="fa-solid fa-school"></i> School Information</a></li>
                        <li><a href="../php/uploading_documents.php"><i class="fa-solid fa-upload"></i> Upload document</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="color: steelblue;">School Information</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">

                                    <form id="schoolInformation" class="form-horizontal" action="../php/school_information_file.php" method="post"    onsubmit="return isSchoolInformation()">

                                        <!-- School Information -->
                                        <p>Please enter the school information below. All fields indicated with a <label style="color: red;">&ast;</label> must be completed.</p> 

                                        <div class="form-group">
                                            <label for="year" class="col-sm-3 control-label">Year:</label>
                                            <div class="col-sm-9">
                                                <select name="year" id="year">
                                                    <option value="<?php echo date("Y");?>"><?php echo date("Y");?></option>
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

                                        <!-- Grade and subjects Information -->
                                        <h4 style="color: steelblue;">Grade and subject Information</h4>
                                        <p>Please select grade and subjects .</p>

                                        <div class="form-group">
                                            <label for="grade" class="col-sm-3 control-label">Grade:</label>
                                            <div class="col-sm-9">
                                                <select name="grade" id="grade">
                                                    <option selected="" disabled="">-- Please select --</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                                <label style="color: red;">&ast;</label>
                                                <span id="grade-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="subject" class="col-sm-3 control-label">Subjects:</label>
                                            <div class="col-sm-9">
                                                <select name="subject[]" id="subject" multiple>
                                                    <option  selected="" disabled="">-- Please select --</option>
                                                    <option value="Accounting">Accounting</option>
                                                    <option value="Afrikaans">Afrikaans</option>
                                                    <option value="Agricultural Sciences">Agricultural Sciences</option>
                                                    <option value="Business Studies">Business Studies</option>
                                                    <option value="Civil Technology">Civil Technology</option>
                                                    <option value="Computer Applications Technology">Computer Applications Technology (CAT)</option>
                                                    <option value="Computer Science">Computer Science</option>
                                                    <option value="Consumer Studies">Consumer Studies</option>
                                                    <option value="Dance Studies">Dance Studies</option>
                                                    <option value="Drama">Drama</option>
                                                    <option value="Economics">Economics</option>
                                                    <option value="Electrical Technology">Electrical Technology</option>
                                                    <option value="Engineering Graphics and Design">Engineering Graphics and Design (EGD)</option>
                                                    <option value="English First Additional Language">English First Additional Language</option>
                                                    <option value="English Home Language">English Home Language</option>
                                                    <option value="Geography">Geography</option>
                                                    <option value="History">History</option>
                                                    <option value="Hospitality Studies">Hospitality Studies</option>
                                                    <option value="Information Technology">Information Technology</option>
                                                    <option value="isiNdebele">IsiNdebele</option>
                                                    <option value="isiZulu Home Language">IsiZulu Home Language</option>
                                                    <option value="isiZulu First Additional Language">IsiZulu First Additional Language (FAL)</option>
                                                    <option value="isiXhosa">IsiXhosa</option>
                                                    <option value="Life Sciences">Life Sciences</option>
                                                    <option value="Life Orientation">Life Orientation</option>
                                                    <option value="Mathematics">Mathematics</option>
                                                    <option value="Mathematics Literacy">Mathematics Literacy</option>
                                                    <option value="Music">Music</option>
                                                    <option value="Physical Science">Physical Science</option>
                                                    <option value="Sepedi">Sepedi</option>
                                                    <option value="Sesotho">Sesotho</option>
                                                    <option value="Setswana">Setswana</option>
                                                    <option value="siSwati">siSwati</option>
                                                    <option value="Tshivenda">Tshivenda</option>
                                                    <option value="Tourism">Tourism</option>
                                                    <option value="Visual Arts">Visual Arts</option>
                                                    <option value="Xitsonga">Xitsonga</option>
                                                    <option value="Natural Sciences">Natural Sciences</option>
                                                    <option value="Social Sciences">Social Sciences</option>
                                                    <option value="Technology">Technology</option>
                                                </select>
                                                <label style="color: red;">&ast;</label>
                                                <span id="subject-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

<!--                                        <div class="">
                                            <button type="button" class="btn btn-sm" style="background: mediumseagreen;">Save</button>
                                        </div>-->

<!--                                        <div class="" style="padding-top: 20px;">
                                            <table class="table caption-top">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Year</th>
                                                        <th scope="col">Grade</th>
                                                        <th scope="col">Subject</th>
                                                        <th scope="col">School Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <th scope="row"></th>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>-->

                                        <nav aria-label="..." style="padding-top: 10px;">
                                            <ul class="pager">
                                                <button type="button" style="color: #333;" onclick="goBack()">Previous</button>
                                                <button type="submit" style="color: #333;">Next</button>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="../javascript/school_information.js"></script> 
        <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script> 
        <script>
            function goBack() {
                window.location = '../php/teacher_admission.php'; // Navigate to the previous page
            }
        </script>
        <script src="../javascript/choose_subjects.js"></script>
    </body>
</html>

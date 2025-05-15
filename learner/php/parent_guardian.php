<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include '../php/learner_admission_header.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h4>
                        SCHOOL WEB APPLICATION PROCESS
                    </h4>
                    <ol class="breadcrumb">
                        <li><a href="../php/learner_admission.php"><i class="fa-solid fa-house"></i> Learner_admission</a></li>
                        <li class="active"><a href="../php/parent_guardian.php"><i class="fa-solid fa-person-breastfeeding"></i> Parent/Guardian</a></li>
                        <li><a href="../php/school_information.php"><i class="fa-solid fa-school"></i> School Information</a></li>
                        <li><a href="../php/uploading_documents.php"><i class="fa-solid fa-upload"></i> Upload document</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="color: steelblue;">Parent/ Guardian Information</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">

                                    <form id="parentGaurdian" action="../php/parent_guardian_file.php" method="post" class="form-horizontal" onsubmit="return isParentGuardian()">

                                        <p>Please enter your parent/ Guardian information below. All fields indicated with a <label style="color: red;">&ast;</label> must be completed.</p> 

                                        <div class="form-group">
                                            <label for="resides" class="col-sm-6 control-label">Is the learner resides with the parent/s or guardians?:</label>
                                            <div class="col-sm-3">
                                                <select name="resides" id="resides">
                                                    <option disabled="" selected="">-- Please select --</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <label style="color: red;">&ast;</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <span id="resides-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="working" class="col-sm-6 control-label">Is the parent/ guardian working?:</label>
                                            <div class="col-sm-3">
                                                <select name="working" id="working">
                                                    <option selected="" disabled="">-- Please select --</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <label style="color: red;">&ast;</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <span id="working-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="validCertificate" class="col-sm-6 control-label">Are you a SA Citizen in possession of a valid SA Birth Certificate/ID?:</label>
                                            <div class="col-sm-3">
                                                <select name="validCertificate" id="validCertificate">
                                                    <option selected="" disabled="">-- Please select --</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <label style="color: red;">&ast;</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <span id="validCertificate-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="idNumber" class="col-sm-6 control-label">ID Number:</label>
                                            <div class="col-sm-3">
                                                <input type="text" name="idNumber" id="idNumber" placeholder="13-digit number" style="padding-right:50px;">
                                                <label style="color: red;">&ast;</label>
                                                <span id="idNumber-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="title" class="col-sm-3 control-label">Title:</label>
                                            <div class="col-sm-9">
                                                <select name="title" id="title">
                                                    <option selected="" disabled="">-- Please select --</option>
                                                    <option value="Adv">ADV</option>
                                                    <option value="Capt">CAPT</option>
                                                    <option value="Dr">DR</option>
                                                    <option value="Mr">MR</option>
                                                    <option value="Mrs">MRS</option>
                                                    <option value="Ms">MS</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                <label style="color: red;">&ast;</label>
                                                <span id="title-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 control-label">Parent/ Guardian name(s):</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" id="name" style="padding-right: 80px;">
                                                <label style="color: red;">&ast;</label>
                                                <span id="name-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="status" class="col-sm-3 control-label">Marital Status:</label>
                                            <div class="col-sm-9">
                                                <select name="status" id="status">
                                                    <option selected="" disabled="">-- Please select --</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Window">Widow/er</option>
                                                </select>
                                                <label style="color: red;">&ast;</label>
                                                <span id="status-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="language" class="col-sm-3 control-label">Home Language:</label>
                                            <div class="col-sm-9">
                                                <select name="langauge" id="language">
                                                    <option selected="" disabled="">-- Please select --</option>
                                                    <option value="Afrikaans">AFRIKAANS</option>
                                                    <option value="English">ENGLISH</option>
                                                    <option value="IsiNdebele">ISINDEBELE</option>
                                                    <option value="IsiZulu">ISIZULU</option>
                                                    <option value="Sepedi">SEPEDI</option>
                                                    <option value="Sesotho (North Sotho)">SESOTHO (NORTH SOTHO)</option>
                                                    <option value="Sesotho (South Sotho)">SESOTHO (SOUTH SOTHO)</option>
                                                    <option value="Setswana">SETSWANA</option>
                                                    <option value="Seswati">SESWATI</option>
                                                    <option value="Tshivenda">TSHIVENDA</option>
                                                    <option value="Xhosa">XHOSA</option>
                                                    <option value="Xitsonga">XITSONGA</option>
                                                    <option value="Other">OTHER AFRICAN LANGUAGES</option>
                                                </select>
                                                <label style="color: red;">&ast;</label>
                                                <span id="language-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="ethinic" class="col-sm-3 control-label">Ethnic group:</label>
                                            <div class="col-sm-9">
                                                <select name="ethinic" id="ethinic">
                                                    <option selected="" disabled="">-- Please select --</option>
                                                    <option value="African">AFRICAN</option>
                                                    <option value="Coloured">COLOURED</option>
                                                    <option value="Indian">INDIAN</option>
                                                    <option value="White">WHITE</option>
                                                    <option value="Other">other</option>
                                                </select>
                                                <label style="color: red;">&ast;</label>
                                                <span id="ethinic-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="mobileNumber" class="col-sm-3 control-label">Parent/ Guardian mobile number:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="mobileNumber" id="mobileNumber">
                                                <label style="color: red;">&ast;</label>
                                                <span id="mobileNumber-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="homeNumber" class="col-sm-3 control-label">Parent/ Guardian home number:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="homeNumber" id="homeNumber">
                                                <label style="color: red;">&ast;</label>
                                                <span id="homeNumber-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="workNumber" class="col-sm-3 control-label">Parent/ Guardian work number:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="workNumber" id="workNumber">
                                                <label style="color: red;">&ast;</label>
                                                <span id="workNumber-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-sm-3 control-label">Email:</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" id="email" style="padding-right: 80px;">
                                                <label style="color: red;">&ast;</label>
                                                <span id="email-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <!-- Addredd Information -->
                                        <h4 style="color: steelblue;">Address Information</h4>
                                        <p>Please enter your parent/ guardian address information</p>

                                        <div class="form-group">
                                            <label for="streetName" class="col-sm-4 control-label">Street Address Line 1(e.g. Street Name):</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="streetName" id="streetName" style="padding-right: 100px;">
                                                <label style="color: red;">&ast;</label>
                                                <span id="streetName-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="suburbName" class="col-sm-4 control-label">Street Address Line 2(e.g. Suburb Name):</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="suburbName" id="suburbName" style="padding-right: 100px;">
                                                <label style="color: red;">&ast;</label>
                                                <span id="suburbName-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="postalCode" class="col-sm-4 control-label">Postal Code:</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="postalCode" name="postalCode" style="width: 14%;" >
                                                <a class="btn" id="searchButton"><img src="../icons/search.png" alt="search" width="20"></a>
                                                <label style="color: red;">&ast;</label>
                                                <span id="postalCode-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                            <?php
                                            include '../php/parent_postal_code_modal.php';
                                            ?>
                                        </div>

                                        <nav aria-label="..." style="padding-top: 10px;">
                                            <ul class="pager">
                                                <button type="button" onclick="goBack()" style="color: #333;">Previous</button>
                                                <button type="submit" style="color: #333;">Next</button>
                                            </ul>
                                        </nav>

                                    </form><!-- /.form 
                                </div><!-- ./box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php include '../php/footer.php'; ?>
        </div>
            
        <script src="../javascript/parent_postal_code.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="../javascript/parent_guardian.js"></script> 
        <script>
                                                    function goBack() {
                                                        window.location = '../php/learner_admission.php'; // Navigate to the previous page
                                                    }
        </script>
    </body>
</html>

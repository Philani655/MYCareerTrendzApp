<html>
    <?php include '../php/head.php'; ?>
    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">
            <?php include '../php/header.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <?php include '../php/aside_nav.php'; ?>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h4>
                        UPDATE SCHOOL WEB APPLICATION PROCESS
                    </h4>

                </section>

                <?php
                // Include database connection
                include '../database/config.php';

                $id = $_GET['id'];


                if ($id) {
                    // Prepare the SQL statement
                    $sql = "SELECT * FROM learner_admission WHERE id = ?";
                    $stmt = $conn->prepare($sql);

                    // Bind the parameter (assuming id is an integer)
                    $stmt->bind_param("i", $id);

                    // Execute the query
                    $stmt->execute();

                    // Get the result
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                } else {
                    header('Location: ../php/index.php');
                    exit(); // Always call exit() after header() to stop further execution
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="color: steelblue;">Update Learner Information</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">

                                    <form id="learnerAdmission"class="form-horizontal" action="../php/learner_admission_edit_file.php" method="post" onsubmit="return isLearnerAdmission()">

                                        <p>Please enter your personal information below. All fields indicated with a <label style="color: red;">&ast;</label> must be completed.</p> 

                                        <div class="form-group">
                                            <label for="validCertificate" class="col-sm-5 control-label">Are you a SA Citizen in possession of a valid SA Birth Certificate/ID?:</label>
                                            <div class="col-sm-3">
                                                <select name="validCertificate" id="validCertificate">
                                                    <option disabled="" selected="">-- Please select --</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <label style="color: red;">&ast;</label>
                                                <span id="validCertificate-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="idNumber" class="col-sm-5 control-label">ID Number:</label>
                                            <div class="col-sm-3">
                                                <input type="hidden" name="idNumber" value="<?php echo $row['idno']; ?>">
                                                <input type="text"  id="idNumber" value="<?php echo $row['idno']; ?>" readonly required>
                                                <label style="color: red;">&ast;</label>
                                                <span id="idNumber-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <!-- Personal Information -->
                                        <h4 style="color: steelblue;">Update Personal Information</h4>
                                        <p>Please enter your personal information.</p>
                                        <ul>
                                            <li>Enter your Full Names and Surname EXACTLY as it appears on your ID/passport document</li>
                                            <li>Date of Birth must be entered with dashes (-) e.g. 21/SEP/1991.</li>
                                        </ul>
                                        <div class="form-group">
                                            <label for="gender" class="col-sm-3 control-label">Gender:</label>
                                            <div class="col-sm-9">
                                                <select name="gender" id="gender">
                                                    <option selected="" disabled="">-- Please select --</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                </select>
                                                <label style="color: red;">&ast;</label>
                                                <span id="gender-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="date" class="col-sm-3 control-label">Date of birth:</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="date" id="date">
                                                <label style="color: red;">&ast;</label>
                                                <span id="date-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="title" class="col-sm-3 control-label">Title:</label>
                                            <div class="col-sm-9">
                                                <select name="title" id="title">
                                                    <option selected="" disabled="">-- Please select --</option>
                                                    <option value="Mr">MR</option>
                                                    <option value="Ms">MS</option>
                                                </select>
                                                <label style="color: red;">&ast;</label>
                                                <span id="title-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="initials" class="col-sm-3 control-label">Initials</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="initials" id="initials">
                                                <label style="color: red;">&ast;</label>
                                                <span id="initials-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="surname" class="col-sm-3 control-label">Surname:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="surname" id="surname" style="padding-right: 60px;">
                                                <label style="color: red;">&ast;</label>
                                                <span id="surname-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="firstNames" class="col-sm-3 control-label">First Names:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="firstNames" id="firstNames" style="padding-right: 80px;">
                                                <label style="color: red;">&ast;</label>
                                                <span id="firstNames-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="maidenName" class="col-sm-3 control-label">Maiden Name:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="maidenName" id="maidenName" style="padding-right: 50px;">
                                                <label style="color: red;">&ast;</label>
                                                <span id="maidenName-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="status" class="col-sm-3 control-label">Marital Status:</label>
                                            <div class="col-sm-9">
                                                <select name="status" id="status">
                                                    <option selected="" disabled="">-- Please select --</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Maried">Married</option>
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
                                                    <option value="Afrikans">AFRIKAANS</option>
                                                    <option value="English">ENGLISH</option>
                                                    <option value="IsiNdebele">ISINDEBELE</option>
                                                    <option value="IsiZulul">ISIZULU</option>
                                                    <option value="Sepedi">SEPEDI</option>
                                                    <option value="Sesotho">SESOTHO (NORTH SOTHO)</option>
                                                    <option value="Sesotho">SESOTHO (SOUTH SOTHO)</option>
                                                    <option value="Setwana">SETSWANA</option>
                                                    <option value="SeSwati">SESWATI</option>
                                                    <option value="Tshivenda">TSHIVENDA</option>
                                                    <option value="Xhosa">XHOSA</option>
                                                    <option value="Xitshonga">XITSONGA</option>
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

                                        <!-- Addredd Information -->
                                        <h4 style="color: steelblue;">Update Address Information</h4>
                                        <p>Please enter your address information</p>

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
                                                <input type="text" name="postalCode" id="postalCode" style="padding-right: 80px;">
                                                <label style="color: red;">&ast;</label>
                                                <span id="postalCode-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <!-- Contact Information -->
                                        <h4 style="color: steelblue;">Update Contact Information</h4>
                                        <p>Please enter your contact information. All fields indicated with a <label style="color: red;">&ast;</label> must be completed. Note that having a South African cell phone number as a contact is compulsory.</p>
                                        <ol>
                                            <li>Enter the phone numbers exactly as you would type on a phone e.g. if your cell phone number is 084 123 4567, then enter 0841234567.</li>
                                            <li>Do not use any spaces, hyphens, other symbols, or include any other information</li>
                                        </ol>

                                        <div class="form-group">
                                            <label for="mobileNumber" class="col-sm-3 control-label">Mobile Number:</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="mobileNumber" id="mobileNumber">
                                                <label style="color: red;">&ast;</label>
                                                <span id="mobileNumber-error" class="error-message" ></span><!-- Error message inside the field -->
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

                                        <div class="form-group">
                                            <label for="verifyEmail" class="col-sm-3 control-label">Verify email:</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="verifyEmail" id="verifyEmail" style="padding-right: 80px;">
                                                <label style="color: red;">&ast;</label>
                                                <span id="verifyEmail-error" class="error-message" ></span><!-- Error message inside the field -->
                                            </div>
                                        </div>

                                        <nav aria-label="..." style="padding-top: 10px;">
                                            <ul class="pager">
                                                <button type="submit" style="color: #333;">Update</button>
                                                <!--<li><a href="../php/parent_guardian.php" >Next</a></li>-->
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

        <?php include '../javascript/script.js'; ?>   
        <script src="../javascript/learner_admission_edit.js"></script>

        <style>

            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

            body {
                font-family: "Montserrat", sans-serif;
            }

        </style>

    </body>
</html>

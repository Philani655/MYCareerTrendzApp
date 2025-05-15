<?php
include '../database/config.php';

$userID = $_SESSION['userID'];

// Prepare the SQL query
$sql = "SELECT *
        FROM admin  
        WHERE idno = ?";

// Prepare statement
$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $userID);

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Loop through the result set
    while ($row = $result->fetch_assoc()) {
        ?>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo htmlspecialchars($row['location']); ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $row['firstname'] . ' ' . $row['secondname']; ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <?php
            }
        }
        ?>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="../php/dashboard.php">
                    <img src="../icons/dashboard.png" width="25">
                    <span>Dashboard</span> </i>
                </a>            
            </li>

            <li class="treeview">
                <a href="../php/school_announcement.php">
                    <img src="../icons/announcement.png" width="25">
                    <span>Announcements</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../php/subjects_page.php">
                    <img src="../icons/subjects.png" width="25">
                    <span>Subjects</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li>
                <a href="../php/classes.php">
                    <img src="../icons/grades.png" width="25">
                    <span>Grades</span> 
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../php/admin_page.php">
                    <img src="../icons/add-user.png" width="25">
                    <span>Admin Users</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../php/school_page.php">
                    <img src="../icons/school.png" width="25">
                    <span>Schools</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="#" style="text-decoration: none;">
                    <img src="../icons/learners.png" width="25">
                    <span>Learners</span>
                    <i class="fa fa-angle-right pull-right"></i>
                    <ul class="treeview-menu">
                        <li><a href="../php/learner_admission_page.php"><i class="fa fa-circle-o"></i>Admission</a></li>
                        <li><a href="../php/track_learner_admission.php"><i class="fa fa-circle-o"></i>Track Admission</a></li>
                        <li><a href="../php/learner_grade_page.php"><i class="fa fa-circle-o"></i>Grade</a></li>
                        <li><a href="../php/learner_subjects_page.php"><i class="fa fa-circle-o"></i>Subjects</a></li>
                        <li><a href="../php/learner_documents_page.php"><i class="fa fa-circle-o"></i>View Documents</a></li>
                        <li><a href="../php/learner_result_page.php"><i class="fa fa-circle-o"></i>Report Result</a></li>
                    </ul>
                </a>
            </li>

            <li class="treeview">
                <a href="#" style="text-decoration: none;">
                    <img src="../icons/parents.png" width="25">
                    <span>Parents</span>
                    <i class="fa fa-angle-right pull-right"></i>
                    <ul class="treeview-menu">
                        <li><a href="../php/learner_admission_page.php"><i class="fa fa-circle-o"></i>Apply for Learner</a></li>
                        <li><a href="../php/learner_progress_page.php"><i class="fa fa-circle-o"></i>My Learner Progress</a></li>
                        <li><a href="../php/learner_result_page.php"><i class="fa fa-circle-o"></i>Report Result</a></li>
                    </ul>
                </a>
            </li>

            <li class="treeview">
                <a href="#" style="text-decoration: none;">
                    <img src="../icons/teacher.png" width="25">
                    <span>Teachers</span>
                    <i class="fa fa-angle-right pull-right"></i>
                    <ul class="active treeview-menu">
                        <li><a href="../php/my_learner_page.php"><i class="fa fa-circle-o"></i>My Learners</a></li>
                        <li><a href="../php/teacher_admission_page.php"><i class="fa fa-circle-o"></i>Admission</a></li>
                        <li><a href="../php/track_teacher_admission.php"><i class="fa fa-circle-o"></i>Track Admission</a></li>
                        <li><a href="../php/teacher_grade_page.php"><i class="fa fa-circle-o"></i>Grade</a></li>
                        <li><a href="../php/teacher_subjects_page.php"><i class="fa fa-circle-o"></i>Subjects</a></li>
                        <li><a href="../php/teacher_documents_page.php"><i class="fa fa-circle-o"></i>View Documents</a></li>
                    </ul>
                </a>
            </li>

            <li>
                <a href="../php/create_qrcode_page.php">
                    <img src="../icons/qr-code.png" width="25">
                    <span>Create QR Code</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li>
                <a href="../calender/dist/index.php">
                    <img src="../icons/calendar.png" width="25">
                    <span>Calendar</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li>
                <a href="../php/admin_timetable_page.php">
                    <img src="../icons/calendar.png" width="25">
                    <span>Timetable</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
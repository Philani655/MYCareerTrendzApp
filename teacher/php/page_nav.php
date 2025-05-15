<?php
include '../database/config.php';

$idNumber = $_SESSION['idNumber'];

if (!isset($_SESSION['idNumber'])) {
    echo "<script>window.location.href='../php/teacher_login.php'</script>";
    exit();
}
// Prepare the SQL query
$sql = "SELECT name, surname, location 
        FROM teacher  
        WHERE idno = ?";

// Prepare statement
$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $idNumber);

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Loop through the result set
    while ($row = $result->fetch_assoc()) {
        ?>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar" style="font-family: 'Montserrat', sans-serif;">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo htmlspecialchars($row['location']); ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $row['name'] . ' ' . $row['surname']; ?></p>
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
                <a href="../php/teacher_dashboard.php">
                    <img src="../icons/back-button.png" width="25">
                    <span>Back</span> </i>
                </a>            
            </li>

            <li class="treeview">
                <a href="../php/my_learner.php">
                    <img src="../icons/student.png" width="25">
                    <span>My Learner</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../php/teacher_lessons_page.php">
                    <img src="../icons/lessons.png" width="25">
                    <span>Lessons</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../php/teacher_topics.php">
                    <img src="../icons/topic.png" width="25">
                    <span>Topics</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../php/teacher_exams.php">
                    <img src="../icons/exam.png" width="25">
                    <span>Exams</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../php/teacher_results.php">
                    <img src="../icons/result.png" width="25">
                    <span>Results</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../php/teacher_timetable.php">
                    <img src="../icons/timetable.png" width="25">
                    <span>Timetable</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../php/subject_overview.php">
                    <img src="../icons/overview.png" width="25">
                    <span>Subject Overview</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../php/teacher_announcements.php">
                    <img src="../icons/announcement.png" width="25">
                    <span>Announcements</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../php/teacher_assignments.php">
                    <img src="../icons/assignment.png" width="25">
                    <span>Assignments</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../php/teacher_class_test.php">
                    <img src="../icons/class test.png" width="25">
                    <span>Class Test</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../php/teacher_attendance_page.php">
                    <img src="../icons/attendance.png" width="25">
                    <span>Attendance</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../php/teacher_learner_chats_page.php">
                    <img src="../icons/bubble-chat.png" width="25">
                    <span>Learners Chats</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>
            
            <li class="treeview">
                <a href="../php/parent_emails_page.php">
                    <img src="../icons/gmail.png" width="25">
                    <span>Parent Emails</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../calender/dist/index.php">
                    <img src="../icons/calendar.png" width="25">
                    <span>Class Calender</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
</style>
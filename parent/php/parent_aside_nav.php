<?php
include_once '../database/config.php';

$idNumber = $_SESSION['idNumber'];

// Check if user is logged in
if (!isset($_SESSION['idNumber'])) {
    header("Location: ../php/parent_login.php");
    exit();
}

// Prepare the SQL query
$sql = "SELECT * FROM parent 
        WHERE idno = ?";

// Prepare statement
$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $idNumber);

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Loop through the result set
$row = $result->fetch_assoc();

// Close the statement and connection
$stmt->close();
$conn->close();
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
                <p><?php echo $row['name']. ' '.$row['surname'];?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
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
                <a href="../php/parent_dashboard.php">
                    <img src="../icons/books.png" width="25">
                    <span>Learner Subjects</span> </i>
                </a>            
            </li>
            
            <?php
            include '../database/config.php';
            $idNumber = $_SESSION['idNumber'];

            // Prepare the SQL statement
            $sql = "SELECT COUNT(*) AS total FROM `school_announcements` WHERE `status`= 0 AND `user_id` = ?";
            $stmt = $conn->prepare($sql);

            // Bind parameter (i = integer)
            $stmt->bind_param("s", $idNumber);

            // Execute the statement
            $stmt->execute();

            // Get result
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            // Get the count
            $total = $row['total'];
            ?>
            <li class="treeview">
                <a href="../php/parent_notification.php">
                    <img src="../icons/notification.png" width="25">
                    <sup style="color: red;"><?php echo $total; ?></sup>
                    <span>Announcement</span>  </i>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>            
            </li>
            
            <li class="treeview">
                <a href="../php/parent_learner_report.php">
                    <img src="../icons/report.png" width="25">
                    <span>Quartely Report</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <img src="../icons/settings.png" width="25">
                    <span>Settings</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
            </li>

            <li class="treeview">
                <a href="../calender/dist/index.php">
                    <img src="../icons/calendar.png" width="25">
                    <span>Calender</span>
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
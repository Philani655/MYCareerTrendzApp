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
                    <img src="../icons/myclass.png" width="25">
                    <span>My Class</span> </i>
                </a>            
            </li>

            <?php
            include '../database/config.php';
            $idNumber = $_SESSION['idNumber'];

            // Prepare the SQL statement
            $sql = "SELECT COUNT(*) AS total FROM `school_announcements` WHERE `status`= 0 AND `user_id` = ?";
            $stmt = $conn->prepare($sql);

            // Bind parameter (i = integer)
            $stmt->bind_param("i", $idNumber);

            // Execute the statement
            $stmt->execute();

            // Get result
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            // Get the count
            $total = $row['total'];
            ?>
            <li class="treeview">
                <a href="../php/teacher_notification.php">
                    <img src="../icons/notification.png" width="25">
                    <sup style="color: red;"><?php echo $total; ?></sup>
                    <span>Announcement</span>  </i>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>            
            </li>

            <li class="treeview">
                <a href="../School Calender/php/calender.php">
                    <img src="../icons/calendar.png" width="25">
                    <span>Calender</span>
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

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
</style>
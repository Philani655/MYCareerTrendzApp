<?php
include_once '../database/config.php';

$idNumber = $_SESSION['idNumber'];

// Check if user is logged in
if (!isset($_SESSION['idNumber'])) {
    header("Location: ../php/teacher_login.php");
    exit();
}

// Prepare the SQL query
$sql = "SELECT * FROM teacher 
        WHERE idno = ?";

// Prepare statement
$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $idNumber);

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Loop through the result set
$row = $result->fetch_assoc();
?>

<header class="main-header" style="font-family: 'Montserrat', sans-serif;">
    <!-- Logo -->
    <a href="../php/teacher_dashboard.php" class="logo" style="text-decoration: none;">
        <span class="logo-mini"><b>MCTz</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="../icons/teacher.png" width="28"> <b>Teacher</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="text-decoration: none;">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../icons/bell.png" alt="bell" width="20" height="20">
                        <?php
                        $idNumber = $_SESSION['idNumber'];

                        $stmttsa = $conn->prepare("SELECT COUNT(*) as count FROM `school_announcements` WHERE `user_id` = ? AND status = 0 ");
                        $stmttsa->bind_param("s", $idNumber); // "i" for integer
                        // Execute and fetch result
                        $stmttsa->execute();
                        $resulttsa = $stmttsa->get_result();
                        $rowtsa = $resulttsa->fetch_assoc();
                        ?>
                        <span class="label label-warning"><?php echo $rowtsa['count'] ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="header">You have <?php echo $rowtsa['count'] ?> notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu" style="font-weight: normal;">
                                <?php
                                // Prepare the SQL query using prepared statements
                                $sqlsa = "SELECT * 
                                        FROM school_announcements
                                        WHERE user_id = ? AND status = 0 ";

                                $stmtsa = $conn->prepare($sqlsa);
                                $stmtsa->bind_param("s", $idNumber);

                                // Execute the query
                                $stmtsa->execute();
                                $resultsa = $stmtsa->get_result();

                                if ($resultsa->num_rows > 0) {
                                    while ($rowsa = $resultsa->fetch_assoc()) {
                                        ?>
                                        <li>
                                            <a href="#" onclick="document.getElementById('postForm_<?php echo $rowsa['id']; ?>').submit();">
                                                <i class="fa fa-message"></i> <?php echo $rowsa['message']; ?>
                                            </a>
                                            <form id="postForm_<?php echo $rowsa['id']; ?>" action="../php/teacher_notification_file.php" method="POST" style="display:none;">
                                                <input type="hidden" name="id" value="<?php echo $rowsa['id']; ?>">
                                            </form>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- Messages: style can be found in dropdown.less-->
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo htmlspecialchars($row['location']); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $row['name'] . ' ' . $row['surname']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo htmlspecialchars($row['location']); ?>" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $row['name'] . ' ' . $row['surname']; ?>
                                <small></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="../php/teacher_profile.php" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="../php/teacher_logout_file.php" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
</style>
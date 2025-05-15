<?php
include '../database/config.php';

$userID = $_SESSION['userID'];

// Check if user is logged in
if (!isset($_SESSION['userID'])) {
    header("Location: ../php/login.php");
    exit();
}

// Prepare the SQL query
$sql = "SELECT * FROM admin 
        WHERE idno = ?";

// Prepare statement
$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $userID);

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Loop through the result set
$row = $result->fetch_assoc();

?>

<header class="main-header">
    <!-- Logo -->
    <a href="../php/dashboard.php" class="logo" style="text-decoration: none;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>ADM</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b></span>
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
                <!-- Messages: style can be found in dropdown.less-->
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo htmlspecialchars($row['location']); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $row['firstname']. ' '.$row['secondname'];?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo htmlspecialchars($row['location']); ?>" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $row['firstname']. ' '.$row['secondname'];?>
                                <small></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="../php/profile.php" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="../php/logout_file.php" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
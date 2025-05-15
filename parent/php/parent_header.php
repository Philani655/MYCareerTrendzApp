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

?>

<header class="main-header" style="font-family: 'Montserrat', sans-serif;">
    <!-- Logo -->
    <a href="../php/parent_dashboard.php" class="logo" style="text-decoration: none;">
        <span class="logo-mini"><b>MCTz</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="../icons/family.png" width="28"> <b>Parent</b></span>
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
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../icons/bell.png" alt="bell" width="20" height="20">

                        <?php
                        // SQL query to count unread notifications (status = 1)
                        $grade_id = $_SESSION['grade_id'];
                        $learnerId = $_SESSION['learnerId'];
                        
                        // Prepare the statement
                        $sqlntf = "SELECT id, message, COUNT(*) AS total 
                                    FROM `parent_notifications` 
                                    WHERE `status` = 0 AND `grade_id` = ? AND `learner_id` = ? ";
                        $stmtntf = $conn->prepare($sqlntf);
                        $stmtntf->bind_param("is", $grade_id , $learnerId); // "i" means integer type
                        // Execute the statement
                        $stmtntf->execute();
                        $resultntf = $stmtntf->get_result();

                        $count = 0;

                        if ($resultntf->num_rows > 0) {
                            $rowntf = $resultntf->fetch_assoc();
                            $count = $rowntf['total'];
                            ?>
                            <span class="label label-warning"><?php echo $rowntf['total']; ?></span>
                        <?php } ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have <?php echo $count; ?> notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu" style="font-weight: normal">
                                <?php
                                // Query to fetch notification details
                                    $sqlNotifications = "SELECT id, message 
                                                         FROM `parent_notifications` 
                                                         WHERE `status` = 0 AND `grade_id` = ? AND `learner_id` = ? ";
                                    $stmttnf = $conn->prepare($sqlNotifications);
                                    $stmttnf->bind_param("is", $grade_id, $learnerId);
                                    $stmttnf->execute();
                                    $resultnf = $stmttnf->get_result();

                                    if ($resultnf->num_rows > 0) {
                                        while ($rowft = $resultnf->fetch_assoc()) {
                                        ?>
                                        <li>
                                            <a href="../php/view_learner_notifications.php?id=<?php echo $rowft['id']; ?>">
                                                <i class="fa fa-message"></i> <?php echo $rowft['message']; ?>
                                            </a>
                                        </li>
                                    <?php
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img  src="<?php echo htmlspecialchars($row['location']); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $row['name'] . ' ' . $row['surname']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo htmlspecialchars($row['location']); ?>" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $row['name'] . ' ' . $row['surname']; ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="../php/parent_profile.php" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="../php/parent_logout_file.php" class="btn btn-default btn-flat">Sign out</a>
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

     @media only screen and (max-width: 500px) {

        .menu li a {
            width: 300px;
            font-family: "Montserrat", sans-serif;
            font-weight: normal;
        }

        .dropdown-menu, menu{
            text-align: start;
        }
     }

</style>

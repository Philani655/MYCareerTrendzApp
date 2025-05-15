<?php
session_start();
include_once '../database/config.php';
$userID = $_SESSION['userID'];
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.css">
    <link rel="stylesheet" href="../css/profile_file.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/error_message.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body >
    <?php
    if (empty($userID)) {
        echo "<script>window.location.href='../php/login.php';</script>";
        exit();
    } else {
        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT * FROM admin WHERE idno = ?");
        $stmt->bind_param("s", $userID); // 's' indicates the parameter is a string
        // Execute the query
        $stmt->execute();

        $idNumber =$userID;
        // Get the result
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="d-flex justify-content-center align-items-center vh-100">
                    <!-- Profile Card -->
                    <div class="profile-card card text-center shadow-sm p-3" style="width: 350px;">
                        <div class="card-body">
                            <div class="profile-image-container mb-3">
                                <img src="<?php echo htmlspecialchars($row['location']); ?>" alt="Update Profile" class="profile-image rounded-circle" width="100"/>
                            </div>
                            <h2 class="card-title"><?php echo $row['firstname'] . ' ' . $row['secondname']; ?></h2>
                            <p ><strong>ID Number:</strong><?php echo $row['idno']; ?> </p>
                            <p ><strong>Email Address:</strong> <?php echo $row['email']; ?></p>
                            <p ><strong>Contact No:</strong> <?php echo $row['contactno']; ?></p>
                            <?php
                        }
                    }
                    // Close the statement and connection
                    $stmt->close();
                    $conn->close();
                }
                ?>
                <div class="d-flex justify-content-center gap-3">
                    <button class="btn btn-danger close-btn" onclick="window.location.href = '../php/dashboard.php'">Close</button>
                    <button class="btn btn-success update-btn" data-bs-toggle="modal" data-bs-target="#addnew">Update</button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100 text-center" id="modalLabel">Profile</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Scrollable Form -->
                    <div class="modal-body">
                       <form id="nameForm" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="idNumber" class="form-label">ID Number:</label>
                                <input type="hidden" name="idNumber" value="<?php echo $idNumber; ?>">
                                <input type="text" class="form-control" id="idNumber" value="<?php echo $idNumber; ?>" readonly required>
                                <span id="idNumber-error" class="error-message" ></span><!-- Error message inside the field -->
                            </div>

                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name:</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" >
                                <span id="firstName-error" class="error-message" ></span><!-- Error message inside the field -->
                            </div>

                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name:</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" >
                                <span id="lastName-error" class="error-message" ></span><!-- Error message inside the field -->
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address:</label>
                                <input type="email" class="form-control" id="email" name="email" >
                                <span id="email-error" class="error-message" ></span><!-- Error message inside the field -->
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" >
                                <span id="password-error" class="error-message"></span><!-- Error message inside the field -->
                            </div>

                            <div class="mb-3">
                                <label for="cell" class="form-label">Contact No:</label>
                                <input type="text" class="form-control" id="cell" name="cell" >
                                <span id="cell-error" class="error-message" ></span><!-- Error message inside the field -->
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Image:</label>
                                <input type="file" class="form-control" name="image" id="image" >
                                <span id="image-error" class="error-message" ></span><!-- Error message inside the field -->
                            </div>
                            <!-- Fixed Footer -->
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="add" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Optional JavaScript -->
    <script src="../javascript/profile.js"></script>
    <?php include '../php/footer.php'; ?>
</body>
</html>

<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <?php include '../php/head.php'; ?>
    <body>
        <div class="hold-transition skin-blue sidebar-mini">
            <?php include '../php/header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/aside_nav.php'; ?>
            <br><br>
            <div class="container">
                <h2 class="page-header text-center">Class</h2>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="row">
                            <?php
                            if (isset($_SESSION['error'])) {
                                echo
                                "
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						" . $_SESSION['error'] . "
					</div>
					";
                                unset($_SESSION['error']);
                            }
                            if (isset($_SESSION['success'])) {
                                echo
                                "
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						" . $_SESSION['success'] . "
					</div>
					";
                                unset($_SESSION['success']);
                            }
                            ?>
                        </div>
                        <div class="row">
                            <a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New</a>
                            <a href="print_pdf.php" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> PDF</a>
                        </div>
                        <p></p>
                        <div class="height10">
                        </div>
                        <div class="row">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Class Name</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once('connection.php');
                                    $sql = "SELECT * FROM members";

                                    //use for MySQLi-OOP
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()) {
                                        echo
                                        "<tr>
									<td>" . $row['id'] . "</td>
									
									<td>" . $row['address'] . "</td>
									<td>
										<a href='#edit_" . $row['id'] . "' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
										<a href='#delete_" . $row['id'] . "' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
									</td>
								</tr>";
                                        include('class_edit_delete_modal.php');
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('../php/class_add_modal.php') ?>
        <?php include '../javascript/script.js';?>
    <footer>
        <center>
        <footer style="margin-top: 30px;">
            <img src="../images/footer.jpg" alt="portfolio">                
        </footer>
    </center>
</html>
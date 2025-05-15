<!DOCTYPE html>
<html>
    <?php include '../php/head.php'; ?>
    <body>
        <div class="hold-transition skin-red sidebar-mini">
            <?php include '../php/header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/aside_nav.php'; ?>
            <br><br>
            <div class="container">
                <h2 class="page-header text-center"><b>Adding School Under Learner</b></h2>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="row">
                            <a href="#" onclick="window.print()" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> PDF</a>
                        </div>
                        <p></p>
                        <div class="height10">
                        </div>
                        <div class="row">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <th>No.</th>
                                <th>ID Number</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Status</th>
                                <th>ACTION</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `learner_admission`";

                                    $result = $conn->query($sql);
                                    $count = 0;
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $count++;
                                            ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $row['idno']; ?></td>
                                                <td><?php echo $row['firstname']; ?></td>
                                                <td><?php echo $row['secondname']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td><a href="../php/school_add_learner.php?id=<?php echo $row['id']; ?>&idno=<?php echo $row['idno'];?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Add School</a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include '../javascript/script.js';
        ?>
    </body>
    <center>
        <footer style="margin-top: 30px;">
            <img src="../images/footer.jpg" alt="portfolio">                
        </footer>
    </center>
</html>
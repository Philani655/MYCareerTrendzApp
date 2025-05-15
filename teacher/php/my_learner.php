<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <?php include '../php/teacher_header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/page_nav.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header no-print">
                    <h1>
                        School Year: <?php
                        $currentYear = date('Y');
                        $nextYear = $currentYear + 1;
                        $yearRange = $currentYear . '-' . $nextYear;
                        echo $yearRange;
                        ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../php/dashboard.php?"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">My learner</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border no-print">
                                    <h3 class="box-title"><img src="../icons/learner.png" width="25"> Learner</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="" style="margin-top: 10px;">
                                                <!-- Send message to a clicked learner through a checkbox click and the learner is not clicked on the checkbox it must return nothing-->
                                                <form action="../php/send_learner_message_file.php" method="post">
                                                    <!-- ✅ Button to trigger the modal -->
                                                    <div class="row">
                                                        <button style="margin-left: 30px;"type="button" class="btn btn-primary no-print" id="sendButton" data-toggle="modal" data-target="#exampleModal">
                                                            <i class="fa fa-message" aria-hidden="true"></i> Send Message
                                                        </button>  
                                                        <button style="margin-left: 800px;"type="button no-print" class="btn btn-primary no-print" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                                                    </div>
                                                    <div class="modal fade no-print" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="exampleModalLabel">Sent message </h4>                                                            
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label for="message-text" class="control-label">Message:</label>
                                                                        <textarea name="message" class="form-control" id="message-text" rows="4" required></textarea>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Send message</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="chart no-print">
                                                        <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th><i class="fa-solid fa-square-pen"></i></th>
                                                                    <th>Surname and initials</th>
                                                                    <th>Role</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                include '../database/config.php';

                                                                $subjectName = $_SESSION['subjectname']; // Example for GET request
                                                                $subjectCode = $_SESSION['subjectcode'];
                                                                $gradeId = $_SESSION['grade_id'];

                                                                // Prepare the SQL statement
                                                                $sql = "SELECT 
                                                                        l.idno AS idno,
                                                                        l.name AS name,
                                                                        l.surname AS surname,
                                                                        la.initials AS initials
                                                                    FROM 
                                                                        learner l,
                                                                        learner_admission la,
                                                                        subjects s
                                                                    WHERE 
                                                                        l.idno = la.idno 
                                                                        AND s.learner_id = l.idno
                                                                        AND l.grade_id = s.grade_id
                                                                        AND s.subjectname = ?
                                                                        AND s.subjectcode = ?
                                                                        AND s.grade_id = ?";

                                                                // Prepare and bind
                                                                $stmt = $conn->prepare($sql);
                                                                $stmt->bind_param("ssi", $subjectName, $subjectCode, $gradeId); // "ssi" → string, string, integer
                                                                // Execute the statement
                                                                $stmt->execute();

                                                                // Get the result
                                                                $result = $stmt->get_result();

                                                                $count = 0;
                                                                // Check if rows are found
                                                                if ($result->num_rows > 0) {
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        $count++;
                                                                        ?>
                                                                        <tr>
                                                                            <td><input type="checkbox" name="learners_id[]" value="<?php echo $row['idno']; ?>"></td>
                                                                            <td><?php echo $row['surname'] . ' ' . $row['initials'] ?></td>
                                                                            <td>Learner</td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    
                                                <form>
                                            </div>
                                            <p class="no-print">Total Learner:<?php echo $count ?> </p>
                                        </div><!-- /.col -->

                                        <!-- Print the clicked learner -->
                                                

                                                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="exampleModalLabel">Class List</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table ">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">Surname, initials</th>
                                                                            <th scope="col">Role</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="table-group-divider">
                                                                        <?php
                                                                        include '../database/config.php';

                                                                        $subjectName = $_SESSION['subjectname']; // Example for GET request
                                                                        $subjectCode = $_SESSION['subjectcode'];
                                                                        $gradeId = $_SESSION['grade_id'];

                                                                        // Prepare the SQL statement
                                                                        $sql = "SELECT 
                                                                        l.idno AS idno,
                                                                        l.surname AS surname,
                                                                        la.initials AS initials
                                                                    FROM 
                                                                        learner l,
                                                                        learner_admission la,
                                                                        subjects s
                                                                    WHERE 
                                                                        l.idno = la.idno 
                                                                        AND s.learner_id = l.idno
                                                                        AND l.grade_id = s.grade_id
                                                                        AND s.subjectname = ?
                                                                        AND s.subjectcode = ?
                                                                        AND s.grade_id = ?";

                                                                        // Prepare and bind
                                                                        $stmt = $conn->prepare($sql);
                                                                        $stmt->bind_param("ssi", $subjectName, $subjectCode, $gradeId); // "ssi" → string, string, integer
                                                                        // Execute the statement
                                                                        $stmt->execute();

                                                                        // Get the result
                                                                        $result = $stmt->get_result();
                                                                        $count = 0;
                                                                        // Check if rows are found
                                                                        if ($result->num_rows > 0) {
                                                                            while ($row = $result->fetch_assoc()) {
                                                                                $count++;
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?php echo $row['surname'] . ' ' . $row['initials']; ?></td>
                                                                                    <td>Learner</td>
                                                                                </tr>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default no-print" data-dismiss="modal">Close</button>
                                                                <!-- printPage() must print the checked learner -->
                                                                <button type="button" class="btn btn-primary no-print" onclick="printPage()"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div><!-- /.row -->
                                </div><!-- ./box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php include '../php/footer.php'; ?>

            <?php include '../javascript/script.js'; ?>

            <script>
                function printPage() {
                    window.print();
                }
            </script>

            <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
            <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap.js"></script>
            <script>
                new DataTable('#example');
            </script>

            <style>

                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

                body {
                    font-family: "Montserrat", sans-serif;
                }

            </style>

    </body>
</html>

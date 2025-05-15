<html>
    <?php include './head.php'; ?>
    <link rel="stylesheet" href="../css/result_table_score.css">
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <?php include '../php/header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/aside_nav.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        School Year: <?php
                        $currentYear = date('Y');
                        $nextYear = $currentYear + 1;
                        $yearRange = $currentYear . '-' . $nextYear;
                        echo $yearRange;
                        ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../php/learner_dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Progress</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../../image/result(1).png" alt="result" width="25"> Quarterly Report</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <?php
                                            include '../database/config.php';

                                            $idNumber = $_SESSION['idNumber'];
                                            $grade_id = $_SESSION['grade_id'];

                                            // Prepare the SQL query
                                            $sql = "
                                                SELECT 
                                                    sfm.id AS id,
                                                    sfm.final_mark AS final_mark,
                                                    t.term_name AS term_name,
                                                    su.subjectname AS subjectname
                                                FROM 
                                                    subject_final_mark sfm
                                                JOIN 
                                                    term t ON t.id = sfm.term_id
                                                JOIN 
                                                    subjects su ON su.id = sfm.subject_id
                                                JOIN 
                                                    grade g ON g.id = sfm.grade_id
                                                WHERE 
                                                    sfm.grade_id = ?
                                                    AND sfm.learner_id = ?
                                            ";

                                            // Prepare and bind parameters
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bind_param("is", $grade_id, $idNumber);
                                            // "ii" = two integers
                                            // Execute the query
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            ?>
                                            <div class="">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Term.</th>
                                                            <th>Subject</th>
                                                            <th>Final Mark</th>
                                                            <th>Result</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 0;
                                                        if ($result->num_rows > 0):
                                                            ?>
                                                            <?php while ($row = $result->fetch_assoc()):
                                                                $count++
                                                                ?>
                                                                <tr class="<?php echo $row['final_mark'] >= 50 ? 'pass' : 'fail'; ?>">
                                                                    <td data-label="Term"><?php echo $row['term_name']; ?></td>
                                                                    <td data-label="Subject"><?php echo $row['subjectname']; ?></td>
                                                                    <td data-label="Final Mark"><?php echo ($row['final_mark'] === null) ? '<b>No Marks</b>' : $row['final_mark']; ?></td>
                                                                    <td data-label="Result">
                                                                    <?php echo $row['final_mark'] >= 50 ? '<b>Pass</b>' : '<b>Fail</b>'; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                            <?php else: ?>
                                                            <tr>
                                                                <td colspan="5" style="text-align: center;">No records found</td>
                                                            </tr>
<?php endif; ?>
                                                    </tbody>
                                                </table>

                                            </div><!-- /.chart-responsive -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div><!-- ./box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php include '../php/footer.php'; ?>         

            <?php include '../javascript/script.js'; ?>

            <style>

            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

                body {
                    font-family: "Montserrat", sans-serif;
                }

            </style>
    </body>
</html>

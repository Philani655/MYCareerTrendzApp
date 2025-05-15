<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

    .info-box{
        border-radius: 5px;
        box-shadow: 0 2px 0 5px rgba(0, 0, 0, .1);
        background: azure;
        transition: 1s;
    }

    .info-box:hover{
        transform: scale(1.1);
        z-index: 1;
    }

    a{
        color: #333;
    }

    a:hover{
        color: #333;
        text-decoration: none;
    }

</style>

<div class="row">
    <?php
    include '../database/config.php';

    $idNumber = $_SESSION['idNumber'];

    if (!isset($_SESSION['idNumber'])) {
        echo "<script>alert('Something went wrong');</script>";
        echo "<script>window.location.href='../php/learner_dashboard.php'</script>";
        exit();
    }

    // Prepare the SQL query
    $sql = "SELECT s.id as id, s.subjectname as subjectname, s.subjectcode as subjectcode, s.grade_id as grade_id ,g.grade_name as grade_name 
            FROM subjects s 
            JOIN learner l ON l.grade_id = s.grade_id   
            JOIN grade g ON l.grade_id = g.id 
            WHERE s.learner_id = ?
            GROUP by s.id ,  s.subjectname , s.subjectcode , s.grade_id ";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("s", $idNumber);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        // Loop through and display the results
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-5 col-sm-6 col-xs-12">                    
                <a href="../php/learner_attendance_file.php?id=<?php echo $row['id']?>&subjectname=<?php echo $row['subjectname']?>&subjectcode=<?php echo $row['subjectcode']?>&grade_name=<?php echo $row['grade_name']?>&grade_id=<?php echo $row['grade_id']?>" >
                    <div class="info-box">
                        <span class="info-box-icon">
                            <img src="../../image/tree.jpg" alt="User Image"></i> <!-- subject image -->
                        </span>
                        <div class="info-box-content" style="font-family: 'Montserrat', sans-serif;">
                            <span class="info-box-text"><?php echo $row['subjectname'] ?></span>
                            <span class="info-box-text"><?php echo $row['subjectcode'] ?></span>
                            <span class="info-box-number" style="text-transform: capitalize;"><?php echo $row['grade_name'] ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </a>
            </div><!-- /.col -->
            <?php
        }
    } else {
        ?>
            <p>You have no subjects</p>
        <?php
    }
    $stmt->close();
    ?>
</div>
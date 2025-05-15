<?php
include '../database/config.php';

$subjectname = $_SESSION['subjectname'];
$subjectcode = $_SESSION['subjectcode'];
$grade_id = $_SESSION['grade_id'];

if (!isset($_SESSION['subjectname'])) {
    echo "<script>window.location.href='../php/my_classes.php';</scrpt>";
    exit();
}

// Prepare the SQL query using prepared statements
$sqlt = "SELECT 
            s.id AS id , 
            lc.id AS topic_id , 
            lc.content AS content 
        FROM topics lc 
        JOIN subjects s ON s.id = lc.subject_id
        WHERE s.subjectname = ? 
        AND s.subjectcode = ? 
        AND lc.grade_id = ? ";

$stmtt = $conn->prepare($sqlt);
$stmtt->bind_param("ssi", $subjectname, $subjectcode, $grade_id);

// Execute the query
$stmtt->execute();
$resultt = $stmtt->get_result();
if ($resultt->num_rows > 0) {
    while ($rowt = $resultt->fetch_assoc()) {
        ?>
        <!-- Display announcements -->
        <div class="container-fluid">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                        
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration: none; color: #fff;">
                                <?php echo $rowt['content']; ?>
                            </a>
                            
                        </h4>
                    </div>

                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="list-group">
                            <?php
                            // Prepare the SQL query using prepared statements
                            $sql = "SELECT * FROM lesson_content WHERE topic_id = ? ";

                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("i", $rowt['topic_id']);

                            // Execute the query
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $count = 0;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $count++;
                                    ?>
                                        <a href="../php/lesson_page.php?topic_id=<?php echo $rowt['topic_id'];?>&lesson_content_id=<?php echo $row['id']?>" class="list-group-item list-group-item-action" style="color: #006FBF; font-size: 15px;"><?php echo $row['content']; ?></a>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div><?php
    }
} else {
    ?>   
    <div class="container-fluid">
        <p>There are no lessons to display.</p>
    </div><?php
}
$stmtt->close();
?>

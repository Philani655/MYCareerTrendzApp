<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">NAME</th>
            <th scope="col" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">DESCRIPTION</th>
            <th scope="col" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">ACTION</th>
        
        </tr>
    </thead>
    <tbody>
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
        $sql = "SELECT * 
                FROM lesson_video lv 
                JOIN subjects s ON s.id = lv.subject_id
                WHERE s.subjectname = ? 
                AND s.subjectcode = ? 
                AND lv.grade_id = ? 
                AND lv.topic_id = ? 
                AND lv.lesson_content_id = ? ";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssii", $subjectname, $subjectcode, $grade_id, $topic_id , $lesson_content_id);

        // Execute the query
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                ?>

                <tr>
                    <td><?php echo $row['video_name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <a href="../php/video_learner_uploided.php?video_name=<?php echo $row['video_name'];?>&video_path=<?php echo $row['video_path'];?>" class="btn btn-primary"><i class="fa-solid fa-eye"></i> View</a>
                    </td>
                </tr>

                <?php
            }
        } else {
            ?>
            <tr>
                <td>No video uploaded!</td>
            </tr><?php
        }
        ?>
    </tbody>
</table>

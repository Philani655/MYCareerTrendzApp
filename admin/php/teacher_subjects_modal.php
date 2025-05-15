<!-- Modal -->
<div class="modal fade" id="status<?php echo $row['idno']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">MY SUBJECTS</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="../php/view_my_learners_page.php">
                    <div class="progress-group">
                        <label>Subjects</label>
                        <select name="subject_id" required="" class="form-control">
                            <option selected="" disabled="">-- My Subjects --</option>
                            <?php
                            include '../database/config.php';
                            // Prepare the SQL query
                            $sqlTeacher = "SELECT * FROM subjects WHERE learner_id = ?";
                            $stmtTeacher = $conn->prepare($sqlTeacher);
                            $stmtTeacher->bind_param("s", $row['idno']);
                            $stmtTeacher->execute();
                            $resultTeacher = $stmtTeacher->get_result();

                            // Fetch and display data
                            if ($resultTeacher->num_rows > 0) {
                                while ($rowTeacher = $resultTeacher->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $rowTeacher['id']; ?>"><?php echo $rowTeacher['subjectname']; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <div>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">View Learners</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

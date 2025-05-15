<!-- Modal -->
<div class="modal fade" id="marks<?php echo $row['idno']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Term Marks</h4>
            </div>
            <div class="modal-body" style="margin-top: -10px;">
                <form method="POST" action="../php/teacher_result_option_path_file.php">
                    <div class="progress-group">
                        <label>Terms:</label>
                        <select name="term_id" required="" class="form-control">
                            <option selected="" disabled="">-- Please select term --</option>
                            <?php
                            include '../database/config.php';

                            // Prepare the query
                            $sqlTerm = "SELECT * FROM `term`";
                            $stmtTerm = $conn->prepare($sqlTerm);
                            $stmtTerm->execute();
                            $resultTerm = $stmtTerm->get_result();

                            if ($resultTerm->num_rows > 0) {
                                while ($rowTerm = $resultTerm->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $rowTerm['id']; ?>"><?php echo $rowTerm['term_name']; ?></option>
                                    <?php
                                }
                            } else {
                                ?><option disabled="" selected="">No selection</option><?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="progress-group" style="margin-top: 5px;">
                        <label>Marks for :</label>
                        <select name="view" required="" class="form-control">
                            <option selected="" disabled="">-- Please select --</option>
                            <option value="online_test">Online Tests</option>
                            <option value="class_test">Class Test</option>
                            <option value="assignments">Assignments</option>
                            <option value="exam">Exam</option>
                        </select>
                    </div>
                    <br>
                    <div>
                        <input type="hidden" name="learnerId" value="<?php echo $row['idno']; ?>">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Process</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Grade Update</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="../php/teacher_grade_edit_file.php">
                    <div class="progress-group">
                        <label>Change grade</label>
                        <select name="grade" required="" class="form-control">
                            <option selected="" disabled="">-- Please select grade --</option>
                            <option value="8">Grade 8</option>
                            <option value="9">Grade 9</option>
                            <option value="10">Grade 10</option>
                            <option value="11">Grade 11</option>
                            <option value="12">Grade 12</option>
                        </select>
                    </div>
                    <br>
                    <div>
                        <input type="hidden" name="idno" value="<?php echo $row['idno']; ?>">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Process</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

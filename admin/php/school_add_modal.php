<!-- Modal -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">School</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="../php/school_add_file.php">
                    <div class="progress-group">
                        <label>School is added under:</label>
                        <select name="user" required="" class="form-control">
                            <option selected="" disabled="">-- Select user --</option>
                            <option value="learner">Learner</option>
                            <option value="teacher">Teacher</option>
                        </select>
                    </div>
                    <br>
                    <div>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Process</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

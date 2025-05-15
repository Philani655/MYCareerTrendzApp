<!-- Modal -->
<div class="modal fade" id="status<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">UPDATE LEARNER STATUS</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="../php/track_learner_admission_modal_file.php">
                    <div class="progress-group">
                        <label>Change status</label>
                        <select name="status" class="form-control" required="">
                            <option selected="" disabled="">-- Please select status --</option>
                            <option value="Pending">Pending</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                    <br>
                    <div>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="idno" value="<?php echo $row['idno']; ?>">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Process</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"> Subjects</h4>
            </div>
            <div class="modal-body">
                View the subject that you want to delete <b><?php echo $row['surname'].' '.$row['name'];?></b>
            </div>
            <div class="modal-footer">
                <form method="POST" action="../php/teacher_subject_delete_page.php">
                    <input type="hidden" name="idno" value="<?php echo $row['idno']; ?>">
                    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="surname" value="<?php echo $row['surname']; ?>">
                    <input type="hidden" name="grade_id" value="<?php echo $row['grade_id']; ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">View</button>
                </form>
            </div>
        </div>
    </div>
</div>

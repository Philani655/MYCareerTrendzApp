<!-- Add New -->
<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"><img src="../icons/changes.png" alt="change" width="20"> UPDATE TIMETABLE</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="../php/admin_timetable_edit_file.php">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Grade:</label>
                            </div>
                            <div class="col-sm-10">
                                <select id="dropdown" name="grade" class="form-control" required="">
                                    <option value="">---Select Grade---</option>
                                    <option value="8">Grade 8</option>
                                    <option value="9">Grade 9</option>
                                    <option value="10">Grade 10</option>
                                    <option value="11">Grade 11</option>
                                    <option value="12">Grade 12</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-20">
                                <textarea name="content" class="ckeditor" required=""></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <input type="hidden" name="grade_id" value="<?php echo $row['grade_id'];?>">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                            <button type="submit" name="add" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Update</a>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>
<style>

    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

    .modal {
        font-family: "Montserrat", sans-serif;
    }

</style>


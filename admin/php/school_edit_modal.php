<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"><img src="../icons/changes.png" alt="change" width="20"> UPDATE SCHOOL</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="school_edit_file.php">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label modal-label">School Name:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="schoolName" >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label modal-label">Address :</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="address">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label modal-label">Suburb :</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="suburb" >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label modal-label">Postal Code:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="postalCode" >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label modal-label">Office Email :</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="officeEmail" >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label modal-label">Office Contact No :</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="officeNumber" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                            <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
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
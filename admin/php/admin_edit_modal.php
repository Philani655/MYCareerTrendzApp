<!-- Add New -->
<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"><img src="../icons/changes.png" alt="changes" width="20"> UPDATE ADMINISTRATION USER</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="admin_edit_file.php" enctype="multipart/form-data">
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label modal-label">ID Number:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="hidden" name="idNumber" value="<?php echo $row['idno']; ?>">
                                <input type="text" class="form-control"  value="<?php echo $row['idno']; ?>" disabled="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label modal-label">First Name:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="firstName" required="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label  class="control-label modal-label">Last Name:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lastName" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label  class="control-label modal-label">Password:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="password" class="form-control"  name="password" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label  class="control-label modal-label">Email:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label for="cell" class="control-label modal-label">Contact No:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="cell" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label modal-label">Upload Image</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="file" name="image" accept=".jpg, .jpeg, .png, .gif" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" value="<?php echo $row['id']?>">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-edit"></span> Save</a>
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

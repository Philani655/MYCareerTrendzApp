<!-- Add New -->
<div class="modal fade" id="myProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add Administration User</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="add.php">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Username:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" required>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">First Name:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="firstName" required>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Last Name:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lastName" required>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Password:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label modal-label">Upload Image</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="file"  name="image" required>
                            </div>
                        </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
                    </form>
            </div>

        </div>
    </div>
</div>
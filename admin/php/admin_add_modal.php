<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"><img src="../icons/add-1.png" alt="add" width="20"> ADMINISTRATION USER</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="adminForm" method="POST" action="admin_add_file.php" onsubmit="return isAdmin()" enctype="multipart/form-data">
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label for="idNumber" class="control-label modal-label">ID Number:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="idNumber" name="idNumber" >
                                <span id="idNumber-error" class="error-message"></span>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label for="firstName" class="control-label modal-label">First Name:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="firstName" name="firstName" >
                                <span id="firstName-error" class="error-message"></span>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label for="lastName" class="control-label modal-label">Last Name:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lastName" name="lastName" >
                                <span id="lastName-error" class="error-message"></span>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label for="password" class="control-label modal-label">Password:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" >
                                <span id="password-error" class="error-message"></span>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label for="email" class="control-label modal-label">Email:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" >
                                <span id="email-error" class="error-message"></span>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label for="cell" class="control-label modal-label">Contact No:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cell" name="cell" >
                                <span id="cell-error" class="error-message"></span>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label modal-label">Upload Image</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image" id="image" accept=".jpg, .jpeg, .png, .gif">
                                <span id="image-error" class="error-message"></span>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span> Cancel
                            </button>
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-floppy-edit"></span> Save
                            </button>
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



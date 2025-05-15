<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Subject Overview</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="adminForm" method="POST" action="../php/subject_overview_file.php">
                        <div class="form-group">
                            <label for="message-text" class="control-label">Message:</label>
                            <textarea class="form-control" name="message" required="" id="message-text" rows="4"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-floppy-edit"></span> Done
                            </button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>
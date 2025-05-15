<!-- Modal -->
<div class="modal fade" id="addClass" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add Grade</h4>
            </div>
           
            <div class="modal-body">
                <form method="POST" action="../php/add_class_file.php">
                    <div class="progress-group" style="margin-bottom: 20px;">
                        <label for="gradeNo">Grade Name:</label>
                        <select name="gradeNo" required="" class="form-control">
                            <option selected="" disabled="">-- Please select grade--</option>
                            <option value="8">Grade 8</option>
                            <option value="9">Grade 9</option>
                            <option value="10">Grade 10</option>
                            <option value="11">Grade 11</option>
                            <option value="12">Grade 12</option>
                        </select>
                    </div>
                    
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Add Grade</button>
                </form>
            </div>
        </div>
    </div>
</div>

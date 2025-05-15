<!-- Modal -->
<div class="modal fade" id="add<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">SUBJECTS</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="../php/learner_subject_edit_file.php" enctype="multipart/form-data">
                    <div>
                        <label>Choose subject</label>
                        <select name="subject[]" id="subject" multiple>
                            <option value="Accounting">Accounting</option>
                            <option value="Afrikaans">Afrikaans</option>
                            <option value="Agricultural Sciences">Agricultural Sciences</option>
                            <option value="Business Studies">Business Studies</option>
                            <option value="Civil Technology">Civil Technology</option>
                            <option value="Computer Applications Technology">Computer Applications Technology (CAT)</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Consumer Studies">Consumer Studies</option>
                            <option value="Dance Studies">Dance Studies</option>
                            <option value="Drama">Drama</option>
                            <option value="Economics">Economics</option>
                            <option value="Economic Manangement Science">Economic Manangement Science</option>
                            <option value="Electrical Technology">Electrical Technology</option>
                            <option value="Engineering Graphics and Design">Engineering Graphics and Design (EGD)</option>
                            <option value="English First Additional Language">English First Additional Language</option>
                            <option value="English Home Language">English Home Language</option>
                            <option value="Geography">Geography</option>
                            <option value="History">History</option>
                            <option value="Hospitality Studies">Hospitality Studies</option>
                            <option value="Information Technology">Information Technology</option>
                            <option value="isiNdebele">IsiNdebele</option>
                            <option value="isiZulu Home Language">IsiZulu Home Language</option>
                            <option value="isiZulu First Additional Language">IsiZulu First Additional Language (FAL)</option>
                            <option value="isiXhosa">IsiXhosa</option>
                            <option value="Life Sciences">Life Sciences</option>
                            <option value="Life Orientation">Life Orientation</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Mathematics Literacy">Mathematics Literacy</option>
                            <option value="Music">Music</option>
                            <option value="Physical Science">Physical Science</option>
                            <option value="Sepedi">Sepedi</option>
                            <option value="Sesotho">Sesotho</option>
                            <option value="Setswana">Setswana</option>
                            <option value="siSwati">siSwati</option>
                            <option value="Tshivenda">Tshivenda</option>
                            <option value="Tourism">Tourism</option>
                            <option value="Visual Arts">Visual Arts</option>
                            <option value="Xitsonga">Xitsonga</option>
                            <option value="Natural Sciences">Natural Sciences</option>
                            <option value="Social Sciences">Social Sciences</option>
                            <option value="Technology">Technology</option>
                    </select>
                    </div>
                    <br>
                    <div>
                        <input type="hidden" name="idno" value="<?php echo $row['idno']; ?>">
                        <input type="hidden" name="grade_id" value="<?php echo $row['grade_id']; ?>">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Process</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

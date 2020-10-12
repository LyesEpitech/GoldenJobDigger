<?php

    
//skills domain

echo '<form method="POST" enctype="multipart/form-data">
<div class="modal-body" id="modalBodySignUp">
    <div class="form-group">
        <label for="InputTitle">Title</label><i class="fas fa-info-circle"></i>
        <input name="title" type="text" class="form-control" id="InputTitle" placeholder="Ads Title">
    </div>
    <div class="form-group">
        <label for="InputDescription">Description</label><i class="fas fa-info-circle"></i>
        <textarea name="FirstNameSignUp" class="form-control" id="InputDescription" placeholder="Whrite a short description of the job and tasks"></textarea>
    </div>
    <div class="form-group">
        <label for="InputSkills">Skills</label><i class="fas fa-info-circle"></i>
        <input name="skills" type="text" class="form-control" id="InputSkills" placeholder="Some skill">
        <button type="button" class="btn btn-secondary" onclick="addSkill()">Add</button>
    </div>
    <div class="form-group">
    <p id="showSkills"></p>
    </div>
    <div class="form-group">
        <label for="inputLevel">Job Type</label>
        <select name="level" id="inputLevel" class="form-control">
            <option selected>Bac</option>
            <option>Bac +1</option>
            <option>Bac +2</option>
            <option>Bac +3</option>
            <option>Bac +4</option>
            <option>Bac +5</option>
            <option>+ de Bac +5</option>
        </select>
    </div>
    <div class="form-group">
        <label for="inputJobType">Job Type</label>
        <select name="jobType" id="inputJobType" class="form-control">
            <option selected>CDI</option>
            <option>CDD</option>
            <option>Alternance</option>
            <option>Stage</option>
        </select>
    </div>
    <div class="form-group">
        <label for="InputStartDate">Start Date</label>
        <input name="startDate" type="date" class="form-control" id="InputStartDate">
    </div>
    <div class="form-group form-check">
        <input name="TermsSignUp" type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Accept Terms</label>
        <i class="fas fa-info-circle"></i>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button name="SubmitSignUp" type="submit" class="btn btn-primary">Submit</button>
</div>
</form>';
?>
<?php
$error = "";
if (isset($_POST['SubmitAds'])) {
    if(isset($_POST['title']) AND isset($_POST['description']) AND isset($_POST['skillsList']) AND isset($_POST['DomainsList']) AND isset($_POST['level']) AND isset($_POST['jobType']) AND isset($_POST['startDate']) AND isset($_POST['terms'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $skillsList = $_POST['skillsList'];
        $domainsList = $_POST['DomainsList'];
        $level = $_POST['level'];
        $jobType = $_POST['jobType'];
        $startDate = $_POST['startDate'];
        $request = $dbh->exec('INSERT INTO ads (title, description, skills, domain, level, jobType, startDate, companies_id) VALUES ("'.$title.'", "'.$description.'", "'.$skillsList.'", "'.$domainsList.'", "'.$level.'", "'.$jobType.'", "'.$startDate.'", "'.$_COOKIE["id"].'")');
        echo('INSERT INTO ads (title, description, skills, domain, level, jobType, startDate, companies_id) VALUES ("'.$title.'", "'.$description.'", "'.$skillsList.'", "'.$domainsList.'", "'.$level.'", "'.$jobType.'", "'.$startDate.'", "'.$_COOKIE["id"].'")');
    }else{
        $error = "Fill all blanks.";
    }
}

echo $error;
    
//skills domain

echo '<form method="POST" enctype="multipart/form-data" id="form">
<div class="modal-body" id="modalBodySignUp">
    <div class="form-group">
        <label for="InputTitle">Title</label><i class="fas fa-info-circle"></i>
        <input name="title" type="text" class="form-control" id="InputTitle" placeholder="Ads Title">
    </div>
    <div class="form-group">
        <label for="InputDescription">Description</label><i class="fas fa-info-circle"></i>
        <textarea name="description" class="form-control" id="InputDescription" placeholder="Whrite a short description of the job and tasks"></textarea>
    </div>
    <div class="form-group">
        <label for="InputSkills">Skills</label><i class="fas fa-info-circle"></i>
        <input name="skills" type="text" class="form-control" id="InputSkills" placeholder="Some skill">
        <button type="button" class="btn btn-secondary" onclick="addSkill()">Add</button>
        <div class="form-group" id="showSkills">
        </div>
        <input style="display:none;" name="skillsList" value="" type="text" class="form-control" id="InputSkillsList">
    </div>
    <div class="form-group">
        <label for="InputDomains">Domains</label><i class="fas fa-info-circle"></i>
        <input name="Domains" type="text" class="form-control" id="InputDomains" placeholder="Job Domain">
        <button type="button" class="btn btn-secondary" onclick="addDomain()">Add</button>
        <div class="form-group" id="showDomains">
        </div>
        <input style="display:none;" name="DomainsList" value="" type="text" class="form-control" id="InputDomainsList">
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
        <input name="terms" type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Accept Terms</label>
        <i class="fas fa-info-circle"></i>
    </div>
</div>
<div class="modal-footer">
    <button id="SubmitAds" name="SubmitAds" type="submit" class="btn btn-primary">Submit</button>
</div>
</form>';

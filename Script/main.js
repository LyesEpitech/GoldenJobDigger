function showCompanies() {
    document.getElementById("modalBodySignUp").innerHTML =
        `<div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="RolesSignUp" id="Radio1" value="People" onchange="showPeople()" >
        <label class="form-check-label" for="Radio1" >People</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="RolesSignUp" id="Radio2" value="Companies" onchange="showCompanies()" checked>
        <label class="form-check-label" for="Radio2">Companies</label>
    </div>
    <div class="form-group">
        <label for="InputEmailCompanies">Email address</label>
        <input name="EmailSignUpCompanies" type="email" class="form-control" id="InputEmailCompanies" placeholder="example@example.com">
    </div>
    <div class="form-group">
        <label for="InputName">Name</label>
        <input name="NameSignUp" type="text" class="form-control" id="InputName" placeholder="Google">
    </div>
    <div class="form-group">
        <label for="InputDescription">Name</label>
        <input name="DescriptionSignUp" type="textarea" class="form-control" id="InputDescription" placeholder="In our entreprise we are nanannana">
    </div>
    <div class="form-group">
        <label for="inputCity">City</label>
        <input name="CitySignUp" type="text" class="form-control" id="inputCity" placeholder="New York">
    </div>
    <div class="form-group">
        <label for="InputPassword1">Password</label>
        <input name="Password1SignUp" type="password" class="form-control" id="InputPassword1" placeholder="p@sSw0rd">
    </div>
    <div class="form-group">
        <label for="InputPassword2">Confirm Password</label>
        <input name="Password2SignUp" type="password" class="form-control" id="InputPassword2" placeholder="p@sSw0rd">
    </div>
    <div class="form-group">
        <label for="InputPic">Your Pic</label>
        <input name="PicSignUp" type="file" class="form-control" id="InputPic" accept="image/">
    </div>
    <div class="form-group form-check">
        <input name="TermsSignUp" type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Accept Terms</label>
    </div>`
}

function showPeople() {
    document.getElementById("modalBodySignUp").innerHTML =
        `<div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="RolesSignUp" id="Radio1" value="People" onchange="showPeople()" checked>
        <label class="form-check-label" for="Radio1" >People</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="RolesSignUp" id="Radio2" value="Companies" onchange="showCompanies()">
        <label class="form-check-label" for="Radio2">Companies</label>
    </div>
    <div class="form-group">
        <label for="InputEmail">Email address</label>
        <input name="EmailSignUp" type="email" class="form-control" id="InputEmail" placeholder="example@example.com">
    </div>
    <div class="form-group">
        <label for="InputFirstName">First name</label>
        <input name="FirstNameSignUp" type="text" class="form-control" id="InputFirstName" placeholder="Bryan">
    </div>
    <div class="form-group">
        <label for="InputLastName">Last name</label>
        <input name="LastNameSignUp" type="text" class="form-control" id="InputLastName" placeholder="Johnson">
    </div>
    <div class="form-group">
        <label for="inputSex">Sex</label>
        <select name="SexSignUp" id="inputSex" class="form-control">
            <option selected>Male</option>
            <option>Female</option>
        </select>
    </div>
    <div class="form-group">
        <label for="InputDate">Phone number</label>
        <input name="DateSignUp" type="date" class="form-control" id="InputDate" >
    </div>
    <div class="form-group">
        <label for="inputAddress">Address</label>
        <input name="AdressSignUp" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-group">
        <label for="inputCity">City</label>
        <input name="CitySignUp" type="text" class="form-control" id="inputCity" placeholder="New York">
    </div>
    <div class="form-group">
        <label for="inputZipCode">Zip Code</label>
        <input name="ZipCodeSignUp" type="text" class="form-control" id="inputZipCode" placeholder="10001">
    </div>
    <div class="form-group">
        <label for="InputPassword1">Password</label>
        <input name="Password1SignUp" type="password" class="form-control" id="InputPassword1" placeholder="p@sSw0rd">
    </div>
    <div class="form-group">
        <label for="InputPassword2">Confirm Password</label>
        <input name="Password2SignUp" type="password" class="form-control" id="InputPassword2" placeholder="p@sSw0rd">
    </div>
    <div class="form-group">
        <label for="InputResume">Your Resume</label>
        <input name="ResumeSignUp" type="file" class="form-control" id="InputResume" accept="application/pdf">
    </div>
    <div class="form-group form-check">
        <input name="TermsSignUp" type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Accept Terms</label>
    </div>`
}

if ((document.cookie).includes("p")) {
    document.getElementById("buttonHeader").innerHTML = `<form class="form-inline my-2 my-lg-0">
    <button class="sign profil btn btn-outline-success my-2 my-sm-0" type="button" onclick="window.location.href='../View/profil.php'">Profil</button>
    <button class="sign deco btn btn-outline-success my-2 my-sm-0" type="button" onclick="redirect()">Deconnexion</button>
    </form>`;
} else if ((document.cookie).includes("a")) {
    document.getElementById("buttonHeader").innerHTML = `<form class="form-inline my-2 my-lg-0">
    <button class="sign profil btn btn-outline-success my-2 my-sm-0" type="button" onclick="window.location.href='../View/admin.php'">Admin Panel</button>
    <button class="sign deco btn btn-outline-success my-2 my-sm-0" type="button" onclick="redirect()">Deconnexion</button>
    </form>`;
} else if ((document.cookie).includes("c")) {
    document.getElementById("buttonHeader").innerHTML = `<form class="form-inline my-2 my-lg-0">
    <button class="sign profil btn btn-outline-success my-2 my-sm-0" type="button" onclick="window.location.href='../View/addAds.php'">Add Ads</button>
    <button class="sign profil btn btn-outline-success my-2 my-sm-0" type="button" onclick="window.location.href='../View/profil.php'">Profil</button>
    <button class="sign deco btn btn-outline-success my-2 my-sm-0" type="button" onclick="redirect()">Deconnexion</button>
    </form>`;
}


function redirect() {
    window.location.replace("../Controler/deconnexion.php");
}

function isset(tvar) {
    if (typeof (tvar) == "undefined") {
        return false;
    } else {
        return true;
    }
}

function showGroup(nb, nbAds) {
    if(nb < nbAds/4 && nb > -1){
        if (!isset(document.getElementById("link" + nb).classList[1])) {
            for (i = 0; i < (nbAds / 4); i++) {
                document.getElementById("group" + i).style.display = "none";
                document.getElementById("link" + i).classList.remove("active");
            }
            document.getElementById("group" + nb).style.display = "inline";
            document.getElementById("link" + nb).classList.add("active");
    
            window.scrollTo(0, 0);
        }
    }
}

function showNextGroup(nbAds) {
    nb = document.getElementsByClassName("page-item active")[0].id;
    nb = nb.slice(-1);
    if (nb.slice(-1) != (nbAds / 4)) {
        showGroup(parseInt(nb) + 1, nbAds);
    }

}

function showPreviousGroup(nbAds) {
    nb = document.getElementsByClassName("page-item active")[0].id;
    nb = nb.slice(-1);
    showGroup(nb - 1, nbAds);
}


function learnMore(nb) {
    var learnMore = document.getElementById("learnMore" + nb);
    var button = document.getElementById("button" + nb);
    if (button.innerHTML == "Show more") {
        button.innerHTML = "Show less";
        learnMore.style.display = "inline";
    } else {
        button.innerHTML = "Show more";
        learnMore.style.display = "none";
    }
}

var skills = [];

function addSkill() {
    var showSkills = document.getElementById("showSkills");
    var skill = document.getElementById("InputSkills").value;
    var SkillsList = document.getElementById("InputSkillsList")

    if (skill != "") {
        skills.push(skill);
        showSkills.innerHTML = "";
        for (i = 0; i < skills.length; i++) {
            showSkills.innerHTML += "<div class='skill' id='skill" + i + "' style='display:inline-block;margin: 5px;'> " + skills[i] + " <a onclick='removeSkill(" + i + ")'><i class='far fa-trash-alt'></i></a></div>";
            SkillsList.value = skills.toString();
        }
        document.getElementById("InputSkills").value = "";
    }
}

function removeSkill(index) {
    var SkillsList = document.getElementById("InputSkillsList")
    document.getElementById("skill" + index).remove();
    skills.splice(index, 1);
    SkillsList.value = skills.toString();
}

var Domains = [];
function addDomain() {
    var showDomains = document.getElementById("showDomains");
    var Domain = document.getElementById("InputDomains").value;
    var DomainsList = document.getElementById("InputDomainsList")

    if (Domain != "") {
        Domains.push(Domain);
        showDomains.innerHTML = "";
        for (i = 0; i < Domains.length; i++) {
            showDomains.innerHTML += "<div class='Domain' id='Domain" + i + "' style='display:inline-block;margin: 5px;'> " + Domains[i] + " <a onclick='removeDomain(" + i + ")'><i class='far fa-trash-alt'></i></a></div>";
            DomainsList.value = Domains.toString();
        }
        document.getElementById("InputDomains").value = "";
    }
}

function removeDomain(index) {
    var DomainsList = document.getElementById("InputDomainsList")
    document.getElementById("Domain" + index).remove();
    Domains.splice(index, 1);
    DomainsList.value = Domains.toString();
}


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
        <i title="8 characters minimum" class="fas fa-info-circle"></i>
    </div>
    <div class="form-group">
        <label for="InputPassword2">Confirm Password</label>
        <input name="Password2SignUp" type="password" class="form-control" id="InputPassword2" placeholder="p@sSw0rd">
        <i title="8 characters minimum" class="fas fa-info-circle"></i>
    </div>
    <div class="form-group">
        <label for="InputPic">Your Pic</label>
        <input name="PicSignUp" type="file" class="form-control" id="InputPic" accept="image/">
    </div>
    <div class="form-group form-check">
        <input name="TermsSignUp" type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Accept Terms</label>
        <a href="../view/RGPD.php">RGPD</a>
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
        <i title="format : XXXXX" class="fas fa-info-circle"></i>
    </div>
    <div class="form-group">
        <label for="InputPassword1">Password</label>
        <input name="Password1SignUp" type="password" class="form-control" id="InputPassword1" placeholder="p@sSw0rd">
        <i title="8 characters minimum" class="fas fa-info-circle"></i>
    </div>
    <div class="form-group">
        <label for="InputPassword2">Confirm Password</label>
        <input name="Password2SignUp" type="password" class="form-control" id="InputPassword2" placeholder="p@sSw0rd">
        <i title="8 characters minimum" class="fas fa-info-circle"></i>
    </div>
    <div class="form-group">
        <label for="InputResume">Your Resume</label>
        <input name="ResumeSignUp" type="file" class="form-control" id="InputResume" accept="application/pdf">
        <i title="PDF file only , do not exced 10 mo" class="fas fa-info-circle"></i>
    </div>
    <div class="form-group form-check">
        <input name="TermsSignUp" type="checkbox" class="form-check-input" id="exampleCheck1">
       <label class="form-check-label" for="exampleCheck1">Accept Terms</label> 
       <a href="../view/RGPD.php">RGPD</a>
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
    if (nb < nbAds / 4 && nb > -1) {
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

function changeCompanies(index) {
    if (document.getElementById("form" + index + "Companies").style.display == "inline") {
        document.getElementById("form" + index + "Companies").style.display = "none"
    } else {
        document.getElementById("form" + index + "Companies").style.display = "inline"
    }
}

function changePeople(index) {
    if (document.getElementById("form" + index + "People").style.display == "inline") {
        document.getElementById("form" + index + "People").style.display = "none"
    } else {
        document.getElementById("form" + index + "People").style.display = "inline"
    }
}

var idAdsGobal;
function showModal(idAds) {
    if ((document.cookie).includes("p")) {
        idAdsGobal = idAds;
        document.getElementById("divModal").innerHTML = `<div style="overflow-y: auto;" class="modal fade" id="PostulerModal" tabindex="-1" role="dialog" aria-labelledby="PostulerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PostulerModalLabel">Postuler</h5>
                <button onclick="hide()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                <div class="form-group">
                <label for="InputEmail1">Email address</label>
                <input name="EmailModal" type="email" class="form-control" id="InputEmail1" placeholder="example@example.com">
            </div>
            <div class="form-group">
                <label for="InputResume">Your Resume</label> <i  title="pdf only , do not exced 10mo"  class="fas fa-info-circle"></i>
                <input name="ResumeModal" type="file" class="form-control" id="InputResume" accept="application/pdf">
            </div>
            <div class="form-group">
            <label for="InputMessage">Your message for companies</label>
            <textarea class="form-control" type="text" name="MessageModal" id="InputMessage" ></textarea>
            </div>
                    
                </div>
                <div class="modal-footer">
                    <button onclick="hide()" type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button name="Postuler" type="submit" class="btn btn-primary" value="`+ idAds + `">Postuler</button>
                </div>
                
            </form>
        </div>
    </div>
</div>`;
        //email	message	resume	id_people	id_companies	id_ads	
        show();
    } else {
        idAdsGobal = idAds;
        document.getElementById("divModal").innerHTML = `<div style="overflow-y: auto;" class="modal fade" id="PostulerModal" tabindex="-1" role="dialog" aria-labelledby="PostulerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PostulerModalLabel">Postuler</h5>
                <button onclick="hide()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                <h5>Vous avez un compte ?</h5>
                <div class="form-group">
                    <label for="InputEmailSignInModal">Email address</label>
                    <input name="EmailSignInModal" type="email" class="form-control" id="InputEmailSignInModal" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="InputPasswordSignInModal">Password</label>
                    <input name="PasswordSignInModal" type="password" class="form-control" id="InputPasswordSignInModal">
                </div>
                <div class="form-group">
                    <label for="InputMessageSignIn">Your message for companies</label>
                    <textarea class="form-control" type="text" name="MessageModalSignIn" id="InputMessageSignIn" ></textarea>
                </div>
                <div class="form-group">
                    <label for="InputResumeSignIn">Your Resume</label> <i  title="dont fill if you want use save resume"  class="fas fa-info-circle"></i>
                    <input name="ResumeModalSignIn" type="file" class="form-control" id="InputResumeSignIn" accept="application/pdf">
                </div>
                <h5>Pas de compte ?</h5>
                <div class="form-group">
                <label for="InputEmail1">Email address</label>
                <input name="EmailModal" type="email" class="form-control" id="InputEmail1" placeholder="example@example.com">
            </div>
            <div class="form-group">
                <label for="InputFirstName">First name</label>
                <input name="FirstNameModal" type="text" class="form-control" id="InputFirstName" placeholder="Bryan">
            </div>
            <div class="form-group">
                <label for="InputLastName">Last name</label>
                <input name="LastNameModal" type="text" class="form-control" id="InputLastName" placeholder="Johnson">
            </div>

            <div class="form-group">
                <label for="InputDate">Date of birth</label>
                <input name="DateModal" type="date" class="form-control" id="InputDate">
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input name="AdressModal" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="form-group">
                <label for="inputCity">City</label>
                <input name="CityModal" type="text" class="form-control" id="inputCity" placeholder="New York">
            </div>
            <div class="form-group">
                <label for="inputZipCode">Zip Code</label><i  title="format: XXXXX"  class="fas fa-info-circle"></i>
                <input name="ZipCodeModal" type="text" class="form-control" id="inputZipCode" placeholder="10001">
            </div>
            <div class="form-group">
                <label for="InputResume">Your Resume</label> <i  title="pdf only , do not exced 10mo"  class="fas fa-info-circle"></i>
                <input name="ResumeModal" type="file" class="form-control" id="InputResume" accept="application/pdf">
            </div>
            <div class="form-group">
                <label for="InputMessage">Your message for companies</label>
                <textarea class="form-control" type="text" name="MessageModal" id="InputMessage" ></textarea>
            </div>
            
                </div>
                <div class="modal-footer">
                    <button onclick="hide()" type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button name="Postuler" type="submit" class="btn btn-primary" value="`+ idAds + `">Postuler</button>
                </div>
            </form>
        </div>
    </div>
</div>`;
        //email	message	resume	id_people	id_companies	id_ads	
        show();
    }

}

function show() {
    var locModal = document.getElementById('PostulerModal');
    locModal.style.display = "block";
    locModal.style.paddingRight = "17px";
    locModal.className = "modal fade show";
};

function hide() {
    var locModal = document.getElementById('PostulerModal');
    locModal.style.display = "none";
    locModal.className = "modal fade";
};

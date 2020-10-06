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

if ((document.cookie).includes("id")) {
    document.getElementById("buttonHeader").innerHTML = `<form class="form-inline my-2 my-lg-0">
    <button class="sign profil btn btn-outline-success my-2 my-sm-0" type="button">Profil</button>
    <button class="sign deco btn btn-outline-success my-2 my-sm-0" type="button" onclick="redirect()">Deconnexion</button>
    </form>`;
}


function redirect(){
    window.location.replace("../Controler/deconnexion.php");
}
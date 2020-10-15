<?php
if (isset($_COOKIE["role"]) and $_COOKIE["role"] == "a") {
    $reqCompanies = $dbh->prepare("SELECT * FROM companies");
    $reqCompanies->execute();
    $resultCompanies = $reqCompanies->fetchAll();

    $reqPeople = $dbh->prepare("SELECT * FROM people");
    $reqPeople->execute();
    $resultPeople = $reqPeople->fetchAll();
?>
    <div class="card">
        <h5 class="card-header">People</h5>
        <div class="card-body">
            <ul>
                <?php
                for ($i = 0; $i < $reqPeople->rowCount(); $i++) {
                    $id = $resultPeople[$i]["id"];
                    $email = $resultPeople[$i]["email"];
                    $firstName = $resultPeople[$i]["prenom"];
                    $lastName = $resultPeople[$i]["nom"];
                    $dateNaissance = $resultPeople[$i]["date_naissance"];
                    $adresse = $resultPeople[$i]["adresse"];
                    $postal = $resultPeople[$i]["code_postal"];
                    $city = $resultPeople[$i]["ville"];
                    $resume = $resultPeople[$i]["resume"];
                    echo "<li>" . $firstName . " " . $lastName . " <a onclick='changePeople(" . $id . ")' id='change" . $id . "'><i class='fas fa-cog'></i></a></li> 
                    ";
                    echo '
                        <form method="post" id="form' . $id . 'People" style="display:none">
                    <div class="form-group">
                        <label for="InputEmailUpdate' . $id . '">Email address</label>
                        <input name="emailUpdatePeople' . $id . '" type="email" class="form-control" id="InputEmaiUpdatel' . $id . '" value="' . $email . '">
                    </div>
                    <div class="form-group">
                        <label for="InputFirstNameUpdate' . $id . '">First name</label>
                        <input name="firstNameUpdate' . $id . '" type="text" class="form-control" id="InputFirstNameUpdate' . $id . '" value="' . $firstName . '">
                    </div>
                    <div class="form-group">
                        <label for="InputLastNameUpdate' . $id . '">Last name</label>
                        <input name="lastNameUpdate' . $id . '" type="text" class="form-control" id="InputLastNameUpdate' . $id . '" value="' . $lastName . '">
                    </div>
                    <div class="form-group">
                        <label for="inputAddressUpdate' . $id . '">Address</label>
                        <input name="adressUpdate' . $id . '" type="text" class="form-control" id="inputAddressUpdate' . $id . '" value="' . $adresse . '">
                    </div>
                    <div class="form-group">
                        <label for="inputCityUpdate' . $id . '">City</label>
                        <input name="cityUpdate' . $id . '" type="text" class="form-control" id="inputCityUpdate' . $id . '" value="' . $city . '">
                    </div>
                    <div class="form-group">
                        <label for="inputZipCodeUpdate' . $id . '">Zip Code</label>
                        <input name="zipCodeUpdate' . $id . '" type="text" class="form-control" id="inputZipCodeUpdate' . $id . '" value="' . $postal . '">
                    </div>
                    <button name="SubmitUpdatePeople" type="submit" class="btn btn-primary" value="' . $id . '">Change</button>
                    </form>';
                }
                ?>
                <ul>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header">Companies</h5>
        <div class="card-body">
            <ul>
                <?php
                for ($i = 0; $i < $reqCompanies->rowCount(); $i++) {
                    $id = $resultCompanies[$i]["id"];
                    $email = $resultCompanies[$i]["email"];
                    $name = $resultCompanies[$i]["name"];
                    $description = $resultCompanies[$i]["description"];
                    $city = $resultCompanies[$i]["ville"];
                    echo "<li>" . $name . " <a id='change" . $id . "' onclick='changeCompanies(" . $id . ")'><i class='fas fa-cog'></i></a></li>";
                    echo '
                        <form method="post" id="form' . $id . 'Companies" style="display:none">
                    <div class="form-group">
                        <label for="InputEmailCompanies' . $id . '">Email address</label>
                        <input name="emailUpdateCompanies' . $id . '" type="email" class="form-control" id="InputEmailCompanies' . $id . '" value="' . $email . '">
                    </div>
                    <div class="form-group">
                        <label for="InputName' . $id . '">Name</label>
                        <input name="nameUpdate' . $id . '" type="text" class="form-control" id="InputName' . $id . '" value="' . $name . '">
                    </div>
                    <div class="form-group">
                        <label for="InputDescription' . $id . '">Description</label>
                        <input name="descriptionUpdate' . $id . '" type="textarea" class="form-control" id="InputDescription' . $id . '" value="' . $description . '">
                    </div>
                    <div class="form-group">
                        <label for="inputCity' . $id . '">City</label>
                        <input name="cityUpdate' . $id . '" type="text" class="form-control" id="inputCity' . $id . '" value="' . $city . '">
                    </div>
                    <button name="SubmitUpdateCompanies" type="submit" class="btn btn-primary" value="' . $id . '">Change</button>
                    </form>
                    ';
                }
                ?>
                <ul>
        </div>
    </div>
<?php

    if (isset($_POST["SubmitUpdatePeople"])) {
        $id = $_POST["SubmitUpdatePeople"];
            if (isset($_POST['emailUpdatePeople' . $id . '']) and isset($_POST['firstNameUpdate' . $id . '']) and isset($_POST['lastNameUpdate' . $id . '']) and isset($_POST['adressUpdate' . $id . '']) and isset($_POST['cityUpdate' . $id . '']) and isset($_POST['zipCodeUpdate' . $id . ''])) {
                $email = $_POST['emailUpdatePeople' . $id . ''];
                $firstName = $_POST['firstNameUpdate' . $id . ''];
                $lastName = $_POST['lastNameUpdate' . $id . ''];
                $adresse = $_POST['adressUpdate' . $id . ''];
                $city = $_POST['cityUpdate' . $id . ''];
                $request = $dbh->prepare('SELECT email FROM People WHERE email=?');
                $request->execute(array($dbh->quote($email)));
                $result = $request->fetchAll();
                if (filter_var($email, FILTER_VALIDATE_EMAIL) and !isset($result[0])) {
                    $regex = "/[a-zA-Z]{3,30}$/";
                    if (preg_match($regex, $firstName) and preg_match($regex, $lastName)) {
                        $regex = "/^[A-Za-zÀ-ÿ0-9\.,\- ]{1,34}$/";
                        if (preg_match($regex, $city)) {
                            $count = $request = $dbh->exec('UPDATE people (`email`, `prenom`, `nom`, `adresse` , `ville`) VALUES (' . $dbh->quote($email) . ', '  . $dbh->quote($firstName) . ',' . $dbh->quote($lastName) . ', ' . $dbh->quote($adresse) . ', ' . $dbh->quote($city) . ') WHERE id= ' . $dbh->quote($id) . '');
                            echo 'UPDATE people (`email`, `prenom`, `nom`, `adresse` , `ville`) VALUES (' . $dbh->quote($email) . ', '  . $dbh->quote($firstName) . ',' . $dbh->quote($lastName) . ', ' . $dbh->quote($adresse) . ', ' . $dbh->quote($city) . ') WHERE id= ' . $dbh->quote($id) . '';
                        } else {
                            $error = "Invalid city.";
                        }
                    } else {
                        $error = "Name not valid.";
                    }
                } else {
                    $error = "Invalid Email or already exist.";
                }
            } else {
                $error = "Fill all the blanks.";
            }
        }

        echo $error;

} else {
    echo '<script>
        document.location.replace("../View/home.php");
    </script>';
}
?>
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
        <h5 class="card-header">People      <i onclick="refresh()" class="fas fa-sync"></i></h5>
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
                    echo "<li>" . $firstName . " " . $lastName . " <a onclick='changePeople(" . $id . ")' id='change" . $id . "'><i class='fas fa-cog'></i></a> <a onclick='deletePeople(" . $id . ")' id='delete" . $id . "'><i class='fas fa-user-minus'></i></a></li> 
                    ";
                    echo '<form method="post" id="formDelete' . $id . 'People" style="display:none">
                        <button name="SubmitDeletePeople" type="submit" class="btn btn-primary" value="' . $id . '">Delete</button>
                    </form>';
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
    
<?php
    if(isset($_POST["SubmitDeletePeople"])){
        $id = $_POST["SubmitDeletePeople"];
        $request = $dbh->exec("DELETE FROM people WHERE id = ".$id."");
        echo "DELETE FROM people WHERE id = ".$id."";
    }
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
                            echo "ici";
                            $request = $dbh->exec('UPDATE people SET  `email`=' . $dbh->quote($email) . ', `prenom`='  . $dbh->quote($firstName) . ', `nom`=' . $dbh->quote($lastName) . ', `adresse`=' . $dbh->quote($adresse) . ', `ville`=' . $dbh->quote($city) . ' WHERE `id`= ' . $dbh->quote($id) . '');
                            header("Refresh:0");
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
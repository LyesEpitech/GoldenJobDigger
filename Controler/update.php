<?php

$error = "";

if (!empty($_COOKIE['role'])) {
    $role = $_COOKIE['role'];
    if ($role == "c") {
        $reqCompanies = $dbh->prepare("SELECT * FROM companies WHERE id = " . $_COOKIE["id"] . "");
        $reqCompanies->execute();
        $resultCompanies = $reqCompanies->fetchAll();
        $email = $resultCompanies[0]["email"];
        $name = $resultCompanies[0]["name"];
        $description = $resultCompanies[0]["description"];
        $ville = $resultCompanies[0]["ville"];
        $passwordHash = $resultCompanies[0]["password"];
        $pic = $resultCompanies[0]["photo"];

        echo '
        <form method="post">
    <div class="form-group">
        <label for="InputEmailCompanies">Email address</label>
        <input name="EmailUpdateCompanies" type="email" class="form-control" id="InputEmailCompanies" value="' . $email . '">
    </div>
    <div class="form-group">
        <label for="InputName">Name</label>
        <input name="NameUpdate" type="text" class="form-control" id="InputName" value="' . $name . '">
    </div>
    <div class="form-group">
        <label for="InputDescription">Description</label>
        <input name="DescriptionUpdate" type="textarea" class="form-control" id="InputDescription" value="' . $description . '">
    </div>
    <div class="form-group">
        <label for="inputCity">City</label>
        <input name="CityUpdate" type="text" class="form-control" id="inputCity" value="' . $ville . '">
    </div>
    <div class="form-group">
        <label for="InputPassword1">Password</label>
        <input name="Password1Update" type="password" class="form-control" id="InputPassword1" placeholder="Last password">
    </div>
    <div class="form-group">
        <label for="InputPassword2">Confirm Password</label>
        <input name="Password2Update" type="password" class="form-control" id="InputPassword2" placeholder="New password">
    </div>
    <div class="form-group">
        <label for="InputPassword3">Password</label>
        <input name="Password3Update" type="password" class="form-control" id="InputPassword3" placeholder="Repeat new password">
    </div>
    <button name="SubmitUpdate" type="submit" class="btn btn-primary">Change</button>
    </form>
    ';
        if (isset($_POST['SubmitUpdate']) and isset($_POST['EmailUpdateCompanies'])) {
            if (isset($_POST['NameUpdate']) and isset($_POST['CityUpdate']) and isset($_POST['Password1Update']) and isset($_POST['Password2Update']) and isset($_POST['Password3Update']) and isset($_POST['DescriptionUpdate'])) {
                $submit = $_POST['SubmitUpdate'];
                $email = $_POST['EmailUpdateCompanies'];
                $name = $_POST['NameUpdate'];
                $description = $_POST['DescriptionUpdate'];
                $city = $_POST['CityUpdate'];
                $password1 = hash("sha256", $_POST['Password1Update']);
                if (empty($password2)) {
                    $password2 = $password1;
                    $password3 = $password1;
                } else {
                    $password2 = hash("sha256", $_POST['Password2Update']);
                    $password3 = hash("sha256", $_POST['Password3Update']);
                }

                $request = $dbh->prepare('SELECT email FROM Companies WHERE email=?');
                $request->execute(array($dbh->quote($email)));
                $result = $request->fetchAll();
                if (filter_var($email, FILTER_VALIDATE_EMAIL) and !isset($result[0])) {
                    $regex = "/[a-zA-Z]{3,30}$/";
                    if (preg_match($regex, $name)) {
                        $regex = "/^[A-Za-zÀ-ÿ0-9\.,\- ]{1,34}$/";
                        if (preg_match($regex, $city)) {
                            $regex = "/[a-zA-Z0-9]{8,}$/";
                            $request = $dbh->prepare('SELECT * FROM companies WHERE id=' . $dbh->quote($_COOKIE["id"]) . ' AND password=' . $dbh->quote($password1) . '');
                            $request->execute();
                            $result = $request->fetchAll();
                            if (isset($result[0])) {
                                if (preg_match($regex, $password2)) {
                                    if ($password2 == $password3) {
                                        $request = $dbh->exec('UPDATE companies SET email='  . $dbh->quote($email) . ',password= ' . $dbh->quote($password2) . ', name=' . $dbh->quote($name) . ',description=' . $dbh->quote($description) . ', ville=' . $dbh->quote($city) . ' WHERE id=' . $_COOKIE["id"] . '');
                                    } else {
                                        $error = "Both passwords must match.";
                                    }
                                } else {
                                    $error = "Invalid Password.";
                                }
                            } else {
                                $error = "Invalid last password.";
                            }
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
    } else if ($role == "p") {
        $reqPeople = $dbh->prepare("SELECT * FROM people WHERE id = " . $_COOKIE["id"] . "");
        $reqPeople->execute();
        $resultPeople = $reqPeople->fetchAll();
        $email = $resultPeople[0]["email"];
        $firstName = $resultPeople[0]["prenom"];
        $lastName = $resultPeople[0]["nom"];
        $adress = $resultPeople[0]["adresse"];
        $ville = $resultPeople[0]["ville"];
        $zipCode = $resultPeople[0]["code_postal"];
        $passwordHash = $resultPeople[0]["password"];

        echo '
        <form method="post">
    <div class="form-group">
        <label for="InputEmailUpdate">Email address</label>
        <input name="emailUpdatePeople" type="email" class="form-control" id="InputEmaiUpdatel" value="' . $email . '">
    </div>
    <div class="form-group">
        <label for="InputFirstNameUpdate">First name</label>
        <input name="firstNameUpdate" type="text" class="form-control" id="InputFirstNameUpdate" value="' . $firstName . '">
    </div>
    <div class="form-group">
        <label for="InputLastNameUpdate">Last name</label>
        <input name="lastNameUpdate" type="text" class="form-control" id="InputLastNameUpdate" value="' . $lastName . '">
    </div>
    <div class="form-group">
        <label for="inputAddressUpdate">Address</label>
        <input name="adressUpdate" type="text" class="form-control" id="inputAddressUpdate" value="' . $adress . '">
    </div>
    <div class="form-group">
        <label for="inputCityUpdate">City</label>
        <input name="cityUpdate" type="text" class="form-control" id="inputCityUpdate" value="' . $ville . '">
    </div>
    <div class="form-group">
        <label for="inputZipCodeUpdate">Zip Code</label>
        <input name="zipCodeUpdate" type="text" class="form-control" id="inputZipCodeUpdate" value="' . $zipCode . '">
    </div>
    <div class="form-group">
        <label for="InputPassword1Update">Password</label>
        <input name="password1Update" type="password" class="form-control" id="InputPassword1Update" placeholder="Last password">
    </div>
    <div class="form-group">
        <label for="InputPassword2Update">Confirm Password</label>
        <input name="password2Update" type="password" class="form-control" id="InputPassword2Update" placeholder="New password">
    </div>
    <div class="form-group">
        <label for="InputPassword3Update">Confirm Password</label>
        <input name="passwod3Update" type="password" class="form-control" id="InputPassword3Update" placeholder="Repeat new password">
    </div>
    <button name="SubmitUpdate" type="submit" class="btn btn-primary">Change</button>
    </form>';
        if (isset($_POST['SubmitUpdate']) and isset($_POST['emailUpdatePeople'])) {
            if (isset($_POST['firstNameUpdate']) and isset($_POST['lastNameUpdate']) and isset($_POST['adressUpdate']) and isset($_POST['cityUpdate']) and isset($_POST['zipCodeUpdate']) and isset($_POST['password1Update'])) {
                $email = $_POST['emailUpdatePeople'];
                $firstName = $_POST['firstNameUpdate'];
                $lastName = $_POST['lastNameUpdate'];
                $adress = $_POST['adressUpdate'];
                $city = $_POST['cityUpdate'];
                $zipCode = $_POST['zipCodeUpdate'];
                $password1 = hash("sha256", $_POST['password1Update']);
                if (empty($password2)) {
                    $password2 = $password1;
                    $password3 = $password1;
                } else {
                    $password2 = hash("sha256", $_POST['password2Update']);
                    $password3 = hash("sha256", $_POST['password3Update']);
                }

                $request = $dbh->prepare('SELECT email FROM People WHERE email=?');
                $request->execute(array($dbh->quote($email)));
                $result = $request->fetchAll();
                if (filter_var($email, FILTER_VALIDATE_EMAIL) and !isset($result[0])) {
                    $regex = "/[a-zA-Z]{3,30}$/";
                    $regex = "/[a-zA-Z]{3,30}$/";
                    if (preg_match($regex, $firstName)) {
                        if (preg_match($regex, $lastName)) {
                            $regex = "/^[A-Za-zÀ-ÿ0-9\.,\- ]{1,34}$/";
                            if (preg_match($regex, $adress)) {
                                if (preg_match($regex, $city)) {
                                    $regex = "~^[0-9]{5}$~";
                                    if (preg_match($regex, $zipCode)) {
                                        $regex = "/[a-zA-Z0-9]{8,}$/";
                                        $request = $dbh->prepare('SELECT * FROM people WHERE id=' . $dbh->quote($_COOKIE["id"]) . ' AND password=' . $dbh->quote($password1) . '');
                                        $request->execute();
                                        $result = $request->fetchAll();
                                        if (isset($result[0])) {
                                            if ($password2 == $password3) {
                                                $request = $dbh->exec('UPDATE people SET email='  . $dbh->quote($email) . ',password= ' . $dbh->quote($password2) . ', firstName=' . $dbh->quote($firstName) . ', lastName=' . $dbh->quote($lastName) . ',adress=' . $dbh->quote($adress) . ', zipCode=' . $dbh->quote($zipCode) . ', ville=' . $dbh->quote($city) . ' WHERE id=' . $_COOKIE["id"] . '');
                                                print_r('UPDATE people SET email='  . $dbh->quote($email) . ',password= ' . $dbh->quote($password2) . ', prenom=' . $dbh->quote($firstName) . ', nom=' . $dbh->quote($lastName) . ',adresse=' . $dbh->quote($adress) . ', code_postal=' . $dbh->quote($zipCode) . ', ville=' . $dbh->quote($city) . ' WHERE id=' . $_COOKIE["id"] . '');
                                            } else {
                                                $error = "Both passwords must match.";
                                            }
                                        } else {
                                            $error = "Invalid Password.";
                                        }
                                    } else {
                                        $error = "Invalid ZipCode";
                                    }
                                } else {
                                    $error = "Invalid city.";
                                }
                            } else {
                                $error = "Invalid adress.";
                            }
                        } else {
                            $error = "Last name not valid.";
                        }
                    } else {
                        $error = "First name not valid.";
                    }
                } else {
                    $error = "Invalid Email or already exist.";
                }
            } else {
                $error = "Fill all the blanks.";
            }
        }
    }
    echo $error;

} else {
echo '<script>
        document.location.replace("../View/home.php");
    </script>';

}

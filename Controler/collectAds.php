<div id="divModal"></div>
<?php
$reqAds = $dbh->prepare("SELECT * FROM ads");
$reqAds->execute();
$resultAds = $reqAds->fetchAll();
$bool = false;
for ($i = 0; $i < $reqAds->rowCount(); $i++) {
    $title = $resultAds[$i]['title'];
    $description = $resultAds[$i]['description'];
    $level = $resultAds[$i]['level'];
    $date = $resultAds[$i]['date'];
    $startDate = $resultAds[$i]['startDate'];
    $jobType = $resultAds[$i]['jobType'];
    $skills = $resultAds[$i]['skills'];
    $domain = $resultAds[$i]['domain'];
    $idAds = $resultAds[$i]['id'];
    $idCompanies = $resultAds[$i]['companies_id'];
    $reqCompanies = $dbh->prepare("SELECT * FROM companies WHERE id = $idCompanies");
    $reqCompanies->execute();
    $resultCompanies = $reqCompanies->fetchAll();
    $companiesName = $resultCompanies[0]["name"];
    $companiesPics = $resultCompanies[0]["email"] . $resultCompanies[0]["photo"];
    if ($i == 0) {
        if ($bool) {
            echo '</div>';
            $bool = false;
        }
        echo '<div id="group' . ((int)($i / 4)) . '">';
        $bool = true;
    } else if ($i % 4 == 0) {
        if ($bool) {
            echo '</div>';
            $bool = false;
        }
        echo '<div id="group' . ((int)($i / 4)) . '" style="display: none">';
        $bool = true;
    }
    echo '  <div class="card">
        <h5 class="card-header">' . $title . ' <small>' . $date . '</small></h5>
        <div class="card-body">
            <p class="card-text">' . $description . '</p>
            <small>' . $companiesName . '</small><img src="../Files/' . $companiesPics . '" width="50" height="50">
        </div>
        <div id="learnMore' . $i . '" style="display: none;">
            <div class="card-body">
                <p class="card-text">' . $level . '</p>
                <p class="card-text">' . $skills . '</p>
                <p class="card-text">' . $domain . '</p>
                <p class="card-text">' . $jobType . '</p>
                <p class="card-text">' . $startDate . '</p>
                <small>' . $companiesName . '</small><img src="../Files/' . $companiesPics . '" width="50" height="50">
            </div> 
            <div class="card-footer">
            <form method="post">
                <button id="showModal' . $idAds . '" class="sign btn btn-outline-success my-2 my-sm-0" type="button" onclick="showModal(' . $idAds . ')">Postuler</button>
            </form>
            </div>
        </div>
        <button class="btn btn-secondary" id="button' . $i . '" onclick="learnMore(' . $i . ')">Show more</button>
    </div>';
    if ($i + 1 == $reqAds->rowCount()) {
        echo '</div>';
    }
}



$reqAds = $dbh->prepare("SELECT * FROM ads");
$reqAds->execute();
$resultAds = $reqAds->fetchAll();
$nbAds = $reqAds->rowCount();
echo '<nav aria-label="Page navigation example">
  <ul class="pagination">
  <li class="page-item"><a class="page-link" onclick="showPreviousGroup(' . $nbAds . ')">Previous</a></li>';
for ($i = 0; $i < ($nbAds / 4); $i++) {
    if ($i == 0) {
        echo ' 
        <li class="page-item active" id="link' . $i . '"><a class="page-link"  onclick="showGroup(' . $i . ',' . $nbAds . ')">' . ($i + 1) . '</a></li>
        ';
    } else {
        echo ' 
    <li class="page-item" id="link' . $i . '"><a class="page-link"  onclick="showGroup(' . $i . ',' . $nbAds . ')">' . ($i + 1) . '</a></li>
    ';
    }
}
echo '<li class="page-item"><a class="page-link" onclick="showNextGroup(' . $nbAds . ')">Next</a></li>
    </ul>
    </nav>';


if (isset($_POST['Postuler'])) {
    for ($i = 0; $i < $nbAds; $i++) {
        if ($_POST['Postuler'] == $i) {
            $idAds = $_POST['Postuler'];
            $error = "";
            if (!empty($_POST['EmailModal']) and !empty($_POST['FirstNameModal']) and !empty($_POST['LastNameModal']) and !empty($_POST['DateModal']) and !empty($_POST['AdressModal']) and !empty($_POST['DateModal'])  and !empty($_POST['CityModal']) and !empty($_POST['ZipCodeModal']) and !empty($_POST['MessageModal'])) {
                $email = $_POST['EmailModal'];
                $firstName = $_POST['FirstNameModal'];
                $lastName = $_POST['LastNameModal'];
                $birthDate = $_POST['DateModal'];
                $adress = $_POST['AdressModal'];
                $city = $_POST['CityModal'];
                $zipCode = $_POST['ZipCodeModal'];
                $resume = $_FILES['ResumeModal'];
                $message = $_POST['MessageModal'];
                $regex = "/[a-zA-Z]{3,30}$/";
                if (preg_match($regex, $firstName)) {
                    if (preg_match($regex, $lastName)) {
                        $regex = "/^[A-Za-zÀ-ÿ0-9\.,\- ]{1,34}$/";
                        if (preg_match($regex, $adress)) {
                            if (preg_match($regex, $city)) {
                                $regex = "~^[0-9]{5}$~";
                                if (preg_match($regex, $zipCode)) {
                                    $uploaddir = '../Files/';
                                    $uploadfile = $uploaddir . basename($email . $_FILES['ResumeModal']['name']);
                                    if ($_FILES["ResumeModal"]["type"] == "application/pdf") {
                                        if ($_FILES["ResumeModal"]["size"] < 10000000) {
                                            if (move_uploaded_file($_FILES['ResumeModal']['tmp_name'], $uploadfile)) {
                                                $request = $dbh->exec("INSERT INTO `job_app` (`company_jobapp_id`, `ads_jobapp_id`, `msg_first`, `email`, `first_name`, `last_name`, `birth_date`, `adress`, `city`, `zip_code`, `resume`) VALUES ('" . $idCompanies . "', '" . $idAds . "', '" . $message . "', '" . $email . "', '" . $firstName . "', '" . $lastName . "', '" . $birthDate . "', '" . $adress . "', '" . $city . "', '" . $zipCode . "', '" . $email . $resume['name'] . "')");
                                                echo "INSERT INTO `job_app` (`company_jobapp_id`, `ads_jobapp_id`, `msg_first`, `email`, `first_name`, `last_name`, `birth_date`, `adress`, `city`, `zip_code`, `resume`) VALUES ('" . $idCompanies . "', '" . $idAds . "', '" . $message . "', '" . $email . "', '" . $firstName . "', '" . $lastName . "', '" . $birthDate . "', '" . $adress . "', '" . $city . "', '" . $zipCode . "', '" . $email . $resume['name'] . "')";
                                            } else {
                                                $error = "Error in files upload.";
                                            }
                                        } else {
                                            $error = "Files is too fat.";
                                        }
                                    } else {
                                        $error = "Need pdf file.";
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
                if (!empty($_POST["EmailSignInModal"]) and !empty($_POST["PasswordSignInModal"]) and !empty($_POST["MessageModalSignIn"])) {
                    if (!empty($_FILES["ResumeModalSignIn"]["name"])) {
                        $reqPeople = $dbh->prepare("SELECT * FROM people WHERE email = ? AND password = ?");
                        $reqPeople->execute(array($_POST["EmailSignInModal"], hash("sha256", $_POST["PasswordSignInModal"])));
                        $result = $reqPeople->rowCount();
                        if ($result) {
                            $userinfo = $reqPeople->fetch();
                            $idPeople = $userinfo["id"];
                            $email = $userinfo["email"];
                            $firstName = $userinfo["prenom"];
                            $lastName = $userinfo["nom"];
                            $birthDate = $userinfo["date_naissance"];
                            $adress = $userinfo["adresse"];
                            $zipCode = $userinfo["code_postal"];
                            $city = $userinfo["ville"];
                            $message = $_POST["MessageModalSignIn"];
                            $resume = $_FILES['ResumeModalSignIn'];
                            $uploaddir = '../Files/';
                            $uploadfile = $uploaddir . basename($email . $_FILES['ResumeModalSignIn']['name']);
                            if ($_FILES["ResumeModalSignIn"]["type"] == "application/pdf") {
                                if ($_FILES["ResumeModalSignIn"]["size"] < 10000000) {
                                    if (move_uploaded_file($_FILES['ResumeModalSignIn']['tmp_name'], $uploadfile)) {
                                        $request = $dbh->exec("INSERT INTO `job_app` (`people_jobapp_id`,`company_jobapp_id`, `ads_jobapp_id`, `msg_first`, `email`, `first_name`, `last_name`, `birth_date`, `adress`, `city`, `zip_code`, `resume`) VALUES ('" . $idPeople . "','" . $idCompanies . "', '" . $idAds . "', '" . $message . "', '" . $email . "', '" . $firstName . "', '" . $lastName . "', '" . $birthDate . "', '" . $adress . "', '" . $city . "', '" . $zipCode . "', '" . $email . $resume['name'] . "')");
                                        echo "INSERT INTO `job_app` (`people_jobapp_id`,`company_jobapp_id`, `ads_jobapp_id`, `msg_first`, `email`, `first_name`, `last_name`, `birth_date`, `adress`, `city`, `zip_code`, `resume`) VALUES ('" . $idPeople . "','" . $idCompanies . "', '" . $idAds . "', '" . $message . "', '" . $email . "', '" . $firstName . "', '" . $lastName . "', '" . $birthDate . "', '" . $adress . "', '" . $city . "', '" . $zipCode . "', '" . $email . $resume['name'] . "')";
                                    } else {
                                        $error = "Error in files upload.";
                                    }
                                } else {
                                    $error = "Files is too fat.";
                                }
                            } else {
                                $error = "Need pdf file.";
                            }
                        } else {
                            $error = "This account dont exist.";
                        }
                    } else {
                        $reqPeople = $dbh->prepare("SELECT * FROM people WHERE email = ? AND password = ?");
                        $reqPeople->execute(array($_POST["EmailSignInModal"], hash("sha256", $_POST["PasswordSignInModal"])));
                        $result = $reqPeople->rowCount();
                        if ($result) {
                            $userinfo = $reqPeople->fetch();
                            $idPeople = $userinfo["id"];
                            $email = $userinfo["email"];
                            $firstName = $userinfo["prenom"];
                            $lastName = $userinfo["nom"];
                            $birthDate = $userinfo["date_naissance"];
                            $adress = $userinfo["adresse"];
                            $zipCode = $userinfo["code_postal"];
                            $city = $userinfo["ville"];
                            $message = $_POST["MessageModalSignIn"];
                            $resume = $userinfo["resume"];
                            $request = $dbh->exec("INSERT INTO `job_app` (`people_jobapp_id`,`company_jobapp_id`, `ads_jobapp_id`, `msg_first`, `email`, `first_name`, `last_name`, `birth_date`, `adress`, `city`, `zip_code`, `resume`) VALUES ('" . $idPeople . "','" . $idCompanies . "', '" . $idAds . "', '" . $message . "', '" . $email . "', '" . $firstName . "', '" . $lastName . "', '" . $birthDate . "', '" . $adress . "', '" . $city . "', '" . $zipCode . "', '" . $email . $resume . "')");
                            } else {
                            $error = "This account dont exist.";
                        }
                    }
                } else {
                    $error = "Fill all the blanks.";
                }
            }
            echo $error;
        }
    }
}

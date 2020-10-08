<div class="card">
    <h5 class="card-header">Admin Panel</h5>
    <div class="card-body">
        <h5 class="card-title">Search by email</h5>

        <nav class="navbar navbar-light bg-light">
            <form class="form-inline" method="POST">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="email@email.com" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>

    </div>
</div>
<?php

$reqCompanies = $dbh->prepare("SELECT * FROM companies");
$reqCompanies->execute();
$resultCompanies = $reqCompanies->fetchAll();

$reqPeople = $dbh->prepare("SELECT * FROM people");
$reqPeople->execute();
$resultPeople = $reqPeople->fetchAll();



if (isset($_POST["search"])) {
    $search = $_POST["search"];

    for ($i = 0; $i < $reqCompanies->rowCount(); $i++) {
        if ($search == $resultCompanies[$i]["email"]) {
            $i = $reqCompanies->rowCount();
            $idCompanies = $resultCompanies[0]["id"];
            $description = $resultCompanies[0]["description"];
            $companiesName = $resultCompanies[0]["name"];
            $companiesPics = $resultCompanies[0]["email"] . $resultCompanies[0]["photo"];
            echo '
                <div class="card">
                    <h5 class="card-header"><?php echo $resultCompanies[0]["name"] ?></h5>
                    <div class="card-body"> 
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">' . $companiesName . '</h5> 
                                <p class="card-text">' . $description . '</p>
                                <small>' . $companiesName . '</small><img src="../Files/pics/' . $companiesPics . '" width="50" height="50"></a>
                            </div>
                        </div>
                    </div>
                </div>';

    $reqAds = $dbh->prepare("SELECT * FROM ads WHERE companies_id= ?");
    $reqAds->execute(array($idCompanies));
    $resultAds = $reqAds->fetchAll();
    
    echo '<div class="row jobs">';
    for ($i = 0; $i < $reqAds->rowCount(); $i++) {
        $title = $resultAds[$i]['title'];
        $description = $resultAds[$i]['description'];
        $idAds = $resultAds[$i]['id'];
        $idCompanies = $resultAds[$i]['companies_id'];
        $reqCompanies = $dbh->prepare("SELECT * FROM companies WHERE id = $idCompanies");
        $reqCompanies->execute();
        $resultCompanies = $reqCompanies->fetchAll();
        $companiesName = $resultCompanies[0]["name"];
        $companiesPics = $resultCompanies[0]["email"] . $resultCompanies[0]["photo"];
        echo '
    
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">'.$title.'</h5> 
                                <p class="card-text">'.$description.'</p>
                                <a href="../View/ads.php?id='.$idAds.'" class="btn btn-primary">More information</a></br>
                                <img src="../Files/pics/'.$companiesPics.'" width="50" height="50"></a>
                            </div>
                        </div>
                    </div>
            ';
        }
        echo '</div>';
    }
}
    for ($i = 0; $i < $reqPeople->rowCount(); $i++) {
        if($search == $resultPeople[$i]["email"]){
            $i = $reqPeople->rowCount();
            $email = $resultPeople[0]["email"];
            $firstName = $resultPeople[0]["prenom"];
            $lastName = $resultPeople[0]["nom"];
            $birthDate = $resultPeople[0]["date_naissance"];
            $adress = $resultPeople[0]["adresse"];
            $city = $resultPeople[0]["ville"];
            $zipCode = $resultPeople[0]["code_postal"];
            $resume =$resultPeople[0]["resume"];

        }
    }

}
?>
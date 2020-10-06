<?php
$reqCompanies = $dbh->prepare("SELECT * FROM companies");
$reqCompanies->execute();
$resultCompanies = $reqCompanies->fetchAll();
$bool = false;
if (isset($_GET['id'])) {
    for ($i = 0; $i < $reqCompanies->rowCount(); $i++) {
        if ($_GET['id'] == $resultCompanies[$i]['id']) {
            $bool = true;
            $i = $reqCompanies->rowCount();
        } else {
            $bool = false;
        }
    }
}

if ($bool) {
    $reqCompanies = $dbh->prepare("SELECT * FROM companies WHERE id= " . $_GET['id'] . "");
    $reqCompanies->execute();
    $resultCompanies = $reqCompanies->fetchAll();
    $description = $resultCompanies[0]["description"];
    $companiesName = $resultCompanies[0]["name"];
    $companiesPics = $resultCompanies[0]["email"] . $resultCompanies[0]["photo"];
    echo '<div class="card">
    <h5 class="card-header">' . $companiesName . '</h5>
    <div class="card-body">
        <img src="../Files/pics/' . $companiesPics . '" width="50" height="50">
        <p class="card-text">' . $description . '</p>
    </div>
  </div>';
} else {
    $reqCompanies = $dbh->prepare("SELECT * FROM companies");
    $reqCompanies->execute();
    echo '<div class="row companies">';
    for ($i = 0; $i < $reqCompanies->rowCount(); $i++) {
        $reqCompanies = $dbh->prepare("SELECT * FROM companies");
        $reqCompanies->execute();
        $resultCompanies = $reqCompanies->fetchAll();
        $idCompanies = $resultCompanies[0]["id"];
        $description = $resultCompanies[0]["description"];
        $companiesName = $resultCompanies[0]["name"];
        $companiesPics = $resultCompanies[0]["email"] . $resultCompanies[0]["photo"];
        echo '

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">' . $companiesName . '</h5> 
                            <p class="card-text">' . $description . '</p>
                            <a href="../View/companies.php?id=' . $idCompanies . '" class="btn btn-primary">More information</a></br>
                            <small>' . $companiesName . '</small><img src="../Files/pics/' . $companiesPics . '" width="50" height="50"></a>
                        </div>
                    </div>
                </div>
        ';
    }
    echo '</div>';
}

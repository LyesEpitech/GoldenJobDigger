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
                <button id="showModal'.$idAds.'" class="sign btn btn-outline-success my-2 my-sm-0" type="button" onclick="showModal('.$idAds.')">Postuler</button>
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


if (isset($_POST['postuler'])) {
    
}

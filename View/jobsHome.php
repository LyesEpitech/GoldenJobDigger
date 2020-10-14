<?php $reqAds = $dbh->prepare("SELECT * FROM ads");
    $reqAds->execute();
    $resultAds = $reqAds->fetchAll();
    
    for ($i = 0; $i < 2; $i++) {
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
        echo '  <div class="card">
        <h5 class="card-header">' . $title . ' <small>' . $date . '</small></h5>
        <div class="card-body">
            <p class="card-text">' . $description . '</p>
            <small>' . $companiesName . '</small><img src="../Files/' . $companiesPics . '" width="50" height="50">
        </div>
        <div id="learnMore'.$i.'" style="display: none;">
            <div class="card-body">
                <p class="card-text">' . $level . '</p>
                <p class="card-text">' . $skills . '</p>
                <p class="card-text">' . $domain . '</p>
                <p class="card-text">' . $jobType . '</p>
                <p class="card-text">' . $startDate . '</p>
                <small>' . $companiesName . '</small><img src="../Files/' . $companiesPics . '" width="50" height="50">
            </div> 
        </div>
        <button class="btn btn-secondary" id="button'.$i.'" onclick="learnMore('.$i.')">Show more</button>
    </div>';
    }

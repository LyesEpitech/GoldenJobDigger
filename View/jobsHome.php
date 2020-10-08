<?php $reqAds = $dbh->prepare("SELECT * FROM ads");
    $reqAds->execute();
    $resultAds = $reqAds->fetchAll();
    
    echo '<div class="row jobs">';
    for ($i = 0; $i < 2; $i++) {
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
    
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">'.$title.'</h5> 
                                <p class="card-text">'.$description.'</p>
                                <a href="../View/ads.php?id='.$idAds.'" class="btn btn-primary">More information</a></br>
                                <a href="../View/companies.php?id='.$idCompanies.'"><small>'.$companiesName.'</small><img src="../Files/pics/'.$companiesPics.'" width="50" height="50"></a>
                            </div>
                        </div>
                    </div>
            ';
    }
	echo '</div>';

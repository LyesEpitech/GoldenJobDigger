<?php
$reqAds = $dbh->prepare("SELECT * FROM ads");
$reqAds->execute();
$resultAds = $reqAds->fetchAll();
$bool = false;
if(isset($_GET['id'])){
    for($i = 0; $i < $reqAds->rowCount(); $i++){
        if($_GET['id'] == $resultAds[$i]['id']){
            $bool = true;
            $i = $reqAds->rowCount();
        }else{
            $bool = false;
        }
    }
}

if($bool){
    $reqAds = $dbh->prepare("SELECT * FROM ads WHERE id= ".$_GET['id']."");
    $reqAds->execute();
    $resultAds = $reqAds->fetchAll();
    $title = $resultAds[0]['title'];
    $description = $resultAds[0]['description'];
    $idAds = $resultAds[0]['id'];
    $idCompanies = $resultAds[0]['companies_id'];
    
    $reqCompanies = $dbh->prepare("SELECT * FROM companies WHERE id = $idCompanies");
    $reqCompanies->execute();
    $resultCompanies = $reqCompanies->fetchAll();
    $companiesName = $resultCompanies[0]["name"];
    $companiesPics = $resultCompanies[0]["email"] . $resultCompanies[0]["photo"];
    echo '<div class="card">
    <h5 class="card-header">'.$title.'</h5>
    <div class="card-body">
        <p class="card-text">'.$description.'</p>
        <a href="../View/companies.php?id='.$idCompanies.'"><small>'.$companiesName.'</small><img src="../Files/pics/'.$companiesPics.'" width="50" height="50"></a>
    </div>
  </div>';
}else{
    $reqAds = $dbh->prepare("SELECT * FROM ads");
    $reqAds->execute();
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
                                <a href="../View/companies.php?id='.$idCompanies.'"><small>'.$companiesName.'</small><img src="../Files/pics/'.$companiesPics.'" width="50" height="50"></a>
                            </div>
                        </div>
                    </div>
            ';
    }
    echo '</div>';
}


?>
<?php
$reqPeople = $dbh->prepare("SELECT * FROM ads");
$reqPeople->execute();
$result = $reqPeople->fetchAll();
echo '<div class="row jobs">';
for ($i = 0; $i < $reqPeople->rowCount(); $i++) {
    $title = $result[$i]['title'];
    $description = $result[$i]['description'];
    echo '
            <div class="row actus">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">'.$title.'</h5>
                            <p class="card-text">'.$description.'</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        ';
}
echo '</div>';

?>
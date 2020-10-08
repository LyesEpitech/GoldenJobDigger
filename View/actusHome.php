<?php

$json = json_decode(file_get_contents('http://newsapi.org/v2/everything?q=entreprise&sortBy=publishedAt&apiKey=995bf8a2a3374d27a1a54f833806410a'));
?>
<?php
$i = 0;
foreach ($json->articles as $News) {
	if($i < 3){
    if ($i % 3 == 0) { ?>
        <div class="card-group">
            <div class="card bg-warning">
                <img class="card-img-top" src="<?php echo $News->urlToImage ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $News->title ?></h5>
                    <p class="card-text"><?php echo $News->content ?></p><a href="<?php echo $News->url ?>" class="btn btn-light">View article</a>
                    <p class="card-text"><?php echo $News->author ?></br>Published <?php echo $News->publishedAt ?></p>
                </div>
            </div>
        <?php } else {
        ?>
            <div class="card bg-warning">
                <img class="card-img-top" src="<?php echo $News->urlToImage ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $News->title ?></h5>
                    <p class="card-text"><?php echo $News->content ?></p><a href="<?php echo $News->url ?>" class="btn btn-lightfuu">View article</a>
                    <p class="card-text"><?php echo $News->author ?></br>Published <?php echo $News->publishedAt ?></p>
                </div>
            </div>
        <?php
    }
    if ($i+1 % 3 == 0) { ?>
        </div> <?php
            }
            $i++;
        }}
                ?>
</div>
<?php

$response = file_get_contents('http://newsapi.org/v2/everything?q=france&sortBy=publishedAt&apiKey=995bf8a2a3374d27a1a54f833806410a');


$json = json_decode($response);
?>
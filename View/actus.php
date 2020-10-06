<?php

$response = file_get_contents('http://newsapi.org/v2/everything?q=bitcoin&from=2020-09-05&sortBy=publishedAt&apiKey=995bf8a2a3374d27a1a54f833806410a');


print_r($response);
?>
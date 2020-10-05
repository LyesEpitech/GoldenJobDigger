<?php
	$dsn = 'mysql:dbname=GoldenBase;host=localhost';
	$user = 'lucas';
	$password = 'oscar';


	try {
	    $dbh = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
	    echo 'Connection failed: ' . $e->getMessage();
	}

    
?>
<?php

include 'connexion.php';



	$reqCompanies = $dbh->prepare("SELECT * FROM companies WHERE id = ?");
    $reqCompanies->execute(array($_COOKIE['id']));
	$result = $reqCompanies->fetchAll();



	$email = $result[0]["email"];
	$name = $result[0]["name"];
	$description = $result[0]["description"];
	$city = $result[0]["ville"];
	$pic = $result[0]["photo"];




	if (isset($_POST['SubmitUpdate']) AND isset($_POST['EmailUpdateCompanies'])) {
		if (isset($_POST['NameUpdate']) and isset($_POST['CityUpdate']) and isset($_POST['Password1Update']) and isset($_POST['Password2Update']) and isset($_POST['TermsUpdate']) and isset($_POST['DescriptionUpdate'])) {
			$submit = $_POST['SubmitUpdate'];
			$email = $_POST['EmailUpdateCompanies'];
			$name = $_POST['NameUpdate'];
			$description = $_POST['DescriptionUpdate'];
			$city = $_POST['CityUpdate'];
			$password1 = hash("sha256", $_POST['Password1Update']);
			$password2 = hash("sha256", $_POST['Password2Update']);
			$terms = $_POST['TermsUpdate'];
			$pic = $_FILES['PicUpdate'];
			$request = $dbh->prepare('SELECT email FROM Companies WHERE email=?');
			$request->execute(array($dbh->quote($email)));
			$result = $request->fetchAll();
			if (filter_var($email, FILTER_VALIDATE_EMAIL) and !isset($result[0])) {
				$regex = "/[a-zA-Z]{3,30}$/";
				if (preg_match($regex, $name)) {
					$regex = "/^[A-Za-zÀ-ÿ0-9\.,\- ]{1,34}$/";
					if (preg_match($regex, $city)) {
						$regex = "/[a-zA-Z0-9]{8,}$/";
						if (preg_match($regex, $password1)) {
							if ($password1 == $password2 and hash("sha256", $lastpassword) == $password ) {

								$uploaddir = '../Files/pics/';
								$uploadfile = $uploaddir . basename($email . $_FILES['PicUpdate']['name']);
								if ($_FILES["PicUpdate"]["type"] == "image/jpg" or $_FILES["PicUpdate"]["type"] == "image/png" or $_FILES["PicUpdate"]["type"] == "image/jpeg" or $_FILES["PicUpdate"]["type"] == "image/gif") {
									if ($_FILES["PicUpdate"]["size"] < 1000000) {
										if (move_uploaded_file($_FILES['PicUpdate']['tmp_name'], $uploadfile)) {
											$count = $request = $dbh->exec('UPDATE companies (`email`, `password`, `name`, `description`, `ville`, `photo`) VALUES (' . $dbh->quote($email) . ', ' . $dbh->quote($password1) . ', ' . $dbh->quote($name) . ',' . $dbh->quote($description) . ', ' . $dbh->quote($city) . ',' . $dbh->quote($pic['name']) . ')');
											print_r($count);
										} else {
											$error = "Error in files upload.";
										}
									} else {
										$error = "Files is too fat.";
									}
								} else {
									$error = "Bad files format.";
								}
							} else {
								$error = "Both passwords must match.";
							}
						} else {
							$error = "Invalid Password.";
						}
					} else {
						$error = "Invalid city.";
					}
				} else {
					$error = "Name not valid.";
				}
			} else {
				$error = "Invalid Email or already exist.";
			}
		} else {
			$error = "Fill all the blanks.";
		}
	}
	
	echo $error;
	if ($error != "") {
	}
	

		<?php
			$reqPeople = $dbh->prepare("SELECT * FROM people WHERE id= ?");
			$reqPeople->execute($_COOKIE['id']);
			$resultPeople = $reqPeople->fetchAll();
			$PeopleFile =  $resultPeople[0]["email"] . $resultPeople[0]["resume"];
			
		
		
		$reqPeople = $dbh->prepare("SELECT * FROM people WHERE id = ?");
		$reqPeople->execute(array($_COOKIE['id']));
		$result = $reqPeople->fetchAll();
		
		
		
		$email = $result[0]["email"];
		$firstName = $result[0]["prenom"];
		$lastName = $result[0]["nom"];
		$dateNaissance = $result[0]["date_naissance"];
		$adresse = $result[0]["adresse"];
		$postal = $result[0]["code_postal"];
		$city = $result[0]["ville"];
		$resume = $result[0]["resume"];
		
		
		
		
		if (isset($_POST['SubmitUpdate']) and isset($_POST['EmailUpdateCompanies'])) {
			if (isset($_POST['NameUpdate']) and isset($_POST['CityUpdate']) and isset($_POST['Password1Update']) and isset($_POST['Password2Update']) and isset($_POST['TermsUpdate']) and isset($_POST['DescriptionUpdate'])) {
				$submit = $_POST['SubmitUpdate'];
				$email = $_POST['EmailUpdatePeople'];
				$firstName = $_POST['firstNameUpdate'];
				$lastName = $_POST['lastNameUpdate'];
				$dateNaissance = $_POST['naisssanceUpdate'];
				$adresse = $_POST['adressUpdate'];
				$postal = $_POST['postalUpdate'];
				$city = $_POST['CityUpdate'];
				$password1 = hash("sha256", $_POST['Password1Update']);
				$password2 = hash("sha256", $_POST['Password2Update']);
				$resume = $_FILES['ResumeUpdate'];
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
								if ($password1 == $password2 and hash("sha256", $lastpassword) == $password) {
		
									$uploaddir = '../Files/pics/';
									$uploadfile = $uploaddir . basename($email . $_FILES['ResumeUpdate']['name']);
									if ($_FILES["ResumeUpdate"]["type"] == "image/jpg" or $_FILES["ResumeUpdate"]["type"] == "application/pdf" ) {
										if ($_FILES["ResumeUpdate"]["size"] < 1000000) {
											if (move_uploaded_file($_FILES['ResumeUpdate']['tmp_name'], $uploadfile)) {
												$count = $request = $dbh->exec('UPDATE companies (`email`, `password`, `prenom`, `nom`, `date_naissance`, `adresse` , `ville` , `resume`  ) VALUES (' . $dbh->quote($email) . ', ' . $dbh->quote($password1) . ', ' . $dbh->quote($name) . ',' . $dbh->quote($description) . ', ' . $dbh->quote($city) . ',' . $dbh->quote($pic['name']) . ')');
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
		


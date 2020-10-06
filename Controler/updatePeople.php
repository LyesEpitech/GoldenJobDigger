<?php

include 'connexion.php';




	$reqPeople = $dbh->prepare("SELECT * FROM people WHERE id = ?");
    $reqPeople->execute(array($_COOKIE['id']));
	$result = $reqPeople->fetchAll();
		
		$email = $result[0]["email"];
		$firstName = $result[0]["prenom"];
		$lastName = $result[0]["nom"];
		$sex = $result[0]["sex"];
		$birthDate = $result[0]["date_naissance"];
		$adress = $result[0]["adresse"];
		$city = $result[0]["ville"];
		$zipCode = $result[0]["code_postal"];
		$resume =$result[0]["resume"];
	




		if (isset($_POST['SubmitUpdate']) AND isset($_POST['EmailUpdate'])) {
			if (isset($_POST['FirstNameUpdate']) and isset($_POST['LastNameUpdate']) and isset($_POST['SexUpdate']) and isset($_POST['DateUpdate']) and isset($_POST['TelUpdate']) and isset($_POST['AdressUpdate']) and isset($_POST['CityUpdate']) and isset($_POST['ZipCodeUpdate']) and isset($_POST['Password1Update']) and isset($_POST['Password2Update']) and isset($_POST['TermsUpdate'])) {
				$submit = $_POST['SubmitUpdate'];
				$email = $_POST['EmailUpdate'];
				$firstName = $_POST['FirstNameUpdate'];
				$lastName = $_POST['LastNameUpdate'];
				$sex = $_POST['SexUpdate'];
				$birthDate = $_POST['DateUpdate'];
				$tel = $_POST['TelUpdate'];
				$adress = $_POST['AdressUpdate'];
				$city = $_POST['CityUpdate'];
				$zipCode = $_POST['ZipCodeUpdate'];
				$password1 = hash("sha256", $_POST['Password1Update']);
				$password2 = hash("sha256", $_POST['Password2Update']);
				$terms = $_POST['TermsUpdate'];
				$resume = $_FILES['ResumeUpdate'];
				$request = $dbh->prepare('SELECT email FROM People WHERE email=?');
				$request->execute(array($dbh->quote($email)));
				$result = $request->fetchAll();
				if (filter_var($email, FILTER_VALIDATE_EMAIL) and !isset($result[0])) {
					$regex = "/[a-zA-Z]{3,30}$/";
					if (preg_match($regex, $firstName)) {
						if (preg_match($regex, $lastName)) {
							$regex = "#^0[1-68]([-. ]?[0-9]{2}){4}$#";
							if (preg_match($regex, $tel)) {
								$regex = "/^[A-Za-zÀ-ÿ0-9\.,\- ]{1,34}$/";
								if (preg_match($regex, $adress)) {
									if (preg_match($regex, $city)) {
										$regex = "~^[0-9]{5}$~";
										if (preg_match($regex, $zipCode)) {
											$regex = "/[a-zA-Z0-9]{8,}$/";
											if (preg_match($regex, $password1)) {
												if ($newpassword1 == $newpassword2 and hash("sha256", $lastpassword) == $password) {
													$uploaddir = '../Files/resumes/';
													$uploadfile = $uploaddir . basename($email . $_FILES['ResumeUpdate']['name']);
													if ($_FILES["ResumeUpdate"]["type"] == "application/pdf") {
														if ($_FILES["ResumeUpdate"]["size"] < 10000000) {
															if (move_uploaded_file($_FILES['ResumeUpdate']['tmp_name'], $uploadfile)) {
																$count = $request = $dbh->exec('UPDATE people (`email`, `password`, `prenom`, `nom`, `date_naissance`, `adresse`, `code_postal`, `ville`, `resume`) VALUES (' . $dbh->quote($email) . ', ' . $dbh->quote($password1) . ', ' . $dbh->quote($firstName) . ', ' . $dbh->quote($lastName) . ', ' . $dbh->quote($birthDate) . ', ' . $dbh->quote($adress) . ', ' . $dbh->quote($zipCode) . ', ' . $dbh->quote($city) . ', ' . $dbh->quote($resume['name']) . ')');
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
											$error = "Invalid ZipCode";
										}
									} else {
										$error = "Invalid city.";
									}
								} else {
									$error = "Invalid adress.";
								}
							} else {
								$error = "Invalid phone number.";
							}
						} else {
							$error = "Last name not valid.";
						}
					} else {
						$error = "First name not valid.";
					}
				} else {
					$error = "Invalid Email or already exist.";
				}
			} else {
				$error = "Fill all the blanks.";
			}
		}

?>


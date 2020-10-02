<?php


$error = "";
if (isset($_POST['SubmitSignUp'])) {
	if (isset($_POST['EmailSignUp']) and isset($_POST['FirstNameSignUp']) and isset($_POST['LastNameSignUp']) and isset($_POST['SexSignUp']) and isset($_POST['DateSignUp']) and isset($_POST['TelSignUp']) and isset($_POST['AdressSignUp']) and isset($_POST['CitySignUp']) and isset($_POST['ZipCodeSignUp']) and isset($_POST['Password1SignUp']) and isset($_POST['Password2SignUp']) and isset($_POST['TermsSignUp'])) {
		$submit = $_POST['SubmitSignUp'];
		$email = $_POST['EmailSignUp'];
		$firstName = $_POST['FirstNameSignUp'];
		$lastName = $_POST['LastNameSignUp'];
		$sex = $_POST['SexSignUp'];
		$birthDate = $_POST['DateSignUp'];
		$tel = $_POST['TelSignUp'];
		$adress = $_POST['AdressSignUp'];
		$city = $_POST['CitySignUp'];
		$zipCode = $_POST['ZipCodeSignUp'];
		$password1 = hash("sha256", $_POST['Password1SignUp']);
		$password2 = hash("sha256", $_POST['Password2SignUp']);
		$terms = $_POST['TermsSignUp'];
		$resume = $_FILES['ResumeSignUp'];
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
										if ($password1 == $password2) {
											$password1 = hash("sha256", $password1);
											$password2 = hash("sha256", $password2);
											if ($_FILES["ResumeSignUp"]["type"] == "document/pdf") {
												if ($_FILES["ResumeSignUp"]["size"] < 1000000) {
													if (move_uploaded_file($_FILES['ResumeSignUp']['tmp_name'], $uploadfile)) {
														$count = $request = $dbh->exec('INSERT INTO people (`email`, `password`, `prenom`, `nom`, `date_naissance`, `adresse`, `code_postal`, `ville`, `resume`) VALUES (' . $dbh->quote($email) . ', ' . $dbh->quote($password1) . ', ' . $dbh->quote($firstName) . ', ' . $dbh->quote($lastName) . ', ' . $dbh->quote($birthDate) . ', ' . $dbh->quote($adress) . ', ' . $dbh->quote($zipCode) . ', ' . $dbh->quote($city) . ', ' . $dbh->quote($resume['name']) . ')');
														print_r($count);
														return false;
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
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
		$resume = $_POST['ResumeSignUp'];
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
											$count = $request = $dbh->exec('INSERT INTO people (`email`, `password`, `prenom`, `nom`, `date_naissance`, `adresse`, `code_postal`, `ville`, `resume`) VALUES (' . $dbh->quote($email) . ', ' . $dbh->quote($password1) . ', ' . $dbh->quote($firstName) . ', ' . $dbh->quote($lastName) . ', ' . $dbh->quote($birthDate) . ', ' . $dbh->quote($adress) . ', ' . $dbh->quote($zipCode) . ', ' . $dbh->quote($city) . ', ' . $dbh->quote($resume) . ')');
											print_r($count);
											return false;
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
if (isset($_POST['SubmitSignUp'])) {
	if (isset($_POST['EmailSignUpCompanies']) and isset($_POST['NameSignUp']) and isset($_POST['CitySignUp']) and isset($_POST['Password1SignUp']) and isset($_POST['Password2SignUp']) and isset($_POST['TermsSignUp']) and isset($_POST['DescriptionSignUp'])) {
		$submit = $_POST['SubmitSignUp'];
		$email = $_POST['EmailSignUpCompanies'];
		$name = $_POST['NameSignUp'];
		$description = $_POST['DescriptionSignUp'];
		$city = $_POST['CitySignUp'];
		$password1 = hash("sha256", $_POST['Password1SignUp']);
		$password2 = hash("sha256", $_POST['Password2SignUp']);
		$terms = $_POST['TermsSignUp'];
		$pic = $_POST['PicSignUp'];
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
						if ($password1 == $password2) {
							$password1 = hash("sha256", $password1);
							$password2 = hash("sha256", $password2);
							$count = $request = $dbh->exec('INSERT INTO companies (`email`, `password`, `name`, `description`, `ville`, `photo`) VALUES (' . $dbh->quote($email) . ', ' . $dbh->quote($password1) . ', ' . $dbh->quote($name) . ',' . $dbh->quote($description) . ', ' . $dbh->quote($city) . ',' . $dbh->quote($pic) . ')');
							print_r($count);
							return false;
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
/*

	

if($_POST['RolesSignUp'] == "People"){
		$request = $dbh->prepare("INSERT INTO People (firstname, lastname, email) VALUES (?, ?, ?)");
	}else{
		$request = $dbh->prepare("INSERT INTO Companies (firstname, lastname, email) VALUES (?, ?, ?)");
		$request->bind_param($firstname, $lastname, $email);
	}	
	execute($request);
	
	if (!preg_match("/^[A-Za-z0-9]{10, 40}$/i")  titre 
	if (!preg_match("^[0-9]{5,5}$")  

	*/

<?php
$error = "";
if (isset($_POST['SubmitSignUp'])) {
	if(isset($_POST['EmailSignUp']) AND isset($_POST['FirstNameSignUp']) AND isset($_POST['LastNameSignUp']) AND isset($_POST['SexSignUp']) AND isset($_POST['DateSignUp']) AND isset($_POST['TelSignUp']) AND isset($_POST['AdressSignUp']) AND isset($_POST['CitySignUp']) AND isset($_POST['countrySignUp']) AND isset($_POST['ZipCodeSignUp']) AND isset($_POST['Password1SignUp']) AND isset($_POST['Password2SignUp']) AND isset($_POST['TermsSignUp'])){
		$submit = $_POST['SubmitSignUp'];
		$email = $_POST['EmailSignUp'];
		$firstName = $_POST['FirstNameSignUp'];
		$lastName = $_POST['LastNameSignUp'];
		$sex = $_POST['SexSignUp'];
		$tel = $_POST['TelSignUp'];
		$adress = $_POST['AdressSignUp'];
		$city = $_POST['CitySignUp'];
		$country = $_POST['countrySignUp'];
		$zipCode = $_POST['ZipCodeSignUp'];
		$password1 = $_POST['Password1SignUp'];
		$password2 = $_POST['Password2SignUp'];
		$terms = $_POST['TermsSignUp'];
		$request = $dbh->prepare('SELECT email FROM People WHERE email=?');
		$request->execute(array($email));
		$result = $request->fetchAll();
		if(filter_var($email, FILTER_VALIDATE_EMAIL) AND !isset($result[0])){
			$regex = "/[a-zA-Z]{3,30}$/";
			if (preg_match($regex, $firstName)) {
				if(preg_match($regex, $lastName)){
					$regex = "#^0[1-68]([-. ]?[0-9]{2}){4}$#";
					if(preg_match($regex, $tel)){
						$regex = "/^[A-Za-zÀ-ÿ\.\- ]{1,34}$/";
						if(preg_match($regex, $adress)){
							if(preg_match($regex, $city)){
								if(preg_match($regex, $country)){

								}else{
									$error = "Invalid country.";
								}
							}else{
								$error = "Invalid city.";
							}
						}else{
							$error = "Invalid adress.";
						}
					}else{
						$error = "Invalid phone number.";
					}
				}else{
					$error = "Last name not valid.";
				}
			}else{
				$error = "First name not valid.";	
			}
		}else{
			$error = "Invalid Email or already exist.";
		}
	}else{
		$error = "Fill all the blanks.";

	}	
}


$var = json_decode((file_get_contents("../Json/country.json")));
echo $var;

echo $error;
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

<?php include '../Model/connexion.php'?>
<!DOCTYPE html>

<html lang="fr">
<head>
	<meta charset="utf-8"/>
	<title>Index</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../Style/style.css">
</head>
<body>

<?php

$error = "";
if (isset($_POST['SubmitUpdate'])) {
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
														$count = $request = $dbh->exec('UPDATE people (`email`, `password`, `prenom`, `nom`, `date_naissance`, `adresse`, `code_postal`, `ville`, `resume`) VALUES (' . $dbh->quote($email) . ', ' . $dbh->quote($password1) . ', ' . $dbh->quote($firstName) . ', ' . $dbh->quote($lastName) . ', ' . $dbh->quote($birthDate) . ', ' . $dbh->quote($adress) . ', ' . $dbh->quote($zipCode) . ', ' . $dbh->quote($city) . ', ' . $dbh->quote($resume['name']) . ')');
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


	<div class="container">
		<?php include 'header.php';?>

		<main>
        <form method="POST">
					<div class="modal-body" id="modalBodySignUp">
						<div class="form-group">
							<label for="InputEmail1">Email address</label><i class="fas fa-info-circle"></i>
							<input name="EmailSignUp" type="email" class="form-control" id="InputEmail1" placeholder="<?php  echo ($email); ?>">
						</div>
						<div class="form-group">
							<label for="InputFirstName">First name</label><i class="fas fa-info-circle"></i>
							<input name="FirstNameSignUp" type="text" class="form-control" id="InputFirstName" placeholder="<?php echo ($firstName); ?>">
						</div>
						<div class="form-group">
							<label for="InputLastName">Last name</label><i class="fas fa-info-circle"></i>
							<input name="LastNameSignUp" type="text" class="form-control" id="InputLastName" placeholder="<?php echo($lastName); ?>">
						</div>
						<div class="form-group">
							<label for="inputSex">Sex</label>
							<select name="SexSignUp" id="inputSex" class="form-control">
								<option <?php if ( $sex['sex']=='Male') {echo "selected='selected'";} ?>>Male</option>
								<option <?php if ( $sex['sex']=='Female') {echo "selected='selected'";} ?> >Female</option>
							</select>
						</div>
						<div class="form-group">
							<label for="InputDate">Date of birth</label>
							<input name="DateSignUp" type="date" class="form-control" id="InputDate" placeholder="<?php echo($birthDate );?>" >
						</div>
						<div class="form-group">
							<label for="InputTel">Phone number</label><i class="fas fa-info-circle"></i>
							<input name="TelSignUp" type="tel" class="form-control" id="InputTel" placeholder="<?php echo($tel); ?>">
						</div>
						<div class="form-group">
							<label for="inputAddress">Address</label><i class="fas fa-info-circle"></i>
							<input name="AdressSignUp" type="text" class="form-control" id="inputAddress" placeholder="<?php echo($adress); ?>"">
						</div>
						<div class="form-group">
							<label for="inputCity">City</label><i class="fas fa-info-circle"></i>
							<input name="CitySignUp" type="text" class="form-control" id="inputCity" placeholder="<?php echo($city); ?>"">
						</div>
						<div class="form-group">
							<label for="inputZipCode">Zip Code</label><i class="fas fa-info-circle"></i>
							<input name="ZipCodeSignUp" type="text" class="form-control" id="inputZipCode" placeholder="<?php echo($zipCode); ?>">
                        </div>
                        <div class="form-group">
							<label for="InputLastPassword">Last password</label><i class="fas fa-info-circle"></i>
							<input name="LastPassword" type="password" class="form-control" id="InputLastPassword" placeholder="p@sSw0rd">
						</div>
						<div class="form-group">
							<label for="InputNewPassword1">New password</label><i class="fas fa-info-circle"></i>
							<input name="NewPassword1" type="password" class="form-control" id="InputNewPassword1" placeholder="p@sSw0rd">
						</div>
						<div class="form-group">
							<label for="InputNewPassword2">Confirm  new password</label><i class="fas fa-info-circle"></i>
							<input name="NewPassword2" type="password" class="form-control" id="NewPassword2" placeholder="p@sSw0rd">
						</div>
						<div class="form-group">
							<label for="InputResume">Your Resume</label>
							<input name="ResumeSignUp" type="file" class="form-control" id="InputResume" accept="application/pdf">
						</div>
					</div>
					<div class="modal-footer">
						<button name="SubmitUpdate" type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>   
		</main>
		
		<?php include 'footer.php';?>
	</div>
		<script src="https://kit.fontawesome.com/c5dc9dbc82.js" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="../Script/main.js"></script>
	</body>
	</html>
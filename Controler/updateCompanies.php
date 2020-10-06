<?php

include("../View/header.php");

if (isset($_POST['SubmitUpdate'])) {
	if (isset($_POST['EmailSignUpCompanies']) and isset($_POST['NameSignUp']) and isset($_POST['CitySignUp']) and isset($_POST['Password1SignUp']) and isset($_POST['Password2SignUp']) and isset($_POST['TermsSignUp']) and isset($_POST['DescriptionSignUp'])) {
		$submit = $_POST['SubmitUpdate'];
		$email = $_POST['EmailSignUpCompanies'];
		$name = $_POST['NameSignUp'];
		$description = $_POST['DescriptionSignUp'];
		$city = $_POST['CitySignUp'];
		$password1 = hash("sha256", $_POST['Password1SignUp']);
		$password2 = hash("sha256", $_POST['Password2SignUp']);
		$pic = $_FILES['PicSignUp'];
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
							$uploaddir = '../Files/pics/';
							$uploadfile = $uploaddir . basename($email . $_FILES['PicSignUp']['name']);
							if ($_FILES["PicSignUp"]["type"] == "image/jpg" or $_FILES["PicSignUp"]["type"] == "image/png" or $_FILES["PicSignUp"]["type"] == "image/jpeg" or $_FILES["PicSignUp"]["type"] == "image/gif") {
								if ($_FILES["PicSignUp"]["size"] < 1000000) {
									if (move_uploaded_file($_FILES['PicSignUp']['tmp_name'], $uploadfile)) {
										$count = $request = $dbh->exec('UPDATE companies (`email`, `password`, `name`, `description`, `ville`, `photo`) VALUES (' . $dbh->quote($email) . ', ' . $dbh->quote($password1) . ', ' . $dbh->quote($name) . ',' . $dbh->quote($description) . ', ' . $dbh->quote($city) . ',' . $dbh->quote($pic['name']) . ')');
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
};

?>





<div class="container">
	<?php include 'header.php'; ?>


	<class="my-5 h2"><?php echo ($name); ?></h2>

<img class="rounded-circle center" alt="100x100" src="<?php echo ($pic); ?>"
  data-holder-rendered="true">h2 

	<main>
		<form method="POST">
			<div>


				<div class="form-group">
					<label for="InputEmailCompanies">Email address</label>
					<input name="EmailSignUpCompanies" type="email" class="form-control" id="InputEmailCompanies" placeholder="<?php echo ($email); ?>">
				</div>
				<div class="form-group">
					<label for="InputName">Name</label>
					<input name="NameSignUp" type="text" class="form-control" id="InputName" placeholder="<?php echo ($name); ?>">
				</div>
				<div class="form-group">
					<label for="InputDescription">Descr</label>
					<input name="DescriptionSignUp" type="textarea" class="form-control" id="InputDescription" placeholder="<?php echo ($description); ?>">
				</div>
				<div class="form-group">
					<label for="inputCity">City</label>
					<input name="CitySignUp" type="text" class="form-control" id="inputCity" placeholder="<?php echo ($city); ?>">
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
					<label for="InputNewPassword2">Confirm new password</label><i class="fas fa-info-circle"></i>
					<input name="NewPassword2" type="password" class="form-control" id="NewPassword2" placeholder="p@sSw0rd">
				</div>
				<div class="form-group">
					<label for="InputPic">Your Pic</label>
					<input name="PicSignUp" type="file" class="form-control" id="InputPic" accept="image/">
				</div>
				<div>
					<button name="SubmitUpdate" type="submit" class="btn btn-primary">Update</button>
				</div>


			</div>
	</main>
</div>




<?php include 'footer.php'; ?>


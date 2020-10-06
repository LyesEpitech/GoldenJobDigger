<?php include '../../Model/connexion.php' ?>
<!DOCTYPE html>

<html lang="fr">

<head>
	<meta charset="utf-8" />
	<title>Index</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../Style/style.css">
</head>

<body>

	<?php
	if (isset($_COOKIE['id'])) {
		echo 'Votre ID de session est le ' . $_COOKIE['id'];
	}
	
	?>

	<div class="container">

		<?php include 'header.php'; ?>
		<?php include '../../Controler/updatePeople.php' ?>

		<main>
			<form method="POST">
				<div>
					<div class="form-group">
						<label for="InputEmail1">Email address</label><i class="fas fa-info-circle"></i>
						<input name="EmailUpdate" type="email" class="form-control" id="InputEmail1" placeholder="<?php echo ($email); ?>">
					</div>
					<div class="form-group">
						<label for="InputFirstName">First name</label><i class="fas fa-info-circle"></i>
						<input name="FirstNameUpdate" type="text" class="form-control" id="InputFirstName" placeholder="<?php echo ($firstName); ?>">
					</div>
					<div class="form-group">
						<label for="InputLastName">Last name</label><i class="fas fa-info-circle"></i>
						<input name="LastNameUpdate" type="text" class="form-control" id="InputLastName" placeholder="<?php echo ($lastName); ?>">
					</div>
					<div class="form-group">
						<label for="inputSex">Sex</label>
						<select name="SexUpdate" id="inputSex" class="form-control">
							<option <?php if ($sex['sex'] == 'Male') {
										echo "selected='selected'";
									} ?>>Male</option>
							<option <?php if ($sex['sex'] == 'Female') {
										echo "selected='selected'";
									} ?>>Female</option>
						</select>
					</div>

					<div class="form-group">
						<label for="InputDate">Date of birth</label>
						<input name="DateUpdate" type="date" class="form-control" id="InputDate" value="<?php echo ($birthDate); ?>">
								</div>
					<div class="form-group">
						<label for="inputAddress">Address</label><i class="fas fa-info-circle"></i>
						<input name="AdressUpdate" type="text" class="form-control" id="inputAddress" placeholder="<?php echo ($adress); ?>"">
						</div>
						<div class=" form-group">
						<label for="inputCity">City</label><i class="fas fa-info-circle"></i>
						<input name="CityUpdate" type="text" class="form-control" id="inputCity" placeholder="<?php echo ($city); ?>"">
						</div>
						<div class=" form-group">
						<label for="inputZipCode">Zip Code</label><i class="fas fa-info-circle"></i>
						<input name="ZipCodeUpdate" type="text" class="form-control" id="inputZipCode" placeholder="<?php echo ($zipCode); ?>">
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
						<label for="InputResume">Your Resume</label>
						<input name="ResumeUpdate" type="file" class="form-control" id="InputResume" accept="application/pdf">
					</div>
				</div>
				<div>
					<button name="SubmitUpdate" type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
		</main>

		<?php include 'footer.php'; ?>






</body>

</html>
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
            if(isset($_COOKIE['id'])){
                echo 'Votre ID de session est le ' .$_COOKIE['id'];
            }
        ?>
	<div class="container">
		<?php include 'header.php';?>

		<main>
        <form method="POST">
					<div class="modal-body" id="modalBodySignUp">
						<div class="form-group">
							<label for="InputEmail1">Email address</label><i class="fas fa-info-circle"></i>
							<input name="EmailSignUp" type="email" class="form-control" id="InputEmail1" placeholder="example@example.com">
						</div>
						<div class="form-group">
							<label for="InputFirstName">First name</label><i class="fas fa-info-circle"></i>
							<input name="FirstNameSignUp" type="text" class="form-control" id="InputFirstName" placeholder="Bryan">
						</div>
						<div class="form-group">
							<label for="InputLastName">Last name</label><i class="fas fa-info-circle"></i>
							<input name="LastNameSignUp" type="text" class="form-control" id="InputLastName" placeholder="Johnson">
						</div>
						<div class="form-group">
							<label for="inputSex">Sex</label>
							<select name="SexSignUp" id="inputSex" class="form-control">
								<option selected>Male</option>
								<option>Female</option>
							</select>
						</div>
						<div class="form-group">
							<label for="InputDate">Date of birth</label>
							<input name="DateSignUp" type="date" class="form-control" id="InputDate">
						</div>
						<div class="form-group">
							<label for="InputTel">Phone number</label><i class="fas fa-info-circle"></i>
							<input name="TelSignUp" type="tel" class="form-control" id="InputTel" placeholder="0606060606">
						</div>
						<div class="form-group">
							<label for="inputAddress">Address</label><i class="fas fa-info-circle"></i>
							<input name="AdressSignUp" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
						</div>
						<div class="form-group">
							<label for="inputCity">City</label><i class="fas fa-info-circle"></i>
							<input name="CitySignUp" type="text" class="form-control" id="inputCity" placeholder="New York">
						</div>
						<div class="form-group">
							<label for="inputZipCode">Zip Code</label><i class="fas fa-info-circle"></i>
							<input name="ZipCodeSignUp" type="text" class="form-control" id="inputZipCode" placeholder="10001">
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
						<button name="SubmitSignUp" type="submit" class="btn btn-primary">Update</button>
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
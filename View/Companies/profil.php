<?php include '../../Model/connexion.php'?>
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
	<?php include 'header.php'; ?>
	<?php include '../../Controler/updateCompanies.php.php' ?>


	<H1> <?php echo ($name); ?> </H1> 

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


		</body>

		</html>



<?php include '../Model/connexion.php'?>
<?php include '../Controler/collectRegister.php'; ?>
<?php include '../Controler/collectLogin.php'; ?>
<!DOCTYPE html>

<html lang="fr">
<head>
	<meta charset="utf-8"/>
	<title>Index</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../Style/style.css">
</head>
<body class="bg-">
	<div class="container">
		<?php include 'header.php';?>

		<main>
            <img  class="rounded" width="100%" height="auto" src="../style/home.png" alt="homelogo">
			<?php include 'actusHome.php';?>
            <img  class="rounded" width="100%" height="auto" src="../style/home5.png" alt="homelogo5">

            <?php include 'companiesHome.php';?>
			<?php include 'jobsHome.php';?>	
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
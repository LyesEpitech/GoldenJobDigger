<?php include 'Model/connexion.php' ?>
<?php include 'Controler/collectRegister.php'; ?>
<?php include 'Controler/collectLogin.php'; ?>
<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Style/style.css">
</head>

<body class="bg-">
    <div class="container">
        <?php include 'View/header.php'; ?>

        <main>
            <div class="card">
                <h5 class="card-header">Titre</h5>
                <div class="card-body">
                    <p class="card-text">Description</p>
                    <small>Name of companie</small><img src="../Files/pics/'.$companiesPics.'" width="50" height="50">
                </div>
                <div id="learnMore1">

                </div>
                <button id="button1" onclick="learnMore(1)">Show more</button>
            </div>
        </main>

        <?php include 'View/footer.php'; ?>
    </div>
    <script src="https://kit.fontawesome.com/c5dc9dbc82.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="Script/main.js"></script>
</body>

</html>


<div class="modal fade" id="PostulerModal" tabindex="-1" role="dialog" aria-labelledby="PostulerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PostulerModalLabel">Postuler</h5>
                <button onclick="hide()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="EmailPostuler" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputMotivation">Description</label>
                        <textarea name="MotivationPostuler" type="text" class="form-control" id="exampleInputMotivation"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputLevel">Job Type</label>
                        <select name="level" id="inputLevel" class="form-control">
                            <option selected>Bac</option>
                            <option>Bac +1</option>
                            <option>Bac +2</option>
                            <option>Bac +3</option>
                            <option>Bac +4</option>
                            <option>Bac +5</option>
                            <option>+ de Bac +5</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="hide()" type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button name="Postuler" type="submit" class="btn btn-primary" value="`+ idAds + `">Postuler</button>
                </div>
            </form>
        </div>
    </div>
</div>
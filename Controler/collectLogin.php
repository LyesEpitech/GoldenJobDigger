<?php
 
$erreur = "";
if(isset($_POST['SubmitSignIn'])) {
    $mailconnect = $_POST['EmailSignIn'];
    $mdpconnect = $_POST['PasswordSignIn'];
    if(!empty($mailconnect) AND !empty($mdpconnect)) {
        $reqPeople = $dbh->prepare("SELECT * FROM people WHERE email = ? AND password = ?");
        $reqPeople->execute(array($mailconnect, hash("sha256", $mdpconnect)));
        $result = $reqPeople->rowCount();
        if($result) {
            $userinfo = $reqPeople->fetch();
            setcookie('id', $userinfo["id"], time()+3600*24,"/");
            setcookie('role', $userinfo["role"], time()+3600*24,"/");
        } else {
            $reqCompanies = $dbh->prepare("SELECT * FROM companies WHERE email = ? AND password = ? ");
            $reqCompanies->execute(array($mailconnect, hash("sha256", $mdpconnect)));
            $result = $reqCompanies->rowCount();
            if($result) {
                $userinfo = $reqCompanies->fetch();
                setcookie('id', $userinfo["id"], time()+3600*24,"/");
                setcookie('role', $userinfo["role"], time()+3600*24,"/");   
            } else {
            $erreur = "Mauvais mail ou mot de passe !";
            }
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }




    }



    echo $erreur;

      




?>


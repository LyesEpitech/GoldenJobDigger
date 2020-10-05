<?php
    if(!empty($_COOKIE['id']) AND !empty($_COOKIE['role'])){
        setcookie('id', null, -1, '/'); 
        setcookie('role', null, -1, '/');
        header('Location: ../View/home.php');
    }else{
        header('Location: ../View/home.php');
    }        
?>
<?php
    require_once('..\inc\fonctions\function.php');
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $genre = $_POST['genre'];
    $dtn = $_POST['date-naissance'];
    $mdp = $_POST['mots-de-passe'];
    $rmdp = $_POST['confirm-mots-de-passe'];
    if ($mdp==$rmdp) {
        inscription($nom, $email, $dtn, $genre, $mdp,false);
        header('Location:home-admin.php');
    }else {
        header('Location:home-admin.php?erreur=1');
    }
?>
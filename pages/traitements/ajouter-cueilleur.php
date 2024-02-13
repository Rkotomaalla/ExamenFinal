<?php
    include('../../inc/fonctions/f_cueilleur.php');
    // $num = $_POST['numAjout'];
    $nom = $_POST['nomAjout'];
    $genre = $_POST['genreAjout'];
    $ddn = $_POST['ddnAjout'];
    insert_cueilleur($nom, $genre,$ddn);
    header('Location:../../inc/modeles/modele-admin.php?page=cueilleur');
?>
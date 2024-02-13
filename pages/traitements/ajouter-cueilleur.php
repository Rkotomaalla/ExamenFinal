<?php
    include('../../inc/fonctions/include.php');
    // $num = $_POST['numAjout'];
    $nom = $_POST['nomAjout'];
    $genre = $_POST['genreAjout'];
    $ddn = $_POST['ddnAjout'];
    insert_cueilleur($nom, $genre,$ddn);
    header('Location:../../inc/modeles/modele-admin.php?page=cueilleur');
?>
<?php
    include('../../inc/fonctions/include.php');
    $id = $_POST['id_modif'];
    $nom = $_POST['nom_modif'];
    $genre = $_POST['genre_modif'];
    $ddn = $_POST['ddn_modif'];
    modifier_cueilleur($id, $nom, $genre, $ddn);
    header('Location:../../inc/modeles/modele-admin.php?page=cueilleur');
?>
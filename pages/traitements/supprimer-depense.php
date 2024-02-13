<?php
    include('../../inc/fonctions/include.php');
    $id = $_GET['id'];
    suprimer_categorie_depanse($id);
    header('Location:../../inc/modeles/modele-admin.php?page=categorie_depanse');
?>
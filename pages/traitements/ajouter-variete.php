<?php
    include('../../inc/fonctions/include.php');
    $nom = $_POST['nomAjout'];
    $occupation = $_POST['occupationAjout'];
    $rendement = $_POST['rendementAjout'];
    insert_the($nom, $occupation, $rendement);
    header('Location:../../inc/modeles/modele-admin.php?page=variete');
?>
<?php
    include('../../inc/fonctions/include.php');
    $nom = $_POST['nomAjout'];
    $occupation = $_POST['occupationAjout'];
    $rendement = $_POST['rendementAjout'];
    $prix_vente = $_POST['prix_venteAjout'];
    insert_the($nom, $occupation, $rendement,$prix_vente);
    header('Location:../../inc/modeles/modele-admin.php?page=variete');
?>
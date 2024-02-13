<?php
    include('../../inc/fonctions/include.php');
    $id = $_POST['id_modif'];
    $nom = $_POST['nom_modif'];
    $occupation = $_POST['occupation_modif'];
    $rendement = $_POST['rendement_modif'];
    $prix_vente = $_POST['prix_vente_modif'];
    modifier_the($id, $nom, $occupation, $rendement,$prix_vente);
    header('Location:../../inc/modeles/modele-admin.php?page=variete');
?>
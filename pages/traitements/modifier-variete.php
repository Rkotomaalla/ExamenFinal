<?php
    include('../../inc/fonctions/f_the.php');
    $id = $_POST['id_modif'];
    $nom = $_POST['nom_modif'];
    $occupation = $_POST['occupation_modif'];
    $rendement = $_POST['rendement_modif'];
    modifier_the($id, $nom, $occupation, $rendement);
    header('Location:../../inc/modeles/modele-admin.php?page=variete');
?>
<?php
    include('..\inc\fonctions\include.php');
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $occupation = $_POST['occupation'];
    $rendement = $_POST['rendement'];
    modifVariete($id,$nom,$occupation,$rendement);
    header('Location:home-admin.php?fonction=1');
?>
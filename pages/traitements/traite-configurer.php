<?php
    require_once('../../inc/fonctions/include.php');
    $min=$_GET['min'];
    $cueilleur=$_GET['cueilleur'];
    $bonus=$_GET['bonus'];
    $mallus=$_GET['mallus'];
    insert_minJournalier ($min, $cueilleur);
    header('Location:../../inc/modeles/modele-admin.php?page=variete');
?>
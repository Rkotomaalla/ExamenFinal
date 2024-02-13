<?php
    require_once('../../inc/fonctions/include.php');
    $min=$_GET['min'];
    $cueilleur=$_GET['ceuilleur'];
    $bonus=$_GET['bonus'];
    $mallus=$_GET['mallus'];
    insert_minJournalier ($min, $cueilleur);
    $valiny=set_bonus_mallus ($bonus, $mallus);
    echo $valiny['retour'];
    header('Location:../../inc/modeles/modele-admin.php?page=variete');
?>
<?php
    require_once('../../inc/fonctions/include.php');
    // Récupération des données POST
    $date = $_POST['date'];
    $cat = $_POST['categorie'];
    $montant = $_POST['montant'];

    $result = insert_depanse($date, $cat, $montant);
    if ($result['retour']) {
        echo "ok";
        
    }else{
        echo "non";
    }
?>


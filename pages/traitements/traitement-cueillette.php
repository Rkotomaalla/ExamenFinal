<?php
    require_once('../../inc/fonctions/include.php');
    // Récupération des données POST
    $poids = $_POST['poids'];
    $date = $_POST['date'];
    $cueilleur = $_POST['ceuilleur'];
    $parcelle = $_POST['parcelle'];

    // Vérification si le poids de la cueillette dépasse le poids total déjà cueilli dans la parcelle
    if (verifier_cueillette($date, $parcelle, $poids)['cueillette']) {
        // Insertion de la cueillette dans la base de données
        $result = insert_cueillette($date, $cueilleur, $parcelle, $poids);
        if ($result['retour']) {
            echo "success";
        } else {
            echo "probleme";
        }
    } else {
        echo "error";
    }
?>
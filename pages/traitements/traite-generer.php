<?php
    require_once('../../inc/fonctions/include.php');
    if(isset($_GET['mois'])) {
        $mois_selectionnes = $_GET['mois'];
        foreach($mois_selectionnes as $mois) {
            insert_regeneration ($mois);
            // echo($mois);
        }
    }
    header('Location:../../inc/modeles/modele-admin.php?page=variete');
?>
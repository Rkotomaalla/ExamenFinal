<?php
    include('../../inc/fonctions/include.php');
    // $num = $_POST['numAjout'];
    $dt = $_POST['dateAjout'];
    $prix = $_POST['prixAjout'];
    insert_salaire($dt, $prix);
    header('Location:../../inc/modeles/modele-admin.php?page=salaire');
?>
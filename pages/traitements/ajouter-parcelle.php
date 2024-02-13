<?php
    include('../../inc/fonctions/include.php');
    // $num = $_POST['numAjout'];
    $surface = $_POST['surfaceAjout'];
    $id_the = $_POST['id_theAjout'];
    insert_parcelle($surface, $id_the);
    header('Location:../../inc/modeles/modele-admin.php?page=parcelle');
?>
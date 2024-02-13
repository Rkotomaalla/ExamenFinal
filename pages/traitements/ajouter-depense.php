<?php
    include('../../inc/fonctions/include.php');
    // $num = $_POST['numAjout'];
    $nom = $_POST['nomAjout'];
    insert_categDep($nom);
    header('Location:../../inc/modeles/modele-admin.php?page=depense');
?>
<?php
    include('../../inc/fonctions/f_categorie_depanse.php');
    // $num = $_POST['numAjout'];
    $nom = $_POST['nomAjout'];
    insert_categDep($nom);
    header('Location:../../inc/modeles/modele-admin.php?page=depense');
?>
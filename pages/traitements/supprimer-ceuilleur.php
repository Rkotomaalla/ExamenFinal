<?php
    include('../../inc/fonctions/include.php');
    $id = $_GET['id'];
    suprimer_cueilleur($id);
    header('Location:../../inc/modeles/modele-admin.php?page=cueilleur');
?>
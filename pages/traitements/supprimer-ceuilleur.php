<?php
    include('../../inc/fonctions/f_cueilleur.php');
    $id = $_GET['id'];
    suprimer_cueilleur($id);
    header('Location:../../inc/modeles/modele-admin.php?page=cueilleur');
?>
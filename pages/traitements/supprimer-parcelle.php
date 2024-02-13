<?php
    include('../../inc/fonctions/f_parcelle.php');
    $id = $_GET['id'];
    suprimer_parcelle($id);
    header('Location:../../inc/modeles/modele-admin.php?page=parcelle');
?>
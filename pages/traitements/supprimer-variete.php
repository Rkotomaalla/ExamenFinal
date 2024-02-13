<?php
    include('../../inc/fonctions/include.php');
    $id = $_GET['id'];
    suprimer_the($id);
    header('Location:../../inc/modeles/modele-admin.php?page=variete');
?>
<?php
    include('../../inc/fonctions/f_the.php');
    $id = $_GET['id'];
    suprimer_the($id);
    header('Location:../../inc/modeles/modele-admin.php?page=variete');
?>
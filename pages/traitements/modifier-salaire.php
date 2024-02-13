<?php
    include('../../inc/fonctions/f_salaire.php');
    $id = $_POST['id_modif'];
    $date = $_POST['dt_modif'];
    $prix = $_POST['prix_modif'];
    modifier_the($id, $date, $prix);
    header('Location:../../inc/modeles/modele-admin.php?page=salaire');
?>
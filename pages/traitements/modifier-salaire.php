<?php
    include('../../inc/fonctions/include.php');
    $id = $_POST['id_modif'];
    $date = $_POST['date_modif'];
    $prix = $_POST['prix_modif'];
    modifier_salaire($id, $date, $prix);
    header('Location:../../inc/modeles/modele-admin.php?page=salaire');
?>
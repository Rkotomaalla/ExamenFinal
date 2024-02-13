<?php
    include('../../inc/fonctions/f_parcelle.php');
    $id = $_POST['num_modif'];
    $surface = $_POST['surface_modif'];
    $id_the = $_POST['id_the_modif'];
    modifier_parcelle($id, $surface, $id_the);
    header('Location:../../inc/modeles/modele-admin.php?page=parcelle');
?>
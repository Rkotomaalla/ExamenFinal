<?php
    include('../../inc/fonctions/include.php');
    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];
    $reponse=get_poidsRestant_parcelle($date1, $date2);
    echo $reponse['reste'];
?>
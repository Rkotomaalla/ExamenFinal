<?php
    include('../../inc/fonctions/include.php');
    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];
    $reponse=get_sumCueilli($date1, $date2);
    echo JSON.encode($reponse);
?>
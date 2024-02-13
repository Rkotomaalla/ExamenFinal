<?php
    function connexion_bdd () {
        $user = "ETU002505"; 
        $mdp = "QsGh0G8zFoVR"; 
        $bdd = "db_p16_ETU002505";
        
        static $connect = null; 
        if ($connect === null) {
            $connect = mysqli_connect('localhost', $user, $mdp, $bdd);
            mysqli_set_charset($connect, "utf8");
        }
        return $connect;
    }
?>
<?php
    function connexion_bdd () {
        $user = "root"; 
        $mdp = ""; 
        $bdd = "examfinal_s3";
        
        static $connect = null; 
        if ($connect === null) {
            $connect = mysqli_connect('localhost', $user, $mdp, $bdd);
            mysqli_set_charset($connect, "utf8");
        }
        return $connect;
    }
?>
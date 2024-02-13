<?php

    function insert_regeneration ($mois) {
        /**
         * le mois en INT 
         */
        $connexion = connexion_bdd ();
        $requete = sprintf("INSERT into examfinal_s3_regeneration (mois) values (%d)", $mois);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        // mysqli_close($connexion);
        return $res;   
    }


    function insert_minJournalier ($min, $id_cueilleur) {
        
        $connexion = connexion_bdd ();
        $requete = sprintf("INSERT into examfinal_s3_min_journalier (min, id_cueilleur) values (%f, %d)", $min, $id_cueilleur);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        // mysqli_close($connexion);
        return $res;   
    }

    



?>
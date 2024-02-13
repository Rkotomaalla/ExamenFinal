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

    function set_bonus_mallus ($bonus, $mallus) {
        $connexion = connexion_bdd ();
        $requete = sprintf("insert into examfinal_s3_bonus_mallus values (%f,%f)", $bonus, $mallus);
        echo $requete;
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => "tonga");
        } else {
            $res = array('retour' => "tsia");
        }
        return $res;
    }

    function get_bonus_mallus () {
        $bonus_mallus = null;
        $requte = sprintf("select bonus, mallus from examfinal_s3_bonus_mallus");
        $connexion = connexion_bdd();
        $donnee = mysqli_query($connexion, $requte);

        if ($donnee && mysqli_num_rows($donnee) > 0) {
            $res = mysqli_fetch_assoc($donnee);
            $bonus_mallus = $res;
        }
        mysqli_free_result($donnee);
        return $bonus_mallus;
    }
?>
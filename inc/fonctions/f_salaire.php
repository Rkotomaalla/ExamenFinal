<?php

    include ("connexion.php");

    function insert_salaire ($date, $prix) {
        /**
         * le prix est un DOUBLE
         */
        $connexion = connexion_bdd ();
        $requete = sprintf("INSERT into examfinal_s3_salaire (dt, prix) values ('%s', %f)", $date, $prix);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        mysqli_close($connexion);
        return $res;   
    }

    function get_allSalaire () : array {
        $liste_cueilleur = array ();
        $requte = "SELECT * from examfinal_s3_salaire";
        $connexion = connexion_bdd();

        $donnee = mysqli_query($connexion, $requte);
        if ($donnee) {
            while ($res = mysqli_fetch_assoc($donnee)) {
                $liste_cueilleur[] = $res;
            }
        }
        mysqli_free_result($donnee);
        mysqli_close($connexion);
        return $liste_cueilleur;
    }

    function get_salaire_byID ($id) {
        $salaire = null;
        $requte = sprintf('SELECT * from examfinal_s3_salaire where id = %d', $id);
        $connexion = connexion_bdd();
        $donnee = mysqli_query($connexion, $requte);

        if ($donnee) {
            $res = mysqli_fetch_assoc($donnee);
            $salaire = $res;
        } else {
            $salaire = array('salaire' => null);
        }
        mysqli_free_result($donnee);
        mysqli_close($connexion);
        return $salaire;
    }

    function modifier_salaire ($id, $date, $prix) {
        $connexion = connexion_bdd ();
        $requete = sprintf("UPDATE examfinal_s3_salaire SET dt = '%s', prix = %f where id = %d", $date, $prix, $id);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        mysqli_close($connexion);
        return $res;
    }
?>
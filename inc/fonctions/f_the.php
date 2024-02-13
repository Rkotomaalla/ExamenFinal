<?php

    // include ('connexion.php');

    function insert_the ($nom, $occupation, $rendement) {
        $connexion = connexion_bdd ();
        $requete = sprintf("INSERT into examfinal_s3_the (nom, occupation, rendement) values ('%s', %f, %f)", $nom, $occupation, $rendement);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        mysqli_close($connexion);
        return $res;
    }

    function get_allthe () {
        $liste_the = array ();
        $requte = "SELECT * from examfinal_s3_the";
        $connexion = connexion_bdd();

        $donnee = mysqli_query($connexion, $requte);
        if ($donnee) {
            while ($res = mysqli_fetch_assoc($donnee)) {
                $liste_the[] = $res;
            }
        }
        mysqli_free_result($donnee);
        return $liste_the;

    }

    function modifier_the ($id, $nom, $occupation, $rendement) {
        $connexion = connexion_bdd ();
        $requete = sprintf("UPDATE examfinal_s3_the SET nom = '%s', occupation = %f, rendement = %f where id = %d", $nom, $occupation, $rendement, $id);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        mysqli_close($connexion);
        return $res;
    }

    function suprimer_the ($id) {
        $connexion = connexion_bdd ();
        $requete = sprintf("DELETE from examfinal_s3_the where id = %d", $id);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        mysqli_close($connexion);
        return $res;
    }

?>
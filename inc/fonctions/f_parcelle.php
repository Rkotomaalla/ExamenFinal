<?php

    function insert_parcelle ($surface, $id_the) {
        $connexion = connexion_bdd ();
        $requete = sprintf("INSERT into examfinal_s3_parcelle (surface, id_the) values (%f, %d)", $surface, $id_the);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        mysqli_close($connexion);
        return $res;
    }

    function get_allparcelle () {
        $liste_parcelle = array ();
        $requte = "SELECT * from examfinal_s3_parcelle";
        $connexion = connexion_bdd();

        $donnee = mysqli_query($connexion, $requte);
        if ($donnee) {
            while ($res = mysqli_fetch_assoc($donnee)) {
                $liste_parcelle[] = $res;
            }
        }
        mysqli_free_result($donnee);
        return $liste_parcelle;

    }

    function modifier_parcelle ($id, $surface, $id_the) {
        $connexion = connexion_bdd ();
        $requete = sprintf("UPDATE examfinal_s3_parcelle SET surface = %f, id_the = %d where num_parcelle = %d", $surface, $id_the, $id);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        mysqli_close($connexion);
        return $res;
    }

    function suprimer_parcelle ($id) {
        $connexion = connexion_bdd ();
        $requete = sprintf("DELETE from examfinal_s3_parcelle where num_parcelle = %d", $id);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        mysqli_close($connexion);
        return $res;
    }

?>
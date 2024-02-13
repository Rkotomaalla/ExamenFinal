<?php

     
    function insert_cueilleur ($nom, $genre, $date_naiss) {
        $connexion = connexion_bdd ();
        $requete = sprintf("INSERT into examfinal_s3_cueilleur (nom, genre, date_naiss) values ('%s', '%s', '%s')", $nom, $genre, $date_naiss);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        mysqli_close($connexion);
        return $res;
    }
 
    function get_allCueilleur () {
        $connexion = connexion_bdd();
        $liste_cueilleur = array ();
        $requte = "SELECT * from examfinal_s3_cueilleur";

        $donnee = mysqli_query($connexion, $requte);
        if ($donnee) {
            while ($res = mysqli_fetch_assoc($donnee)) {
                $liste_cueilleur[] = $res;
            }
        }
        mysqli_free_result($donnee);
        return $liste_cueilleur;
    }

    function get_Cueilleur_byID ($id) {
        $cueilleur = null;
        $requte = sprintf('SELECT * from examfinal_s3_cueilleur where id = %d', $id);
        $connexion = connexion_bdd();

        $donnee = mysqli_query($connexion, $requte);

        if ($donnee) {
            while ($res = mysqli_fetch_assoc($donnee)) {
                $cueilleur = $res;
            }
        } else {
            $cueilleur = array('cueilleur' => null);
        }
        mysqli_free_result($donnee);
        mysqli_close($connexion);
        return $cueilleur;

    }

    function modifier_cueilleur ($id, $nom, $genre, $date_naiss) {
        $connexion = connexion_bdd ();
        $requete = sprintf("UPDATE examfinal_s3_cueilleur SET nom = '%s', genre = '%s', date_naiss = '%s' where id = %d", $nom, $genre, $date_naiss, $id);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        mysqli_close($connexion);
        return $res;
    }

    function suprimer_cueilleur ($id) {
        $connexion = connexion_bdd ();
        $requete = sprintf("DELETE from examfinal_s3_cueilleur where id = %d", $id);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        mysqli_close($connexion);
        return $res;
    }


    // insertion cueillette

    function insert_cueillette ($date, $id_cueilleur, $id_parcelle, $poids) {
        $connexion = connexion_bdd ();
        $requete = sprintf("INSERT into examfinal_s3_cueillette (dt, id_cueilleur, id_parcelle, poids) values ('%s', %d, %d, %f)", $date, $id_cueilleur, $id_parcelle, $poids);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        mysqli_close($connexion);
        return $res;
    }

    function calcule_poid_cueilli_parcelle($id_parcelle,$date) {
        $conn = connexion_bdd();
        $dates = new DateTime($date);
        $month = $dates->format('m');
        $year = $dates->format('Y');
        $sql = "SELECT SUM(poids) AS somme FROM examfinal_s3_cueillette 
                where EXTRACT(MONTH FROM dt) = '$month' 
                AND EXTRACT(YEAR FROM dt) = '$year' and id_parcelle = ".$id_parcelle."";
        $result = mysqli_query($conn, $sql);
        $somme= 0;
        while ($donnees = mysqli_fetch_assoc($result)) {
            $somme += $donnees['somme'];
        }
        
        return $somme;
    }

?>
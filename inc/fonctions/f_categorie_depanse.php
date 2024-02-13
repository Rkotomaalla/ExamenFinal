<?php


    function insert_categDep ($nom) {
        $connexion = connexion_bdd ();
        $requete = sprintf("INSERT into examfinal_s3_categ_dep (nom) values ('%s')", $nom);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        mysqli_close($connexion);
        return $res;
    }

    function get_allCategDep () : array {
        $liste_cueilleur = array ();
        $requte = "SELECT * from examfinal_s3_categ_dep";
        $connexion = connexion_bdd();

        $donnee = mysqli_query($connexion, $requte);
        if ($donnee) {
            while ($res = mysqli_fetch_assoc($donnee)) {
                $liste_cueilleur[] = $res;
            }
        }
        mysqli_free_result($donnee);
        return $liste_cueilleur;
    }

    function get_CategDepByID ($id) {
        $categorie_dep = null;
        $requte = sprintf('SELECT * from examfinal_s3_categ_dep where id = %d', $id);
        $connexion = connexion_bdd();
        $donnee = mysqli_query($connexion, $requte);

        if ($donnee) {
            $res = mysqli_fetch_assoc($donnee);
            $categorie_dep = $res;
        } else {
            $categorie_dep = array('categorie_dep' => null);
        }
        mysqli_free_result($donnee);
        mysqli_close($connexion);
        return $categorie_dep;
    }

    // saisi depanse ----
    function insert_depanse ($date, $id_categ_dep, $montant) {
        
        $connexion = connexion_bdd ();
        $requete = sprintf("INSERT into examfinal_s3_depanse(dt, id_dep_categ, montant) values ('%s', %d, %f)", $date, $id_categ_dep, $montant);
        if (mysqli_query($connexion, $requete)) {
            $res = array('retour' => true);
        } else {
            $res = array('retour' => false);
        }
        mysqli_close($connexion);
        return $res;
    }
?>
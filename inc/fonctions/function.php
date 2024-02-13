<?php

    // include ("connexion.php");

    function login ($emil, $mdp, $is_admin) {
        /**
         * $is_admin BOOLEAN
         */

        $requete_admin = sprintf("select * from examfinal_s3_admin where email = '%s' and mdp = '%s'", $emil, $mdp);
        $requete_simple = sprintf("select * from examfinal_s3_user where email = '%s' and mdp = '%s'", $emil, $mdp);
        $res = null;
        if ($is_admin == "true") { // admin
            $res = log_admin ($requete_admin);
        } else {
            $res = log_simple ($requete_simple);
        }
        return $res;
    }

    function log_admin ($requete) {
        $connexion = connexion_bdd ();
        $res = null;
        $donnee = mysqli_query($connexion, $requete);
        if ($donnee) {
            if (mysqli_num_rows($donnee) > 0) {
                $res = array('retour' => 1);
            } else {
                $res = array('retour' => -1);
            }
        } else {
            $res = array('retour' => -1);
        }
        mysqli_close($connexion);
        return $res;
    } 

    function log_simple ($requete) {
        $connexion = connexion_bdd ();
        $res = null;
        $donnee = mysqli_query($connexion, $requete);
        if ($donnee) {
            if (mysqli_num_rows($donnee) > 0) { 
                $res = array('retour' => 0);
            } else {
                $res = array('retour' => -1);
            }
        } else {
            $res = array('retour' => -1);
        }
        mysqli_close($connexion);
        return $res;
    }

    function verifier_cueillette ($date, $id_parcelle, $poids) {
        $res = null;
        $rendement = (get_recolte_parMois($id_parcelle))['rendement'] - (get_total_cueillette_fait($date, $id_parcelle))['ttl_poids'];
        $reste = $rendement - $poids; // reste rendement - poids du cueillette
        if ($reste < 0) {
            return $res = array ('cueillette' => false);
        } else {
            return $res = array ('cueillette' => true);
        }
    }

    function get_recolte_parMois ($id_parcelle) {
        $recolte_parMois = null;
        $requte = sprintf('SELECT rendement from examfinal_s3_v_recolt_mois where num_parcelle = %d', $id_parcelle);
        $connexion = connexion_bdd();
        $donnee = mysqli_query($connexion, $requte);
    
        if ($donnee && mysqli_num_rows($donnee) > 0) {
            $res = mysqli_fetch_assoc($donnee);
            $recolte_parMois = $res;
        } else {
            $recolte_parMois = array('rendement' => 0);
        }
    
        mysqli_free_result($donnee);
        return $recolte_parMois;
    }
    
    function get_total_cueillette_fait ($date, $id_parcelle) {
        $recolte_fait = null;
    
        $date_format = DateTime::createFromFormat('Y-m-d', $date);
        $mois = $date_format->format('n');
        $annee = $date_format->format('Y');
        $requete = sprintf("SELECT sum(poids) ttl_poids from examfinal_s3_cueillette where month(dt) = %d  and year(dt) = %d and id_parcelle = %d", $mois, $annee, $id_parcelle);
    
        $connexion = connexion_bdd();
        $donnee = mysqli_query($connexion, $requete);
    
        if ($donnee && mysqli_num_rows($donnee) > 0) {
            $res = mysqli_fetch_assoc($donnee);
            $recolte_fait = $res;
        } else {
            $recolte_fait = array('ttl_poids' => 0);
        }
    
        mysqli_free_result($donnee);
        return $recolte_fait;
    }
    
?>
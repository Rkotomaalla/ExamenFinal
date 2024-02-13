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

        if ($donnee) {
            $res = mysqli_fetch_assoc($donnee);
            $recolte_parMois = $res;
        } else {
            $recolte_parMois = array('rendement' => 0);
        }
        mysqli_free_result($donnee);
        return $recolte_parMois;
    }

    function get_total_cueillette_fait ($date, $id_parcelle,) {
        $recolte_fait = null;

        $date_format = DateTime::createFromFormat('Y-m-d', $date);
        $mois = $date_format->format('n');
        $annee = $date_format->format('Y');
        $requete = sprintf("SELECT sum(poids) ttl_poids from examfinal_s3_cueillette where month(dt) = %d  and year(dt) = %d and id_parcelle = %d", $mois, $annee, $id_parcelle);

        $connexion = connexion_bdd();
        $donnee = mysqli_query($connexion, $requete);

        if ($donnee) {
            $res = mysqli_fetch_assoc($donnee);
            if ($res['ttl_poids'] == null) {
                $recolte_fait = array('ttl_poids' => 0); // rendre 0
            } else {
                $recolte_fait = $res;
            }
        } else {
            $recolte_fait = array('ttl_poids' => 0); // rendre 0
        }
        mysqli_free_result($donnee);
        return $recolte_fait;
    }

    // function insert_parcelle ($surface, $id_the) {
    //     $connexion = connexion_bdd ();
    //     $requete = sprintf("INSERT into examfinal_s3_parcelle (surface, id_the) values (%f, %d)", $surface, $id_the);
    //     if (mysqli_query($connexion, $requete)) {
    //         $res = array('retour' => true);
    //     } else {
    //         $res = array('retour' => false);
    //     }
    //     mysqli_close($connexion);
    //     return $res;
    // }

    // function get_allparcelle() {
    //     $liste_parcelle = array();
    //     $requte = "SELECT * FROM examfinal_s3_parcelle";
    //     $connexion = connexion_bdd();
    //     $donnee = mysqli_query($connexion, $requte);
    //     if ($donnee) {
    //         while ($res = mysqli_fetch_assoc($donnee)) {
    //             $liste_parcelle[] = $res;
    //         }
    //         mysqli_free_result($donnee); // Libérer les résultats de la requête
    //     }
    //     mysqli_close($connexion); // Fermer la connexion à la base de données après avoir récupéré les données
    //     return $liste_parcelle;
    // }
    
    

    // function modifier_parcelle ($id, $surface, $id_the) {
    //     $connexion = connexion_bdd ();
    //     $requete = sprintf("UPDATE examfinal_s3_parcelle SET surface = %f, id_the = %d where num_parcelle = %d", $surface, $id_the, $id);
    //     if (mysqli_query($connexion, $requete)) {
    //         $res = array('retour' => true);
    //     } else {
    //         $res = array('retour' => false);
    //     }
    //     mysqli_close($connexion);
    //     return $res;
    // }

    // function suprimer_parcelle ($id) {
    //     $connexion = connexion_bdd ();
    //     $requete = sprintf("DELETE from examfinal_s3_parcelle where num_parcelle = %d", $id);
    //     if (mysqli_query($connexion, $requete)) {
    //         $res = array('retour' => true);
    //     } else {
    //         $res = array('retour' => false);
    //     }
    //     mysqli_close($connexion);
    //     return $res;
    // }

    // function insert_cueilleur ($nom, $genre, $date_naiss) {
    //     $connexion = connexion_bdd ();
    //     $requete = sprintf("INSERT into examfinal_s3_cueilleur (nom, genre, date_naiss) values ('%s', '%s', '%s')", $nom, $genre, $date_naiss);
    //     if (mysqli_query($connexion, $requete)) {
    //         $res = array('retour' => true);
    //     } else {
    //         $res = array('retour' => false);
    //     }
    //     mysqli_close($connexion);
    //     return $res;
    // }

    // function get_allCueilleur () {
    //     $liste_cueilleur = array ();
    //     $requte = "SELECT * from examfinal_s3_cueilleur";
    //     $connexion = connexion_bdd();

    //     $donnee = mysqli_query($connexion, $requte);
    //     if ($donnee) {
    //         while ($res = mysqli_fetch_assoc($donnee)) {
    //             $liste_cueilleur[] = $res;
    //         }
    //     }
    //     mysqli_free_result($donnee);
    //     mysqli_close($connexion);
    //     return $liste_cueilleur;

    // }

    // function get_Cueilleur_byID ($id) {
    //     $cueilleur = null;
    //     $requte = sprintf('SELECT * from examfinal_s3_cueilleur where id = %d', $id);
    //     $connexion = connexion_bdd();

    //     $donnee = mysqli_query($connexion, $requte);

    //     if ($donnee) {
    //         while ($res = mysqli_fetch_assoc($donnee)) {
    //             $cueilleur = $res;
    //         }
    //     } else {
    //         $cueilleur = array('cueilleur' => null);
    //     }
    //     mysqli_free_result($donnee);
    //     mysqli_close($connexion);
    //     return $cueilleur;

    // }

    // function modifier_cueilleur ($id, $nom, $genre, $date_naiss) {
    //     $connexion = connexion_bdd ();
    //     $requete = sprintf("UPDATE examfinal_s3_cueilleur SET nom = '%s', genre = '%s', date_naiss = '%s' where id = %d", $nom, $genre, $date_naiss, $id);
    //     if (mysqli_query($connexion, $requete)) {
    //         $res = array('retour' => true);
    //     } else {
    //         $res = array('retour' => false);
    //     }
    //     mysqli_close($connexion);
    //     return $res;
    // }

    // function suprimer_cueilleur ($id) {
    //     $connexion = connexion_bdd ();
    //     $requete = sprintf("DELETE from examfinal_s3_cueilleur where id = %d", $id);
    //     if (mysqli_query($connexion, $requete)) {
    //         $res = array('retour' => true);
    //     } else {
    //         $res = array('retour' => false);
    //     }
    //     mysqli_close($connexion);
    //     return $res;
    // }


    // // insertion cueillette

    // function insert_cueillette ($date, $id_cueilleur, $id_parcelle, $poids) {
    //     $connexion = connexion_bdd ();
    //     $requete = sprintf("INSERT into examfinal_s3_cueillette (dt, id_cueilleur, id_parcelle, poids) values ('%s', %d, %d, %f)", $date, $id_cueilleur, $id_parcelle, $poids);
    //     if (mysqli_query($connexion, $requete)) {
    //         $res = array('retour' => true);
    //     } else {
    //         $res = array('retour' => false);
    //     }
    //     mysqli_close($connexion);
    //     return $res;
    // }



?>
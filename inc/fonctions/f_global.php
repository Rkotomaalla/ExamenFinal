<?php
    
    include ('connexion.php');

    function get_poids_totalCueillette () {
        // par mois 
        $liste_cueillette = array ();
        $requte = "SELECT date, cueillette from examfinal_s3_v_allinfo";
        $connexion = connexion_bdd();

        $donnee = mysqli_query($connexion, $requte);
        if ($donnee) {
            while ($res = mysqli_fetch_assoc($donnee)) {
                $liste_cueillette[] = $res;
            }
        }
        mysqli_free_result($donnee);
        mysqli_close($connexion);
        return $liste_cueillette;
    }

    function get_poidsRestant_parcelle () {
        // par parcelle
        
        $liste_restant_parParcelle = array ();
        $requte = "SELECT id_parcelle, date, reste from examfinal_s3_v_info_parcelle";
        $connexion = connexion_bdd();

        $donnee = mysqli_query($connexion, $requte);
        if ($donnee) {
            while ($res = mysqli_fetch_assoc($donnee)) {
                $liste_restant_parParcelle[] = $res;
            }
        }
        mysqli_free_result($donnee);
        mysqli_close($connexion);
        return $liste_restant_parParcelle;
    }

    function get_cout_revient_parMois () {
        // cout de revient par mois 
        
        $liste_cout_revParMois = array ();
        $requte = "SELECT date, cout_rev from examfinal_s3_v_cout_revient";
        $connexion = connexion_bdd();

        $donnee = mysqli_query($connexion, $requte);
        if ($donnee) {
            while ($res = mysqli_fetch_assoc($donnee)) {
                $liste_cout_revParMois[] = $res;
            }
        }
        mysqli_free_result($donnee);
        mysqli_close($connexion);
        return $liste_cout_revParMois;
    }


?>
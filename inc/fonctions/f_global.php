<?php
    
    /**
     *  - date debut 
     *  - date fin 
     *  => resultat entre 2 dates
     */





    function get_poids_totalCueillette ($date_debut, $date_fin) {
        // par mois 
        $liste_cueillette = array ();
        $requte = sprintf("SELECT sum(poids) ttl_cueillette from examfinal_s3_cueillette where '%s' >= dt and dt >= '%s'", $date_fin, $date_debut);
        $connexion = connexion_bdd();

        $donnee = mysqli_query($connexion, $requte);
        if ($donnee) {
            while ($res = mysqli_fetch_assoc($donnee)) {
                $liste_cueillette[] = $res;
            }
        }
        mysqli_free_result($donnee);
        return $liste_cueillette;
    }

    function get_poidsRestant_parcelle ($date_debut, $date_fin) {
        // par parcelle
        
        $liste_restant_parParcelle = array ();
        $requte = sprintf("SELECT sum(reste) reste from (SELECT sum_cueil.id_parcelle id_parcelle, sum_cueil.dt dt, ((rec_mois.rendement * sum_cueil.nbr_foisparcelle) - sum_cueil.ttl_cueille) reste from (select id_parcelle, max(dt) dt, sum(poids) ttl_cueille, count(id_parcelle) nbr_foisparcelle from (select * from examfinal_s3_cueillette where '%s' >= dt and dt >= '%s') as cueille group by id_parcelle) as sum_cueil left join examfinal_s3_v_recolt_mois as rec_mois on sum_cueil.id_parcelle = rec_mois.num_parcelle) as r", $date_fin, $date_debut);
        $connexion = connexion_bdd();

        $donnee = mysqli_query($connexion, $requte);
        if ($donnee && mysqli_num_rows($donnee) > 0) {
            $res = mysqli_fetch_assoc($donnee);
            if ($res['reste'] != null) {
                $recolte_parMois = $res;
            } else {
                $recolte_parMois = array('reste' => 0);
            }
        } else {
            $recolte_parMois = array('reste' => 0);
        }
        mysqli_free_result($donnee);
        mysqli_close($connexion);
        return $recolte_parMois;
    }

    function get_cout_revient_parMois ($date_debut, $date_fin) {
        $ttl_dep = (get_sumSalire($date_debut, $date_fin))['ttl_salaire'] + (get_sumAutreDep($date_debut, $date_fin))['ttl_montant'];
        $ttl_cueilli = get_sumCueilli ($date_debut, $date_fin)['ttl_cueille'];

        return $ttl_dep / $ttl_cueilli;
    }

    function get_sumCueilli ($date_debut, $date_fin) {

        $recolte_parMois = null;
        $requte = sprintf("SELECT COALESCE(sum_cueil.ttl_cueille, 0) ttl_cueille from (select id_parcelle, max(dt) dt, sum(poids) ttl_cueille, count(id_parcelle) nbr_foisparcelle from (select * from examfinal_s3_cueillette where '%s' >= dt and dt >= '%s') as cueille group by id_parcelle) as sum_cueil left join examfinal_s3_v_recolt_mois as rec_mois on sum_cueil.id_parcelle = rec_mois.num_parcelle", $date_fin, $date_debut);
        $connexion = connexion_bdd();
        $donnee = mysqli_query($connexion, $requte);

        if ($donnee && mysqli_num_rows($donnee) > 0) {
            $res = mysqli_fetch_assoc($donnee);
            $recolte_parMois = $res;
        } else {
            $recolte_parMois = array('ttl_cueille' => 0);
        }
        mysqli_free_result($donnee);
        return $recolte_parMois;
    }

    function get_sumSalire ($date_debut, $date_fin) {

        $recolte_parMois = null;
        $requte = sprintf("SELECT COALESCE(sum(prix), 0) AS ttl_salaire from examfinal_s3_salaire where '%s' >= dt and dt >= '%s'", $date_fin, $date_debut);
        $connexion = connexion_bdd();
        $donnee = mysqli_query($connexion, $requte);

        if ($donnee && mysqli_num_rows($donnee) > 0) {
            $res = mysqli_fetch_assoc($donnee);
            $recolte_parMois = $res;
        } else {
            $recolte_parMois = array('ttl_salaire' => 0);
        }
        mysqli_free_result($donnee);
        return $recolte_parMois;
    }

    
    function get_sumAutreDep ($date_debut, $date_fin) {

        $recolte_parMois = null;
        $requte = sprintf("SELECT COALESCE(sum(montant), 0) AS ttl_montant from examfinal_s3_depanse where '%s' >= dt and dt >= '%s'", $date_fin, $date_debut);
        $connexion = connexion_bdd();
        $donnee = mysqli_query($connexion, $requte);

        if ($donnee && mysqli_num_rows($donnee) > 0) {
            $res = mysqli_fetch_assoc($donnee);
            $recolte_parMois = $res;
        } else {
            $recolte_parMois = array('ttl_montant' => 0);
        }
        mysqli_free_result($donnee);
        return $recolte_parMois;
    }

?>
<?php
    // include('../../inc/fonctions/include.php');
    $all_variete=array();
    $all_variete=get_allthe();
?>
<!-- ======================================================================================================================================= -->
<div class="contains_admin">
        <button id="add">Ajouter +</button>
        <?php
            foreach ($all_variete as $one_variete) { ?>
                <div class="theElement">
                    <img id="image" src="" alt="">
                    <div class="infoThe">
                    <h3 class="nom">Nom: <?php echo $one_variete['nom'];?></h3>
                    <p class="occupation">Surface occupée: <?php echo $one_variete['occupation'];?></p>
                    <p class="rendement">Rendement: <?php echo $one_variete['rendement'];?></p>
                    <p class="prix_vente">Prix Vente: <?php echo $one_variete['prix_vente'];?></p>
                    <p><button class="modify" data-id="<?php echo $one_variete['id']; ?>">Modifier</button>
                    <img class="delete" src="../../assets/images/icon/supprimer.png" alt="" data-id="<?php echo $one_variete['id']; ?>"></p>
                    </div>
                </div>
            <?php 
            }
        ?>
    </div>
<!-- div pour ajouter  -->
    <div class="SettingDiv">

        <form action="../../pages/traitements/ajouter-variete.php" method="post">
            <img src="../../assets/images/icon/marque-de-croix.png" alt="" id="cancel">
            <!-- NB asio fonction miverifier so vide -->
            <input type="text" name="nomAjout" id="NomVariete" placeholder="Nom du variete" required>
            <input type="double" name="occupationAjout" id="" placeholder="Place Occupée" required>
            <input type="double" name="rendementAjout" id="" placeholder="Rendement par mois" required>
            <input type="double" name="prix_venteAjout" id="" placeholder="Prix de vente" required>
            <input type="submit" value="ajouter">
        </form>
    </div>


<!--div pour modifier le the  -->
    <div class="ModifyDiv">
        <form action="../../pages/traitements/modifier-variete.php" method="post">
            <img src="../../assets/images/icon/marque-de-croix.png" alt="" id="cancelModify">
            <!-- NB asio fonction miverifier so vide -->
            <input  type="hidden" id="id_the_modif" name="id_modif"> 
            <input type="text" id="nom_modif" name="nom_modif" placeholder="Nom du variete" required>
            <input type="double" name="occupation_modif" id="occupation_modif" placeholder="Place Occupée" required>
            <input type="double" name="rendement_modif" id="rendement_modif" placeholder="Rendement par mois" required>
            <input type="double" name="prix_vente_modif" id="prix_vente_modif" placeholder="prix_vente" required>
            <input type="submit" value="modifier">
        </form>
    </div>

<!-- ======================================================================================================================================= -->
<script defer>
    var id=document.getElementById("add");
    id.addEventListener("click",function(){
        const div=document.getElementsByClassName("SettingDiv")[0];
        div.style.display="flex";
    });
    var cancel=document.getElementById("cancel");
    cancel.addEventListener("click",function(){
        const div=document.getElementsByClassName("SettingDiv")[0];
        div.style.display="none";
    });


    var ids = document.getElementsByClassName("modify");
    var nomAll = document.getElementsByClassName("nom");
    var occupationAll = document.getElementsByClassName("occupation");
    var rendementAll = document.getElementsByClassName("rendement");
    var prix_venteAll = document.getElementsByClassName("prix_vente");
    for (var i = 0; i < ids.length; i++) {
        (function(index) {
            ids[index].addEventListener("click", function() {
                const div = document.getElementsByClassName("ModifyDiv")[0];
                const id = document.getElementById("id_the_modif");
                const currentDivId = this.getAttribute('data-id');
                id.value = currentDivId;
                console.log(index);

                var nom = document.getElementById("nom_modif");
                nom.value = nomAll[index].textContent; // Accédez au contenu texte de l'élément

                var occupation = document.getElementById("occupation_modif");
                occupation.value = occupationAll[index].textContent; // Accédez au contenu texte de l'élément

                var rendement = document.getElementById("rendement_modif");
                rendement.value = rendementAll[index].textContent; // Accédez au contenu texte de l'élément

                var prix_vente = document.getElementById("prix_vente_modif");
                prix_vente.value = prix_venteAll[index].textContent; // Accédez au contenu texte de l'élément

                div.style.display = "flex";
            });
        })(i);
    }

    document.querySelectorAll('.delete').forEach(function(element) {
    element.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            console.log(id);
            window.location.href = '../../pages/traitements/supprimer-variete.php?id=' + id;
        });
    });

    var canceld=document.getElementById("cancelModify");
    canceld.addEventListener("click",function(){
        const div=document.getElementsByClassName("ModifyDiv")[0];
        div.style.display="none";
    });
</script>
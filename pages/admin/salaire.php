<?php
    // include('../../inc/fonctions/include.php');
    $all_salaire=array();
    $all_salaire=get_allSalaire();
?>
<!-- ======================================================================================================================================= -->
<div class="contains_admin">
        <button id="add">Ajouter +</button>
        <?php
            foreach ($all_salaire as $one_salaire) { ?>
                <div class="theElement">
                    <img id="image" src="" alt="">
                    <div class="infoThe">
                    <h3 class="dt">Date: <?php echo $one_salaire['dt'];?></h3>
                    <p class="prix">Montant: <?php echo $one_salaire['prix'];?></p>
                    <p><button class="modify" data-id="<?php echo $one_salaire['id']; ?>">Modifier</button>
                    </div>
                </div>
            <?php 
            }
        ?>
    </div>
<!-- div pour ajouter  -->
    <div class="SettingDiv">

        <form action="../../pages/traitements/ajouter-salaire.php" method="post">
            <img src="../../assets/images/icon/marque-de-croix.png" alt="" id="cancel">
            <!-- NB asio fonction miverifier so vide -->
            <input type="date" name="dateAjout" id="DateAjout" placeholder="Date" required>
            <input type="double" name="prixAjout" id="prixAjout" placeholder="Montant du salaire" required>
            <input type="submit" value="ajouter">
        </form>
    </div>


<!--div pour modifier le the  -->
    <div class="ModifyDiv">
        <form action="../../pages/traitements/modifier-salaire.php" method="post">
            <img src="../../assets/images/icon/marque-de-croix.png" alt="" id="cancelModify">
            <!-- NB asio fonction miverifier so vide -->
            <input  type="hidden" id="id_salaire_modif" name="id_modif"> 
            <input type="date" id="dt_modif" name="date_modif" placeholder="date" required>
            <input type="double" name="prix_modif" id="prix_modif" placeholder="Montant" required>
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
    var dtAll = document.getElementsByClassName("dt");
    var prixAll = document.getElementsByClassName("prix");
    for (var i = 0; i < ids.length; i++) {
        (function(index) {
            ids[index].addEventListener("click", function() {
                const div = document.getElementsByClassName("ModifyDiv")[0];
                const id = document.getElementById("id_salaire_modif");
                const currentDivId = this.getAttribute('data-id');
                id.value = currentDivId;
                console.log(index);

                var nom = document.getElementById("dt_modif");
                nom.value = dtAll[index].textContent; // Accédez au contenu texte de l'élément

                var occupation = document.getElementById("prix_modif");
                occupation.value = prixAll[index].textContent; // Accédez au contenu texte de l'élément

                div.style.display = "flex";
            });
        })(i);
    }
</script>
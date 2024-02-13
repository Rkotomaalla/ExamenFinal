<?php
    include('../../inc/fonctions/f_parcelle.php');
    $all_parcelle=array();
    $all_parcelle=get_allparcelle();
?>
<!-- ======================================================================================================================================= -->
<div class="contains_admin">
        <button id="add">Ajouter +</button>
        <?php
            foreach ($all_parcelle as $one_parcelle) { ?>
                <div class="theElement">
                    <img id="image" src="" alt="">
                    <div class="infoThe">
                    <p class="surface"><?php echo $one_parcelle['surface'];?></p>
                    <p class="id_the"><?php echo $one_parcelle['id_the'];?></p>
                    <p><button class="modify" data-num="<?php echo $one_parcelle['num_parcelle']; ?>">Modifier</button>
                    <img class="delete" src="../../assets/images/icon/supprimer.png" alt="" data-num="<?php echo $one_parcelle['num_parcelle']; ?>"></p>
                    </div>
                </div>
            <?php 
            }
        ?>
    </div>
<!-- div pour ajouter  -->
    <div class="SettingDiv">

        <form action="../../pages/traitements/ajouter-parcelle.php" method="post">
            <img src="../../assets/images/icon/marque-de-croix.png" alt="" id="cancel">
            <!-- NB asio fonction miverifier so vide -->
            <input type="double" name="surfaceAjout" id="" placeholder="Place Occupée" required>
            <input type="numer" name="id_theAjout" id="" placeholder="id du the" required>
            <input type="submit" value="ajouter">
        </form>
    </div>


<!--div pour modifier le the  -->
    <div class="ModifyDiv">
        <form action="../../pages/traitements/modifier-parcelle.php" method="post">
            <img src="../../assets/images/icon/marque-de-croix.png" alt="" id="cancelModify">
            <!-- NB asio fonction miverifier so vide -->
            <input type="hidden" id="num_modif" name="num_modif" placeholder="Numero du parcelle" required>
            <input type="double" name="surface_modif" id="surface_modif" placeholder="Place Occupée" required>
            <input type="number" name="id_the_modif" id="id_the_modif" placeholder="id du the" required>
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
    // var numAll = document.getElementsByClassName("num_parcelle");
    var surfaceAll = document.getElementsByClassName("surface");
    var id_theAll = document.getElementsByClassName("id_the");

    for (var i = 0; i < ids.length; i++) {
        (function(index) {
            ids[index].addEventListener("click", function() {
                const div = document.getElementsByClassName("ModifyDiv")[0];
                // const id = document.getElementById("num_modif");
                const currentDivId = this.getAttribute('data-num');
                // id.value = currentDivId;
                // console.log(id.value);

                var nom = document.getElementById("num_modif");
                nom.value = currentDivId; // Accédez au contenu texte de l'élément
                // console.log(nom.value);

                var occupation = document.getElementById("surface_modif");
                occupation.value = surfaceAll[index].textContent; // Accédez au contenu texte de l'élément
                // console.log(occuption.value);

                var id_the = document.getElementById("id_the_modif");
                id_the.value = id_theAll[index].textContent; // Accédez au contenu texte de l'élément
                // console.log(id_the.value);

                div.style.display = "flex";
            });
        })(i);
    }

    document.querySelectorAll('.delete').forEach(function(element) {
    element.addEventListener('click', function() {
            var id = this.getAttribute('data-num');
            console.log(id);
            window.location.href = '../../pages/traitements/supprimer-parcelle.php?id=' + id;
        });
    });
</script>
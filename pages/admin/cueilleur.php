<?php
    include('../../inc/fonctions/include.php');
    $all_cueilleur=array();
    $all_cueilleur=get_allCueilleur();
?>
<!-- ======================================================================================================================================= -->
<div class="contains_admin">
        <button id="add">Ajouter +</button>
        <?php
            foreach ($all_cueilleur as $one_cueilleur) { ?>
                <div class="theElement">
                    <img id="image" src="" alt="">
                    <div class="infoThe">
                    <p class="nom"><?php echo $one_cueilleur['nom'];?></p>
                    <p class="genre"><?php echo $one_cueilleur['genre'];?></p>
                    <p class="date_naiss"><?php echo $one_cueilleur['date_naiss'];?></p>
                    <p><button class="modify" data-id="<?php echo $one_cueilleur['id']; ?>">Modifier</button>
                    <img class="delete" src="../../assets/images/icon/supprimer.png" alt="" data-id="<?php echo $one_cueilleur['id']; ?>"></p>
                    </div>
                </div>
            <?php 
            }
        ?>
    </div>
<!-- div pour ajouter  -->
    <div class="SettingDiv">

        <form action="../../pages/traitements/ajouter-cueilleur.php" method="post">
            <img src="../../assets/images/icon/marque-de-croix.png" alt="" id="cancel">
            <!-- NB asio fonction miverifier so vide -->
            <input type="text" name="nomAjout" id="" placeholder="Nom du cueilleur" required>
            <input type="text" name="genreAjout" id="" placeholder="Genre du cueilleur" required>
            <input type="date" name="ddnAjout" id="" placeholder="Date de naissance du cueilleur" required>
            <input type="submit" value="ajouter">
        </form>
    </div>


<!--div pour modifier le the  -->
    <div class="ModifyDiv">
        <form action="../../pages/traitements/modifier-cueilleur.php" method="post">
            <img src="../../assets/images/icon/marque-de-croix.png" alt="" id="cancelModify">
            <!-- NB asio fonction miverifier so vide -->
            <input type="hidden" id="id_modif" name="id_modif" required>
            <input type="text" name="nom_modif" id="nom_modif" placeholder="Nom du cueilleur" required>
            <input type="text" name="genre_modif" id="genre_modif" placeholder="Genre du cueilleur" required>
            <input type="date" name="ddn_modif" id="ddn_modif" placeholder="Date de naissance du cueilleur" required>
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
    var genreAll = document.getElementsByClassName("genre");
    var ddnAll = document.getElementsByClassName("date_naiss");

    for (var i = 0; i < ids.length; i++) {
        (function(index) {
            ids[index].addEventListener("click", function() {
                const div = document.getElementsByClassName("ModifyDiv")[0];
                const currentDivId = this.getAttribute('data-id');

                var nom = document.getElementById("id_modif");
                nom.value = currentDivId;
                console.log(currentDivId); // Accédez au contenu texte de l'élément

                var occupation = document.getElementById("nom_modif");
                occupation.value = nomAll[index].textContent; // Accédez au contenu texte de l'élément
                console.log(nomAll[index].textContent);

                var genre = document.getElementById("genre_modif");
                genre.value = genreAll[index].textContent; // Accédez au contenu texte de l'élément

                var ddn = document.getElementById("ddn_modif");
                ddn.value = ddnAll[index].textContent; // Accédez au contenu texte de l'élément

                div.style.display = "flex";
            });
        })(i);
    }

    document.querySelectorAll('.delete').forEach(function(element) {
    element.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            console.log(id);
            window.location.href = '../../pages/traitements/supprimer-ceuilleur.php?id=' + id;
        });
    });
</script>
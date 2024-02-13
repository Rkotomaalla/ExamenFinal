<?php
    // include('../../inc/fonctions/include.php');
    $all_depense=array();
    $all_depense=get_allCategDep();
?>
<!-- ======================================================================================================================================= -->
<div class="contains_admin">
        <button id="add">Ajouter +</button>
        <?php
            foreach ($all_depense as $one_depense) { ?>
                <div class="theElement">
                    <img id="image" src="" alt="">
                    <div class="infoThe">
                    <p class="nom">nom depense: <?php echo $one_depense['nom'];?></p>
                    </div>
                </div>
            <?php 
            }
        ?>
    </div>
<!-- div pour ajouter  -->
    <div class="SettingDiv">

        <form action="../../pages/traitements/ajouter-depense.php" method="post">
            <img src="../../assets/images/icon/marque-de-croix.png" alt="" id="cancel">
            <!-- NB asio fonction miverifier so vide -->
            <input type="text" name="nomAjout" id="" placeholder="Nom du depense" required>
            <input type="submit" value="ajouter">
        </form>
    </div>

<!-- ======================================================================================================================================= -->
<script defer>
    var id=document.getElementById("add");
    id.addEventListener("click",function(){
        const div=document.getElementsByClassName("SettingDiv")[0];
        div.style.display="flex";
    });
</script>
<?php
    include("../fonctions/include.php");
    $page="../../pages/admin/".$_GET['page'].".php";
    $liste_cueilleurs=get_allCueilleur();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body class="body_admin">
    <header id="home_Admin">
         
            <img class="nav_icon" src="" alt="">
        
        <div class="logo title">
            <p><strong>G</strong>reen <strong>T</strong>ea</p>
        </div>
        <div class="info_Admin">
<!-- eto no apetraka ny sarin ny admin-->
            <img src="../../assets/images/profil/2151100278.jpg" alt="" id="profil_admin">
<!-- ato no apetraka ny nom an ny admin-->
            <p>Tendry mandry</p>
        </div>
<!-- ovaina ny lien an ilay icona -->
            <img class="menu_icon" src="../../assets/images/icon/barre-de-menu (1).png" alt="">
        
       
    </header>
<!-- contenu Miovahovaa -->
    <?php
        include($page);
    ?>

<!-- lien bar de navigation -->
    <div class="menu_admin">
        <ul>
            <li><a href="modele-admin.php?page=variete">Variétés de thé</a></li>
            <li><a href="modele-admin.php?page=parcelle">Parcèlles</a></li>
            <li><a href="modele-admin.php?page=cueilleur">Ceuilleurs</a></li>
            <li><a href="modele-admin.php?page=depense">Dépenses</a></li>
            <li><a href="modele-admin.php?page=salaire">Salaires</a></li>  
            <li id="configurations">Configurations</li>
            <li id="generate"> Mois de regeneration</li>
            <div id="configuration">
                <form action="../../pages/traitements/traite-configurer.php" method="GET" >
                    <img src="../../assets/images/icon/marque-de-croix.png" alt="" id="cancelconfiguration">
                    <p>Configurations</p>
                    <input type="double" name="min" id="" placeholder="poids minimal pour un ceuileur" required>
                    <label for="ceuilleur">Ceuilleur</label>
                        <select name="ceuilleur" id="ceuilleur">
                            <?php for ($i=0; $i < count($liste_cueilleurs); $i++) { ?>
                                <option value="<?php echo $liste_cueilleurs[$i]['id'] ?>"><?php echo $liste_cueilleurs[$i]['nom'] ?></option>
                            <?php } ?>
                        </select>
                    <input type="double" name="bonus" id="" placeholder="% de bonus" required>
                    <input type="double" name="mallus" id="" placeholder="% de mallus" required>
                    <input type="submit" value="configurer">
                </form>
            </div>
            <script defer>
                const generateConf=document.getElementById("configurations");
                    generateConf.addEventListener("click",function(){
                    const div_check=document.getElementById("configuration");
                    div_check.style.display="flex";
                    
                    div_check.style.animationName="slideShow";
                    div_check.style.animationDuration="2s";
                    div_check.style.animationFillMode="Forwards";
                });
                const cancelConf=document.getElementById("cancelconfiguration");
                cancelConf.addEventListener("click",function(){
                    const div_check=document.getElementById("configuration");
                    div_check.style.animationName="slide";
                    div_check.style.animationDuration="2s";
                    div_check.style.animationFillMode="Forwards";
        });
            </script>
            
            <div id="regeneration_check">
                
                <form action="../../pages/traitements/traite-generer.php" method="GET" id="generer">
                    <img src="../../assets/images/icon/marque-de-croix.png" alt="" id="cancelCheck">
                    <p>Choisissez les mois</p>
                    <label for="">Janvier <input type="checkbox" name="mois[]" value="1" id=""></label>
                    <label for="">Fevrier <input type="checkbox" name="mois[]" value="2" id=""></label>
                    <label for="">Mars <input type="checkbox" name="mois[]" value="3" id=""></label>
                    <label for="">Avril <input type="checkbox" name="mois[]" value="4" id=""></label>
                    <label for="">Mai <input type="checkbox" name="mois[]" value="5" id=""></label>
                    <label for="">Juin <input type="checkbox" name="mois[]" value="6" id=""></label>
                    <label for="">Juillet <input type="checkbox" name="mois[]" value="7" id=""></label>
                    <label for="">Aout <input type="checkbox" name="mois[]" value="8" id=""></label>
                    <label for="">Septembre<input type="checkbox" name="mois[]" value="9" id=""></label>
                    <label for="">Octobre <input type="checkbox" name="mois[]" value="10" id=""></label>
                    <label for="">Novembre <input type="checkbox" name="mois[]" value="11" id=""></label>
                    <label for="">Décembre<input type="checkbox" name="mois[]" value="12" id=""></label>
                    
                    <input type="submit" value="Valider">
                </form>
            </div>
            <script defer>
                const generate=document.getElementById("generate");
                    generate.addEventListener("click",function(){
                    const div_check=document.getElementById("regeneration_check");
                    div_check.style.display="flex";
                    
                    div_check.style.animationName="slideShow";
                    div_check.style.animationDuration="2s";
                    div_check.style.animationFillMode="Forwards";
                });
                const cancelCheck=document.getElementById("cancelCheck");
                cancelCheck.addEventListener("click",function(){
                    const div_check=document.getElementById("regeneration_check");
                    div_check.style.animationName="slide";
                    div_check.style.animationDuration="2s";
                    div_check.style.animationFillMode="Forwards";
        });
            </script>     
        </ul>
            
    </div>
    <footer id="footer_admin">
        <p>Vallinah ETU002380 - Sarobidy ETU002491 - Kiady ETU002505</p>
    </footer>
    
</body>

</html>
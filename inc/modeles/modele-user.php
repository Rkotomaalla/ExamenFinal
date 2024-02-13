<?php
    include('../fonctions/include.php');
    $liste_the = get_allthe();
    $liste_cueilleurs = get_allCueilleur ();
    $liste_parcelles = get_allparcelle ();
    $liste_categ_dep = get_allCategDep ();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body class="body_user">
    <div class="first">
        <header class="header_user">
            <div class="logo_user">
                <h1>Green Tea</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#Ceuillete">Ceuillete</a></li>
                    <li><a href="#Depenses">Depenses</a></li>
                    <li><a href="">Resultat</a></li>
                </ul>
            </nav>
            <ul class="userInfo">
                <li><a href=""><img src="../../assets/images/profil/2151100278.jpg" class="user_profil"></a></li>
                <li><a href="">Tendry Mahandry</a></li>
                <li><a href=""><img src="../../assets/images/searchIcon.png" alt=""></a></li>
                <li><a href=""><img src="../../assets/images/favIcon.png" alt=""></a></li>
                <li><a href=""><img src="../../assets/images/carte.png" alt=""></a></li>
                

            </ul>
            <img class="menuBar" src="../../assets/images/icon/barre-de-menu (1).png" alt="">
                
        
        </header>
        <!-- div pour la connection et la deconnection -->
        <div id="deconnexion">
            <ul>
                <li><a href="#Ceuillete">Ceuillete</a></li>
                <li><a href="#Depenses">Depenses</a></li>
                <li><a href="">Resultat</a></li>
                <li><a href="">Modifier Le Profil</a></li>
                <!-- atao eto ny lien php rah ideconnecter -->
                <li><a href="">Deconnection</a></li>
            </ul>
        </div>
        <!-- ================================================ -->
        <div class="contains_user">
            <div>
                <h3>Votre Thé tsy aiko tsony</h3>
                <p>sentez sa pureté</p>
            </div>
        </div>
    </div>
    <div id="theList">
        <p id="title">our list</p>
        <div class="list">
            <?php for ($i=0; $i < count($liste_the); $i++) { ?>
                <div id="Element">
                    <img src="../../assets/images/modeles/86753.jpg" alt="">
                    <p><?php echo $liste_the[$i]['nom'] ?></p>  
                    <p><?php echo $liste_the[$i]['occupation'] ?></p>
                    <p><?php echo $liste_the[$i]['rendement'] ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
    <div id="Ceuillete">
        <img src="../../assets/images/modeles/86753.jpg" alt="">
        <div>
            <p>Ajouter une ceuillette</p>
            <form id = "form_cueillette">
                <label for="date">Date</label><input type="date" name="" id="date">
                <label for="ceuilleur">Ceuilleur</label>
                <select name="" id="ceuilleur">
                    <?php for ($i=0; $i < count($liste_cueilleurs); $i++) { ?>
                        <option value="<?php echo $liste_cueilleurs[$i]['id'] ?>"><?php echo $liste_cueilleurs[$i]['nom'] ?></option>
                    <?php } ?>
                </select>
                
                <label for="partielle">Partielle</label>
                <select name="" id="ceuilleur">

                    <?php for ($i=0; $i < count($liste_parcelles); $i++) { ?>
                        <option value="<?php echo $liste_parcelles[$i]['num_parcelle'] ?>">Parcelle <?php echo $liste_parcelles[$i]['num_parcelle'] ?></option>
                    <?php } ?>
                </select>
                <label for="poids">Poids</label>
                <input type="double" id="poids">
                <input type="submit" value="Ajouter">
            </form>
        </div>
        
    </div>
    <div id="Depenses">
        <div>
            <p>Notez votre Dépense</p>
            <form >
                <label for="date">Date</label><input type="date" name="" id="date">
                <label for="Categorie">Categorie</label>
                <select name="" id="Categorie">
                    <?php for ($i=0; $i < count($liste_categ_dep); $i++) { ?>
                        <option value="<?php echo $liste_categ_dep[$i]['id'] ?>"><?php echo $liste_categ_dep[$i]['nom'] ?></option>
                    <?php } ?>
                </select>
                <label for="montant">Montant</label>
                <input type="double" id="montant">
                <input type="submit" value="Ajouter">
            </form>
        </div>
        <img src="../../assets/images/modeles/2150830490.jpg" alt="">
        
    </div>
    <footer class="user_footer">
        <div class="link">
            <h1>Green Tea</h1>
            <ul>
                <p>navigate</p>
                <li><a href="#Ceuillete">Ceuillete</a></li>
                <li><a href="#Depenses">Depenses</a></li>
                <li><a href="">Resultat</a></li>
            </ul>
        </div>
        <p>Vallinah ETU002380 - Sarobidy ETU002491 - Kiady ETU002505</p>
         
    </footer>
    <script defer>
        var q=0;
        const menu=document.getElementsByClassName("menuBar")[0];
        menu.addEventListener("click",function(){
            const menuItem=document.getElementById("deconnexion");
            if(q==0){
                menuItem.style.display="flex";
                q=1;
            }
            else{
                menuItem.style.display="none";

                q=0;
            }
        });
    </script>

    <script src="../../assets/js/model_user.js"></script>
</body>
</html>
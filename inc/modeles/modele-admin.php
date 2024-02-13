<?php
    $page="../../pages/admin/".$_GET['page'].".php";
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
        </ul>
            
    </div>
    <footer id="footer_admin">
        <p>Vallinah ETU002380 - Sarobidy ETU002491 - Kiady ETU002505</p>
    </footer>
    
</body>


<!-- variete -->

</html>
<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <div class=header>
            <meta charset="utf-8" />
            <title>Groupe</title>   
            <link rel="stylesheet" href="Css/navigation.css">
            <link rel="stylesheet" href="Css/accueil.css">
            <nav class="navigation">
            <ul class="navigation__list navigation__list--inline">
                    <li class="navigation__item"><a href="accueil.php" class="is-active">Accueil</a></li>
                    <li class="navigation__item"><a href="individu.php">Individu</a></li>
                    <li class="navigation__item"><a href="groupe.php">Groupe</a></li>
                    <li class="navigation__item"><a href="membre.php">Membre</a></li>
                    <li class="navigation__item"><a href="connexion.php">Connexion</a></li>
                    <li class="navigation__item"><a href="deconnexion.php">Deconnexion</a></li>
            </ul> 
            </nav>
        </div>
    </head>
    <body>
        <div class="titre">
            <h1>Projet Système d’Information - L3 MIAGE APP - 2019/2020</h1>
            <h1>JFPP</h1>
            <h1>Le Men Yann</h1>
            <?php
            if(!isset($_SESSION['pseudo'])){
                echo "Merci de vous connecter afin d'accéder à l'application.";
            }
            ?>

        </div>
    </body>
</html>
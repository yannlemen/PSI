<?php
 
    /*************************
    *  Page: deconnexion.php
    *  Page encodée en UTF-8
    **************************/
 
session_start();//session_start() nous permet ici d'appeler toutes les sessions actives de l'utilisateur, enregistrées avec $_SESSION['nom_que_vous_souhaitez']
if(!isset($_SESSION['pseudo'])){
    header("Refresh: 5; url=accueil.php");//redirection vers le formulaire de connexion dans 5 secondes
    ?>
    <link rel="stylesheet" href="Css/transit.css">
    <body>
        <p>Vous n'étiez pas connecté, pourquoi voulez-vous vous déconnecter?</p>
        <p><i>Redirection en cours, vers la page d'accueil...</i></p>
    </body>
    <?php
    exit(0);//on arrête l'éxécution du reste de la page avec exit, si le membre n'est pas connecté
    }
else {  
    unset($_SESSION['pseudo']);//unset() détruit une variable, si vous enregistrez aussi l'id du membre (par exemple) vous pouvez comme avec isset(), mettre plusieurs variables séparés par une virgule:
    //unset($_SESSION['pseudo'],$_SESSION['id']);
    
    header("Refresh: 5; url=accueil.php");//redirection vers le formulaire de connexion dans 5 secondes
    ?>
    <link rel="stylesheet" href="Css/transit.css">
    <body>
        <p>Vous avez été correctement déconnecté du site.</p>
        <p><i>Redirection en cours, vers la page d'accueil...</i></p>
    </body>
    <?php
}
 
?>
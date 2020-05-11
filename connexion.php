<?php
 
session_start();
 
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Connexion</title>
        <link rel="stylesheet" href="Css/transit.css">
    </head>
    <body>
        <?php
        //si une session est déjà "isset" avec ce visiteur, on l'informe:
        if(isset($_SESSION['pseudo'])){
            echo "Vous êtes déjà connecté. <br />";
            echo "<i>Redirection en cours, vers la page d'accueil...</i>"; 
            header("Refresh: 5; url=accueil.php");//redirection vers l'accueil' dans 5 secondes
        } else {
            //si le formulaire est envoyé ("envoyé" signifie que le bouton submit est cliqué)
            
            if(!isset($_POST['valider'])){//quand le membre sera connecté, on définira cette variable afin de cacher le formulaire
                ?>
                <h1>Se connecter</h1>
                <p>Remplissez le formulaire ci-dessous pour vous connecter:</p>
                <form method="post" action="connexion.php">
                    <input type="text" name="pseudo" placeholder="Votre pseudo..." required><!-- required permet d'empêcher l'envoi du formulaire si le champ est vide -->
                    <input type="password" name="mdp" placeholder="Votre mot de passe..." required>
                    <input type="submit" name="valider" value="Connexion!">
                </form>
                
                <?php
            }if(isset($_POST['valider'])){
                    include("db_connect.php");
                        $pseudo=$_POST['pseudo'];
                        $mdp=$_POST['mdp'];
                        $query="SELECT * FROM gestion WHERE pseudo='".$pseudo."' AND mdp='".$mdp."'";
                        $result=mysqli_query($conn, $query);
                        $row_cnt = mysqli_num_rows($result);
                        //on regarde si le membre est inscrit dans la bdd:
                        if(mysqli_num_rows($result)==1){
                            //pseudo et mot de passe sont trouvé sur une même colonne, on ouvre une session:
                            $_SESSION['pseudo']=$pseudo;
                            echo "Bienvenue $pseudo! Vous pouvez maintenant accéder à l'espace restreint.<br /><br />";
                            echo "<i>Redirection en cours, vers la page d'accueil...</i>";
                            header("Refresh: 5; url=accueil.php");//redirection vers le formulaire de connexion dans 5 secondes
                            $TraitementFini=true;//pour cacher le formulaire
                        } else {
                            ?>
                            <h1>Se connecter</h1>
                            <p>Remplissez le formulaire ci-dessous pour vous connecter:</p>
                            <form method="post" action="connexion.php">
                                <input type="text" name="pseudo" placeholder="Votre pseudo..." required><!-- required permet d'empêcher l'envoi du formulaire si le champ est vide -->
                                <input type="password" name="mdp" placeholder="Votre mot de passe..." required>
                                <input type="submit" name="valider" value="Connexion!">
                            </form>
                            <p><strong>Pseudo ou mot de passe incorrect.</strong></p>
                            </form>
                            <?php
                        }
            }
        }
        ?>
    </body>
</html>
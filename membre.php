<?php
session_start();//session_start() combiné à $_SESSION (voir en fin de traitement du formulaire) nous permettra de garder le pseudo en sauvegarde pendant qu'il est connecté, si vous voulez que sur une page, le pseudo soit (ou tout autre variable sauvegardée avec $_SESSION) soit retransmis, mettez session_start() au début de votre fichier PHP, comme ici
if(!isset($_SESSION['pseudo'])){
    header("Refresh: 5; url=connexion.php");//redirection vers le formulaire de connexion dans 5 secondes
    ?>
    <link rel="stylesheet" href="Css/transit.css">
    <body>
        <p>Vous devez vous connecter pour accéder à l'espace restreint.</p>
        <p><i>Redirection en cours, vers la page de connexion...</i></p>
    </body>
    <?php
    exit(0);//on arrête l'éxécution du reste de la page avec exit, si le membre n'est pas connecté
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Membre</title>
        <link rel="stylesheet" href="Css/navigation.css">
        <link rel="stylesheet" href="Css/member.css">
        <nav class="navigation">
            <ul class="navigation__list navigation__list--inline">
                <li class="navigation__item"><a href="accueil.php">Accueil</a></li>
                <li class="navigation__item"><a href="individu.php">Individu</a></li>
                <li class="navigation__item"><a href="groupe.php">Groupe</a></li>
                <li class="navigation__item"><a href="membre.php" class="is-active">Membre</a></li>
                <li class="navigation__item"><a href="connexion.php">Connexion</a></li>
                <li class="navigation__item"><a href="deconnexion.php">Deconnexion</a></li>
            </ul> 
        </nav>
    </head>
     <body>
        <div class="action">
            <div class="ajouter">
                <form action="Membre/membre_ajouter.php" method="post">
                    <p>Ajouter un membre dans un groupe : </p>
                    <select name="idGroupe" id="idGroupe">
                        <?php
                        //Connexion à la base de données
                        include("db_connect.php");
                        //Préparation de la requête
                        $query = "SELECT idGroupe, libelleGroupe FROM groupe ORDER BY idGroupe ASC";
                        $response = array();
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result))
                        {
                            {echo'<option value="'.$row['idGroupe'].'">'.$row['libelleGroupe'].'</option>';}
                        }
                        ?>
                    </select></br></br>
                    <input type="input" name="num" id='num' placeholder="Num de l'individu" required /><br />
                    <input type="input" name="annee" id='annee' placeholder="Année" required /><br />
                    <input type="submit" value="Créer" />
                </form>
            </div>
            <div class="supprimer">
                <form action="Membre/membre_supprimer.php" method="post">
                    <p>Supprimer un membre dans un groupe : </p>
                    <input type="input" name="idAppart" id='idAppart' placeholder="ID de liaison" required />
                    <input type="submit" class="delete" value="Supprimer" />
                </form>
            </div>
            <div class="api">
                <form action="Membre/api.php" method="post" target="_blank">
                    <p>Api vers le groupe : </p>
                    <select name="libelleGroupe" id="libelleGroupe">
                            <?php
                            //Connexion à la base de données
                            include("db_connect.php");
                            //Préparation de la requête
                            $query = "SELECT idGroupe, libelleGroupe FROM groupe ORDER BY idGroupe ASC";
                            $response = array();
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result))
                            {
                                    {echo'<option value="'.$row['libelleGroupe'].'">'.$row['libelleGroupe'].'</option>';}
                            }
                            ?>
                    </select> 
                    <input type="submit" value="Extraire"/>
                </form>
            </div>
        </div>
        
        <div class="result">
            <p><strong>Les derniers membres à avoir été ajoutés sont :</strong></p>
            <?php
            //Connexion à la base de données
            include("db_connect.php");
            //Préparation de la requête
            $query = "SELECT appartenance.idAppart, individu.nom, individu.prenom, groupe.libelleGroupe FROM `individu`, `appartenance`, `groupe` where appartenance.idIndividu=individu.num AND appartenance.idGroupe=groupe.idGroupe ORDER BY appartenance.idAppart DESC LIMIT 0, 10";
            $response = array();
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result))
            {
                echo '<p>' . htmlspecialchars($row['prenom']) . ' ' . htmlspecialchars($row['nom']) . ' a été ajouté au groupe ' . htmlspecialchars($row['libelleGroupe']) . '</p>';
            }
            ?>
        </div>
    </body>
</html>
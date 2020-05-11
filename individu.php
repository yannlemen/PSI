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
        <div class=header>
            <meta charset="utf-8" />
            <title>Individu</title>
            <link rel="stylesheet" href="Css/indiv.css">
            <link rel="stylesheet" href="Css/navigation.css">
            <nav class="navigation">
            <ul class="navigation__list navigation__list--inline">
                <li class="navigation__item"><a href="accueil.php">Accueil</a></li>
                <li class="navigation__item"><a href="individu.php" class="is-active">Individu</a></li>
                <li class="navigation__item"><a href="groupe.php">Groupe</a></li>
                <li class="navigation__item"><a href="membre.php">Membre</a></li>
                <li class="navigation__item"><a href="connexion.php">Connexion</a></li>
                <li class="navigation__item"><a href="deconnexion.php">Deconnexion</a></li>
            </ul> 
                
            </nav>
        </div>
    </head>
    <body>
        <div class=action>
            <div class=ajouter>
                <form action="Individu/individu_ajouter.php" method="post">
                    <p>Ajouter un individu : </p>
                    <input type="input" name="nom" id='nom' required  placeholder="Nom" /><br />
                    <input type="input" name="prenom" id='prenom' placeholder="Prenom" required /><br />
                    <input type="input" name="email" id='email' placeholder="Email" required /><br />
                    <input type="input" name="num" id='num' placeholder="Num" required /><br />
                    <select name="annuaire" id="annuaire">
                        <?php
                        //Connexion à la base de donnée
                        include("db_connect.php");
                        //Préparation de la requête
                        $query = "SELECT idAnnuaire, libelleAnnuaire FROM annuaire ORDER BY idAnnuaire ASC";
                        $response = array();
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result))
                        {
                                {echo'<option value="'.$row['idAnnuaire'].'">'.$row['libelleAnnuaire'].'</option>';}
                        }
                        ?>
                </select><br />
                <select name="statut" id="statut">
                        <?php
                        //Connexion à la base de donnée
                        include("db_connect.php");
                        //Préparation de la requête
                        $query = "SELECT idStatus, libelleStatus FROM status ORDER BY idStatus ASC";
                        $response = array();
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result))
                        {
                                {echo'<option value="'.$row['idStatus'].'">'.$row['libelleStatus'].'</option>';}
                        }
                        ?>
                </select><br />
                    <input type="submit" value="Créer" />
                </form>
            </div>
            <div class=supprimer>
                <form action="Individu/individu_supprimer.php" method="post">
                    <p>Supprimer un individu : </p>
                    <input type="input" name="num" id='num' placeholder="Num de l'individu" required />
                    <input type="submit" class="delete" value="Supprimer" />
                </form>
            </div>
            <div class="importe">
                <form enctype="multipart/form-data" action="Individu/individu_import.php" method="post">
                    <p>Choisir un fichier CSV :</p></br>
                    <input type="file" name="file" id="file" accept=".csv">
                    <br />
                    <br />
                    <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
                    <br />
                </form>
            </div>
            <div class=modifier>
                <form action="Individu/individu_modifier.php" method="post">
                    <p>Modifier un individu : </p>
                    <input type="input" name="oldnum" id='oldnum' placeholder="Num de l'individu" required /></br>
                    <input type="input" name="nom" id='nom' required  placeholder="Nom" /><br />
                    <input type="input" name="prenom" id='prenom' placeholder="Prenom" required /><br />
                    <input type="input" name="email" id='email' placeholder="Email" required /><br />
                    <input type="input" name="newnum" id='newnum' placeholder="Num" required /><br />
                    <select name="annuaire" id="annuaire">
                        <?php
                        //Connexion à la base de donnée
                        include("db_connect.php");
                        //Préparation de la requête
                        $query = "SELECT idAnnuaire, libelleAnnuaire FROM annuaire ORDER BY idAnnuaire ASC";
                        $response = array();
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result))
                        {
                                {echo'<option value="'.$row['idAnnuaire'].'">'.$row['libelleAnnuaire'].'</option>';}
                        }
                        ?>
                </select><br />
                <select name="statut" id="statut">
                        <?php
                        //Connexion à la base de donnée
                        include("db_connect.php");
                        //Préparation de la requête
                        $query = "SELECT idStatus, libelleStatus FROM status ORDER BY idStatus ASC";
                        $response = array();
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result))
                        {
                                {echo'<option value="'.$row['idStatus'].'">'.$row['libelleStatus'].'</option>';}
                        }
                        ?>
                </select><br />
                    <input type="submit" value="Modifier" />
                </form>
            </div>
        </div>
    <div class=result>
    </br><p><strong>Les derniers individus à avoir été ajoutés sont :</strong></p>
        <?php
        //Connexion à la base de données
        include("db_connect.php");
        //Préparation de la requête
        $query = "SELECT nom, prenom FROM individu ORDER BY idIndividu DESC LIMIT 0, 10";
        $response = array();
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result))
        {
            echo '<p>' . htmlspecialchars($row['nom']) . ' ' . htmlspecialchars($row['prenom']) .'</p>';
        }
        ?>
        </br>
    </div>
    </body>
</html>
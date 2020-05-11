<?php
// Connexion à la base de données
// Connexion à la base de données
include("../db_connect.php");

//Récupération des données
$oldnum = $_POST['oldnum'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$newnum = $_POST['newnum'];
$annuaire = $_POST['annuaire'];
$statut = $_POST['statut'];

//Preparation de la requête
$query = "UPDATE individu SET nom = '".$nom."', prenom = '".$prenom."', email = '".$email."', num= '".$newnum."', annuaire = '".$annuaire."', statut = '".$statut."' WHERE num = '".$oldnum."'";

//Execution de la requête
$result = mysqli_query($conn, $query);

// Redirection du visiteur vers la page groupe
header('Location: ../individu.php');
?>
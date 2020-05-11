<?php
// Connexion à la base de données
include("../db_connect.php");

//Récupération des données
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$num = $_POST['num'];
$annuaire = $_POST['annuaire'];
$statut = $_POST['statut'];

//Preparation de la requête
$query = "INSERT INTO individu (nom, prenom, email, num, annuaire, statut) VALUES( '".$nom."', '".$prenom."', '".$email."', '".$num."', '".$annuaire."', '".$statut."')";

//Execution de la requête
$result = mysqli_query($conn, $query);

// Redirection du visiteur vers la page du formulaire
header('Location: ../individu.php');
?>
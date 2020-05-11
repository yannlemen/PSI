<?php
// Connexion à la base de données
include("../db_connect.php");

//Récupération des données
$idGroupe = $_POST['idGroupe'];
$num = $_POST['num'];
$annee = $_POST['annee'];

//Preparation de la requête
$query = "INSERT INTO appartenance (idGroupe, num, annee) VALUES('".$idGroupe."', '".$num."', '".$annee."')";

//Execution de la requête
$result = mysqli_query($conn, $query);

// Redirection du visiteur vers la page du formulaire
header('Location: ../membre.php');
?>
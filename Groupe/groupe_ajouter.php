<?php
// Connexion à la base de données
include("../db_connect.php");

//Récupération des données
$libelleGroupe = $_POST['libelleGroupe'];

//Preparation de la requête
$query = "INSERT INTO groupe (libelleGroupe) VALUES('".$libelleGroupe."')";

//Execution de la requête
$result = mysqli_query($conn, $query);

// Redirection du visiteur vers la page du formulaire
header('Location: ../groupe.php');
?>
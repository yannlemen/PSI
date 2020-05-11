<?php
// Connexion à la base de données
include("../db_connect.php");

//Récupération des données
$libelleGroupe = $_POST['libelleGroupe'];
$idGroupe = $_POST['idGroupe'];

//Preparation de la requête
$query = "UPDATE groupe SET libelleGroupe = '".$libelleGroupe."' WHERE idGroupe ='".$idGroupe."' ";

//Execution de la requête
$result = mysqli_query($conn, $query);

// Redirection du visiteur vers la page groupe
header('Location: ../groupe.php');
?>
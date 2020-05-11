<?php
// Connexion à la base de données
include("../db_connect.php");

//Récupération des données
$libelleGroupe = $_POST['libelleGroupe'];

//Preparation de la requête
$query = "DELETE FROM groupe WHERE libelleGroupe = '".$libelleGroupe."' ";

//Execution de la requête
$result = mysqli_query($conn, $query);


// Redirection du visiteur vers la page groupe
header('Location: ../groupe.php');
?>
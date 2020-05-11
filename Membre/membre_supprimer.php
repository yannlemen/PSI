<?php
// Connexion à la base de données
include("../db_connect.php");

//Récupération des données
$idAppart = $_POST['idAppart'];

//Preparation de la requête
$query = 'DELETE FROM appartenance WHERE idAppart ="'.$idAppart.'"';

//Execution de la requête
$result = mysqli_query($conn, $query);

// Redirection du visiteur vers la page individu
header('Location: ../membre.php');
?>
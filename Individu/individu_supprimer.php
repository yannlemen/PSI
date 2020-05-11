<?php
// Connexion à la base de données
include("../db_connect.php");

//Récupération des données
$num = $_POST['num'];

//Preparation de la requête
$query = "DELETE FROM individu WHERE num = '".$num."'";

//Execution de la requête
$result = mysqli_query($conn, $query);

// Redirection du visiteur vers la page individu
header('Location: ../individu.php');
?>
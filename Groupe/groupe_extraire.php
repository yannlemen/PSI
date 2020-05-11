<?php

// Connexion à la base de données
include("../db_connect.php");

//Récupération des données
$libelleGroupe = $_POST['libelleGroupe'];
$filename = 'export.csv';

//Preparation de la requête
$query = "SELECT individu.* FROM `individu`, `appartenance`, `groupe` where appartenance.idIndividu=individu.num AND appartenance.idGroupe=groupe.idGroupe AND groupe.libelleGroupe='".$libelleGroupe."'";

//Execution de la requête
$result = mysqli_query($conn, $query);

$f = fopen('php://temp', 'wt');
$first = true;
while ($row = $result->fetch_assoc()) {
    if ($first) {
        fputcsv($f, array_keys($row));
        $first = false;
    }
    fputcsv($f, $row);
} // end while

$size = ftell($f);
rewind($f);
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: $size");
// Output to browser with appropriate mime type, you choose ;)
header("Content-type: text/x-csv");
header("Content-type: text/csv");
header("Content-type: application/csv");
header("Content-Disposition: attachment; filename=$filename");
fpassthru($f);

?>
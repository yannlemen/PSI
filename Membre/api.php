<?php
  // Se connecter à la base de données
  include("../db_connect.php");
  $libelleGroupe = $_POST['libelleGroupe'];
  $query = 'SELECT `individu`.* FROM `individu`, `appartenance`, `groupe` where appartenance.idIndividu=individu.num AND appartenance.idGroupe=groupe.idGroupe AND libelleGroupe="'.$libelleGroupe.'"';
  $response = array();
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
    $response[] = $row;
  }
  header('Content-Type: application/json');
  echo json_encode($response, JSON_PRETTY_PRINT);
?>

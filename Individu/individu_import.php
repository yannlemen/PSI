<?php
  // Connect to database
  include("../db_connect.php");
  if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
      
      $file = fopen($fileName, "r");
      
      while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
        $query = "INSERT into individu (nom, prenom, email, num, annuaire, statut)
             values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "')";
        $result = mysqli_query($conn, $query);
      }
    }
  }
  //Retourner à la page individuu.php
  header('Location: ../individu.php');
  exit;

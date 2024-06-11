<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombreEmp = $_POST['nombre'];
  $detalle = $_POST['detalle'];
  $query = "INSERT INTO empresa(EmpNom, DelPetCod) VALUES ('$nombreEmp', '$detalle')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index_em.php');

}

?>

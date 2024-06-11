<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $codigo = $_POST['codigo'];
  $notas = $_POST['notas'];
  $estado = $_POST['estado'];
  $granja = $_POST['granja'];
  $empresa = $_POST['empresa'];
  $query = "INSERT INTO almacen (AlmCod, AlmNot, AlmEstReg, GraCod, EmpCod) VALUES ('$codigo', '$notas', '$estado', '$granja', '$empresa')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index_alm.php');
}

?>

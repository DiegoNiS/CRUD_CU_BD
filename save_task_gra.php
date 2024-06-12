<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $codigoGra = $_POST['codigo'];
  $nombreGra = $_POST['nombre'];
  $direccion = $_POST['direccion'];
  $notas = $_POST['notas'];
  $estado = $_POST['estado'];
  $empresa = $_POST['empresa'];
  $query = "INSERT INTO granja(GraCod, GraNom, GraDir, GraNot, GraEstReg, EmpCod) VALUES ('$codigoGra', '$nombreGra', '$direccion', '$notas', '$estado', '$empresa')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index_gra.php');

}

?>

<?php

include("db.php");

if (isset($_GET['AlmCod'])) {
  $AlmCod = $_GET['AlmCod'];
  $query = "DELETE FROM almacen WHERE AlmCod = '$AlmCod'";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index_alm.php');
}

?>

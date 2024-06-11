<?php

include("db.php");

if(isset($_GET['GraCod'])) {
  $GraCod = $_GET['GraCod'];
  $query = "DELETE FROM granja WHERE GraCod = '$GraCod'";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index_gra.php');
}

?>

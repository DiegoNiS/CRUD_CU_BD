<?php

include("db.php");

if(isset($_GET['EmpCod'])) {
  $EmpCod = $_GET['EmpCod'];
  $query = "DELETE FROM empresa WHERE EmpCod = $EmpCod";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index_em.php');
}

?>

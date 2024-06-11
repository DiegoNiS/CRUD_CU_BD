<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'dietas_alimenticias'
) or die(mysqli_erro($mysqli));

?>

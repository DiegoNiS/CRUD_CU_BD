<?php
include("db.php");
$EmpNom = '';
$DelPetCod= '';

if  (isset($_GET['EmpCod'])) {
  $empcod = $_GET['EmpCod'];
  $query = "SELECT * FROM empresa WHERE EmpCod=$empcod";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $EmpNom = $row['EmpNom'];
    $DelPetCod = $row['DelPetCod'];
  }
}

if (isset($_POST['update'])) {
  $EmpCod = $_GET['EmpCod'];
  $EmpNom= $_POST['EmpNom'];
  $DelPetCod = $_POST['DelPetCod'];

  $query = "UPDATE empresa set EmpNom = '$EmpNom', DelPetCod = '$DelPetCod' WHERE EmpCod=$EmpCod";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index_em.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?EmpCod=<?php echo $_GET['EmpCod']; ?>" method="POST">
        <div class="form-group">
          <input name="EmpNom" type="text" class="form-control" value="<?php echo $EmpNom; ?>" placeholder="Update Nombre">
        </div>
        <div class="form-group">
          <input name="DelPetCod" type="text" class="form-control" value="<?php echo $DelPetCod; ?>" placeholder="Update Detalle de Pedido">
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

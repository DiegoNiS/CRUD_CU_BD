<?php
include("db.php");
$GraNom = '';
$GraDir = '';
$GraNot = '';
$GraEstReg = '';
$EmpCod = '';

if  (isset($_GET['GraCod'])) {
  $gracod = $_GET['GraCod'];
  $query = "SELECT * FROM granja WHERE GraCod='$gracod'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $GraNom = $row['GraNom'];
    $GraDir = $row['GraDir'];
    $GraNot = $row['GraNot'];
    $GraEstReg = $row['GraEstReg'];
    $EmpCod = $row['EmpCod'];
  }
}

if (isset($_POST['update'])) {
  $GraCod = $_GET['GraCod'];
  $GraNom= $_POST['GraNom'];
  $GraDir = $_POST['GraDir'];
  $GraNot = $_POST['GraNot'];
  $GraEstReg = $_POST['GraEstReg'];
  $EmpCod = $_POST['EmpCod'];

  $query = "UPDATE granja set GraNom = '$GraNom', GraDir = '$GraDir', GraNot = '$GraNot', GraEstReg = '$GraEstReg', EmpCod = '$EmpCod' WHERE GraCod='$GraCod'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index_gra.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_gra.php?GraCod=<?php echo $_GET['GraCod']; ?>" method="POST">
        <div class="form-group">
          <input name="GraNom" type="text" class="form-control" value="<?php echo $GraNom; ?>" placeholder="Update Nombre">
        </div>
        <div class="form-group">
          <input name="GraDir" type="text" class="form-control" value="<?php echo $GraDir; ?>" placeholder="Update Dirección">
        </div>
        <div class="form-group">
          <textarea name="GraNot" class="form-control" placeholder="Update Notas"><?php echo $GraNot; ?></textarea>
        </div>
        <div class="form-group">
          <input name="GraEstReg" type="text" class="form-control" value="<?php echo $GraEstReg; ?>" placeholder="Update Estado">
        </div>
        <div class="form-group">
          <input name="EmpCod" type="text" class="form-control" value="<?php echo $EmpCod; ?>" placeholder="Update Código de Empresa">
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

<?php
include("db.php");
$AlmCod = '';
$AlmNot = '';
$AlmEstReg = '';
$GraCod = '';
$EmpCod = '';

if (isset($_GET['AlmCod'])) {
  $almcod = $_GET['AlmCod'];
  $query = "SELECT * FROM almacen WHERE AlmCod='$almcod'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $AlmCod = $row['AlmCod'];
    $AlmNot = $row['AlmNot'];
    $AlmEstReg = $row['AlmEstReg'];
    $GraCod = $row['GraCod'];
    $EmpCod = $row['EmpCod'];
  }
}

if (isset($_POST['update'])) {
  $AlmCod = $_GET['AlmCod'];
  $AlmNot = $_POST['AlmNot'];
  $AlmEstReg = $_POST['AlmEstReg'];
  $GraCod = $_POST['GraCod'];
  $EmpCod = $_POST['EmpCod'];

  $query = "UPDATE almacen SET AlmNot='$AlmNot', AlmEstReg='$AlmEstReg', GraCod='$GraCod', EmpCod='$EmpCod' WHERE AlmCod='$AlmCod'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index_alm.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_alm.php?AlmCod=<?php echo $_GET['AlmCod']; ?>" method="POST">
        <div class="form-group">
          <textarea name="AlmNot" class="form-control" placeholder="Update Notas"><?php echo $AlmNot; ?></textarea>
        </div>
        <div class="form-group">
          <input name="AlmEstReg" type="text" class="form-control" value="<?php echo $AlmEstReg; ?>" placeholder="Update Estado">
        </div>
        <div class="form-group">
          <input name="GraCod" type="text" class="form-control" value="<?php echo $GraCod; ?>" placeholder="Update Código de Granja">
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

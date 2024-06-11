<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task_alm.php" method="POST">
          <div class="form-group">
            <input type="text" name="codigo" class="form-control" placeholder="Código de Almacén" autofocus>
          </div>
          <div class="form-group">
            <textarea name="notas" class="form-control" placeholder="Notas del Almacén"></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="estado" class="form-control" placeholder="Estado de Registro">
          </div>
          <div class="form-group">
            <input type="text" name="granja" class="form-control" placeholder="Código de Granja">
          </div>
          <div class="form-group">
            <input type="text" name="empresa" class="form-control" placeholder="Código de Empresa">
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Código Almacén</th>
            <th>Notas</th>
            <th>Estado</th>
            <th>Código Granja</th>
            <th>Código Empresa</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM almacen";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['AlmCod']; ?></td>
            <td><?php echo $row['AlmNot']; ?></td>
            <td><?php echo $row['AlmEstReg']; ?></td>
            <td><?php echo $row['GraCod']; ?></td>
            <td><?php echo $row['EmpCod']; ?></td>
            <td>
              <a href="edit_alm.php?AlmCod=<?php echo $row['AlmCod']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task_alm.php?AlmCod=<?php echo $row['AlmCod']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>

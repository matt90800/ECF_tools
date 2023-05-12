<div class="row">
  <div class="col-md-8">
    <h1>Réserver l'outil <?= $name; ?></h1>
    <div class="row">
      <div class="col-md-4">
        <img src="<?= $visual; ?>" alt="<?= $name; ?> image manquante" class="img-fluid">
      </div>
      <div class="col-md-8">
        <h2><?= $name; ?></h2>
        <p><?= $description; ?></p>
      </div>
    </div>
    <hr>
    <form action="" method="post">
      <div class="form-group">
        <input type="hidden" class="form-control" id="id_tool" name="id_tool" value="<?= $id; ?>" required>
      </div>
      <div class="form-group">
        <label for="begining_date">Date de début</label>
        <input type="date" class="form-control" id="begining_date" name="begining_date" required>
      </div>
      <div class="form-group">
        <label for="end_date">Date de fin</label>
        <input type="date" class="form-control" id="end_date" name="end_date" required>
      </div>
      <div class="form-group">
        <input type="hidden" class="form-control" id="id_users" name="id_users" value="<?= $user_id; ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
    <hr>
  </div>
  <div class="col-md-4">
    <h2>Réservations de l'outil <?= $name; ?></h2>
    <table class="table">
      <thead>
        <tr>
          <th>Date de début</th>
          <th>Date de fin</th>
          <th>Utilisateur</th>
        </tr>
      </thead>
      <tbody>
        <p>Script à faire dans BorrowForm</p>
        <script>
          //@TODO script JS pour fetch l'api
          //http://localhost/ECF_Tools/src/index.php?api=lend&id=22
        </script>
      </tbody>
    </table>
  </div>
</div>

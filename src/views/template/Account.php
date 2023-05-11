<div class="container">
    <h1>Mon compte utilisateur</h1>
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action active">Mon compte</a>
          <a href="#" class="list-group-item list-group-item-action">Mes outils</a>
          <a href="#" class="list-group-item list-group-item-action disabled" disabled>Reinitialiser mon mot de passe</a>
          <a href="?action=logout" class="list-group-item list-group-item-action">Déconnexion</a>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Mes informations personnelles</h5>
            <?php include ("UserManagmentForm.php"); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
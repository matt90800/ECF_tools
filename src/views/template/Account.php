<div class="container">
    <h1>Mon compte utilisateur</h1>
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
          <a href="?action=account" class="list-group-item list-group-item-action active">Mon compte</a>
          <a href="?action=account&tab=tool" class="list-group-item list-group-item-action">Mes outils</a>
          <a href="?action=resetPwd" class="list-group-item list-group-item-action disabled" disabled>Reinitialiser mon mot de passe</a>
          <a href="?action=logout" class="list-group-item list-group-item-action">Déconnexion</a>
        </div>
      </div>
      <div class="col-md-9">
            <?php isset($userFormPath)? include $userFormPath:""; ?>
      </div>    
    </div>
</div>
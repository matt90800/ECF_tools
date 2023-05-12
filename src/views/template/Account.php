<div class="container">
    <h1>Mon compte utilisateur</h1>
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
          <a href="?action=account&tab=info" class="list-group-item list-group-item-action <?= isset($_GET['tab'])&& $_GET['tab']=="info"? 'active':''?>">Mon compte</a>
          <a href="?action=account&tab=tool" class="list-group-item list-group-item-action <?= isset($_GET['tab'])&& $_GET['tab']=="tool"? 'active':''?>">Mes outils</a>
          <a href="?action=resetPwd" class="list-group-item list-group-item-action disabled" disabled>Reinitialiser mon mot de passe</a>
          <?= $role->getName()=='admin'? '<a href="?action=account&tab=admin" class="list-group-item list-group-item-action">Mon espace admin</a>':"";?>
          <a href="?action=logout" class="list-group-item list-group-item-action<?= isset($_GET['action'])&& $_GET['action']=="logout"? 'active':''?>">Déconnexion</a>
        </div>
      </div>
      <main class="col-md-9 row">
            <?php 
            if (isset($includePath)&&$type==".js"){
              echo '<script>';
             include dirname(__DIR__)."/JS/".$includePath;
              echo "</script>";
            }
            elseif (isset($includePath))
              include $includePath;
               ?>
      </main>    
    </div>
</div>
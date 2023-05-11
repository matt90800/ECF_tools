<div class="card col-lg-6 col-md-6 col-sm-12 col-12">
  <img src="<?= $image ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $name ?></h5>
    <p class="card-text"><?= $description ?></p>
    <ul class="list-inline mb-0">
      <li class="list-inline-item">
        <strong>Nombre de points :</strong>
      </li>
      <li class="list-inline-item">
        <?= $points ?>
      </li>
    </ul>
    <ul class="list-inline mb-0">
      <li class="list-inline-item">
        <strong>Catégorie :</strong>
      </li>
      <li class="list-inline-item">
        <?= $categoryName ?>
      </li>
    </ul>
    <ul class="list-inline mb-0">
      <li class="list-inline-item">
        <strong>Propriétaire :</strong>
      </li>
      <li class="list-inline-item">
        <?=  $user->getPseudo() ?>
      </li>
    </ul>
  </div>
  <div class="d-flex justify-content-between">
    <?php if (UserController::isSignedIn()&& $_SESSION['user']['id']==$user->getId()){
      echo 
      '<form action="">
        <input type="hidden" name="object" value="'.$id.'">
        <input type="hidden" name="action" value="update">
        <button class="btn btn-primary" type="submit">Update</button>
      </form>
      <form action="">
        <input type="hidden" name="object" value="'.$id.'">
        <input type="hidden" name="action" value="delete">
        <button class="btn btn-primary" type="submit">Delete</button>
      </form>';
    } ?>
      <a href=".." class="btn btn-primary d-block">Back</a>
  </div>
</div>

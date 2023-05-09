<div class="card col-lg-6 col-md-6 col-sm-12  col-12 justify-content-center" >
  <img src=<?= $image ?> class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $firstName ?></h5>
    <p class="card-text"><?= $lastName ?></p>
    <p class="card-title"><?= $firstName ?></p>
    <p class="card-text"><?= $Email ?></p>
    <p class="card-title"><?= $Phone ?></p>
    <p class="card-text"><?= $birthdate ?></p>
    <div class="d-flex justify-content-between">
      <form action="" method="post">
        <input type="hidden" name="object" value="<?php $id ?>">
        <input type="hidden" name="action" value="update">
        <button class="btn btn-primary" type="submit">Update</button>
      </form>
      <form action="" method="post">
        <input type="hidden" name="object" value="<?php $id ?>">
        <input type="hidden" name="action" value="delete">
        <button class="btn btn-primary" type="submit">Delete</button>
      </form>
      <a href="" class="btn btn-primary d-block">Back</a>
    </div>
  </div>
</div>
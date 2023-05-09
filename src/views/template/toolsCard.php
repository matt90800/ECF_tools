<div class="card col-lg-3 col-md-4 col-sm-6  col-10 justify-content-center" >
  <img src=<?= $image ?> class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $name?></h5>
  <form action="" method="post">
    <input type="hidden" name="id" value="<?= $id ?>">
    <button class="btn btn-primary" type="submit">Details</button>
  </form>

  </div>
</div>

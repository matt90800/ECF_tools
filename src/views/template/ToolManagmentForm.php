<form action="" method="post" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputNom">Nom :</label>
            <input value ="<?= $name ?>" type="text" class="form-control" id="inputNom" name="nom" required>
        </div>
        <div class="form-group col-md-6">
            <label for="description">Description :</label>
            <input value ="<?=$description?>" type="text" class="form-control" id="description" name="description" required>
        </div>
    
    <div class="form-group col-md-6">
        <label for="points">Points :</label>
        <input value ="<?=$points?>" type="number" class="form-control" id="points" name="points" required>
    </div>
    <div class="form-group col-md-6 ">
        <label for="category">Categorie :</label>
            <select id="category" class="form-control"name="category" required>
            <?= $categories ?>
    </div>
    <div class="form-group col-md-6">
        <label for="inputImage">Image :</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputImage" name="image" accept="image">
            <label class="custom-file-label" for="inputImage">Choisir une image</label>
        </div>
    </div>
    <!-- <input type="hidden" name="action" value="<?/*  $create */ ?>"> -->
    <button type="submit" class="btn btn-primary">Envoyer</button>
    </div>
</form>


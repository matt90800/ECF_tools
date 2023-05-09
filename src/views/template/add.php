<form action="" method="post" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputNom">Nom :</label>
            <input value ="<?=$lastName?>" type="text" class="form-control" id="inputNom" name="nom" required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputPrenom">Prénom :</label>
            <input value ="<?= $firstName ?>" type="text" class="form-control" id="inputPrenom" name="prenom" required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail">Email :</label>
        <input value ="<?= $email ?>" type="email" class="form-control" id="inputEmail" name="email" required>
    </div>
    <div class="form-group">
        <label for="inputTelephone">Téléphone :</label>
        <input value ="<?= $phone ?>" type="tel" class="form-control" id="inputTelephone" name="telephone" required>
    </div>
    <div class="form-group">
        <label for="inputDateNaissance">Date de naissance :</label>
        <input value ="<?= $birthDate ?>" type="date" class="form-control" id="inputDateNaissance" name="date_naissance" required>
    </div>
    <div class="form-group">
        <label for="inputImage">Image :</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputImage" name="image" accept="image/png">
            <label class="custom-file-label" for="inputImage">Choisir une image</label>
        </div>
    </div>
    <input type="hidden" name="action" value="<? $create ?>">
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>


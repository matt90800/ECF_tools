<h2><?=$formName?></h2>
<form action="" method="POST">
    <div class="form-group">
        <label for="lastname">Nom de famille</label>
        <input value="<?=isset($lastname)?$lastname:'' ?>" type="text" class="form-control" id="lastname" name="lastname" required>
    </div>
    <div class="form-group">
        <label for="firstname">Prénom</label>
        <input value="<?=isset($firstname)?$firstname:'' ?>" type="text" class="form-control"  id="firstname" name="firstname" required>
    </div>
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input value="<?=isset($email)?$email:'' ?>" type="text" class="form-control"  id="pseudo" name="pseudo" />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input value="<?=isset($points)?$points:'' ?>" type="email" class="form-control"  id="email" name="email" required />
    </div>
    <?= !isset($password) ? '
    <div class="form-group">
        <label for="password">Password</label>
        <input value="" type="password" class="form-control"  id="password" name="password" required />
    </div>
    ':''?>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><?=$formName?></button>
    </div>
    <?= !isset($password); true? '
    <div class="form-group">
        <p class="login-link">Already have an account? <a href="http://localhost/ECF-Tools/src/index.php?action=signin">Log In</a></p>
    </div>
    ':'nope';?>
</form>

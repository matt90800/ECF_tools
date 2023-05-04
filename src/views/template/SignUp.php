<?php 
$registerPart=file_get_contents("./views/partials/RegisterPart.php"); 
$home="index.php"; /* variable php pour définir le HREF de HOME */
$form="index.php"; /* variable php pour définir le HREF de créer un contact */
require_once("./views/partials/Header.php"); ?>
<h2>Sign Up</h2>
<form action="" method="POST">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <button type="submit">Sign Up</button>
      </div>
      <div class="form-group">
        <p class="login-link">Already have an account? <a href="http://localhost/ECF-Tools/src/index.php?action=signin">Log In</a></p>
      </div>
</form>

<?php require_once("./views/partials/Footer.php");?>

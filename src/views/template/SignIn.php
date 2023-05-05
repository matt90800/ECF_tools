<?php 
$registerPart=file_get_contents("./views/partials/RegisterPart.php"); 
$home="index.php"; /* variable php pour définir le HREF de HOME */
$form="index.php"; /* variable php pour définir le HREF de créer un contact */
require_once("./views/partials/Header.php"); ?>  
<div class="container">
    <h2>Sign In</h2>
    <form action="" method="POST">
      <div class="form-group">
        <label for="username">Username or email</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <button type="submit">Sign In</button>
      </div>
    </form>
  </div>
<?php require_once("./views/partials/Footer.php");?>


<body>

  <!-- Barre de navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <h2 class="navbar-brand" href="#">Administration</h2>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Catégories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Utilisateurs</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-4">

    <!-- Zone pour ajouter des catégories -->
    <div class="card">
      <div class="card-header">
        Ajouter une catégorie
      </div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <label for="nom">Nom de la catégorie :</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
      </div>
    </div>

    <!-- Zone pour gérer les utilisateurs -->
    <div class="card mt-4">
      <div class="card-header">
        Gérer les utilisateurs
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Email</th>
              <th>Rôle</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>John Doe</td>
              <td>john.doe@example.com</td>
              <td>Utilisateur</td>
              <td>
                <button type="button" class="btn btn-sm btn-primary">Modifier</button>
                <button type="button" class="btn btn-sm btn-danger">Supprimer</button>
              </td>
            </tr>
            <tr>
              <td>Jane Smith</td>
              <td>jane.smith@example.com</td>
              <td>Administrateur</td>
              <td>
                <button type="button" class="btn btn-sm btn-primary">Modifier</button>
                <button type="button" class="btn btn-sm btn-danger">Supprimer</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

</body>

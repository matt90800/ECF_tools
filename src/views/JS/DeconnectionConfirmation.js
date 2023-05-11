// Récupération des éléments du formulaire
const form = document.getElementById('logout-form');
const logoutBtn = document.getElementById('logout-btn');

// Ajout d'un événement de clic sur le bouton de déconnexion
logoutBtn.addEventListener('click', function(event) {
  event.preventDefault(); // Empêche le formulaire d'être soumis

  // Affichage d'un dialogue pour proposer de se déconnecter ou de rester connecté
  if (confirm('Voulez-vous vous déconnecter ?')) {
    form.submit(); // Soumission du formulaire si l'utilisateur choisit de se déconnecter
  }
});

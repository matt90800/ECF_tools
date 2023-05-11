<?php
// Définir les en-têtes de réponse pour JSON
header('Content-Type: application/json');

// Simuler une liste d'utilisateurs
$users = array(
    array('id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'),
    array('id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com'),
    array('id' => 3, 'name' => 'Bob Johnson', 'email' => 'bob@example.com')
);

// Convertir la liste d'utilisateurs en JSON
$json = json_encode($users);

// Envoyer la réponse JSON
echo $json;

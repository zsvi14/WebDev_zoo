<?php
// Inclure la connexion à la base de données
include_once 'back/db/database.php'; // Assure-toi que ce fichier configure bien la connexion à la base de données

header('Content-Type: application/json');

// Préparer la requête SQL
$query = "SELECT * FROM services";
$result = $db->query($query); //result c'est db donc dans database tu me db devant le new

$services = [];
while ($row = $result->fetch_assoc()) {
    $services[] = $row;
}

// Envoyer les données en JSON
echo json_encode($services);
?>

<?php
// Définir le type de contenu comme JSON
header('Content-Type: application/json');

// Gérer les problèmes de CORS (si nécessaire)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Inclure la connexion à la base de données
include_once '../db/database.php';

// Requête SQL pour récupérer les données des enclos
$query = "SELECT e.id, a.nom AS animal, b.nom AS biome
          FROM enclos e
          JOIN animaux a ON e.id_animaux = a.id
          JOIN biomes b ON e.id_biomes = b.id";

// Exécuter la requête
$result = $db->query($query);

// Vérifier si la requête a réussi
if (!$result) {
    echo json_encode(['error' => 'Erreur SQL : ' . $db->error]);
    exit;
}

// Vérifier si des données sont retournées
if ($result->num_rows > 0) {
    $enclos = [];
    while ($row = $result->fetch_assoc()) {
        $enclos[] = $row;
    }
    echo json_encode($enclos); // Retourner les données en JSON
} else {
    echo json_encode([]); // Retourner un tableau vide si aucun enclos n'est trouvé
}
?>

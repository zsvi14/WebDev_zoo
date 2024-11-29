<?php
// Définir le type de contenu comme JSON
header('Content-Type: application/json');
include_once '../db/database.php';  // Assurez-vous que le chemin est correct

// Gérer les problèmes de CORS (si nécessaire)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
// Inclure la connexion à la base de données
include_once '../db/database.php';
// Requête SQL pour récupérer les données des enclos
$query = "SELECT e.id, a.nom AS animal, b.nom AS biome
$query = "SELECT e.nom, a.nom AS animal
          FROM enclos e
          JOIN animaux a ON e.id_animaux = a.id
          JOIN biomes b ON e.id_biomes = b.id";
          LEFT JOIN enclos_animaux ea ON e.id = ea.id_enclos
          LEFT JOIN animaux a ON ea.id_animal = a.id";

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
        // Construire la structure des enclos avec leurs animaux
        $enclos[$row['nom']]['nom'] = $row['nom'];
        $enclos[$row['nom']]['animaux'][] = ['nom' => $row['animal']];
    }
    echo json_encode($enclos); // Retourner les données en JSON
    echo json_encode(array_values($enclos));  // Renvoyer sous forme de tableau
} else {
    echo json_encode([]); // Retourner un tableau vide si aucun enclos n'est trouvé
    echo json_encode([]);  // Aucune donnée à renvoyer
}
?>
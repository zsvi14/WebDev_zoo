<?php
header('Content-Type: application/json');
include_once '../db/database.php';

// Requête SQL pour récupérer les enclos et leurs animaux
$query = "SELECT e.nom AS enclos_nom, a.nom AS animal
          FROM enclos e
          LEFT JOIN enclos_animaux ea ON e.id = ea.id_enclos
          LEFT JOIN animaux a ON ea.id_animal = a.id";

$result = $db->query($query);

if ($result->num_rows > 0) {
    $enclos = [];
    
    while ($row = $result->fetch_assoc()) {
        // Si l'enclos n'existe pas encore dans le tableau, l'ajouter
        if (!isset($enclos[$row['enclos_nom']])) {
            $enclos[$row['enclos_nom']] = ['nom' => $row['enclos_nom'], 'animaux' => []];
        }
        
        // Ajouter l'animal à l'enclos approprié
        $enclos[$row['enclos_nom']]['animaux'][] = ['nom' => $row['animal']];
    }
    
    // Renvoyer le résultat sous forme de tableau JSON
    echo json_encode(array_values($enclos));  // array_values pour réindexer le tableau
} else {
    // Si aucun enclos ou animal n'est trouvé, renvoyer un tableau vide
    echo json_encode([]);
}
?>

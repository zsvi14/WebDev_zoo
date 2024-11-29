<?php
header('Content-Type: application/json');
include_once '../db/database.php';  

// Requête pour récupérer les enclos et les animaux associés
$query = "SELECT e.nom AS nom_enclos, e.nom_animal AS animal
          FROM enclos e";

$result = $db->query($query);

if ($result->num_rows > 0) {
    $enclos = [];
    while ($row = $result->fetch_assoc()) {
        // Si l'enclos n'est pas déjà dans le tableau, l'ajouter
        if (!isset($enclos[$row['enclos_nom']])) {
            $enclos[$row['nom_enclos']] = [
                'nom' => $row['nom_enclos'], 
                'animaux' => []
            ];
        }
        // Ajouter l'animal à l'enclos
        $enclos[$row['nom_enclos']]['animaux'][] = ['nom' => $row['animal']];
    }
    echo json_encode(array_values($enclos));  // Renvoyer sous forme de tableau JSON
} else {
    echo json_encode([]);  // Aucune donnée à renvoyer
}
?>

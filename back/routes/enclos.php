<?php
header('Content-Type: application/json');
include_once '../db/database.php'; 

$query = "SELECT e.nom_enclos AS enclos_nom, e.nom_animal AS animal
          FROM enclos e
          LEFT JOIN animaux a ON e.nom_animal = a.nom";

$result = $db->query($query);

if ($result->num_rows > 0) {
    $enclos = [];
    while ($row = $result->fetch_assoc()) {
        // Construire la structure des enclos avec leurs animaux
        $enclos[$row['enclos_nom']]['nom'] = $row['enclos_nom'];
        $enclos[$row['enclos_nom']]['animaux'][] = ['nom' => $row['animal']];
    }
    echo json_encode(array_values($enclos));  // Renvoyer sous forme de tableau
} else {
    echo json_encode([]);  // Aucune donnée à renvoyer
}
?>


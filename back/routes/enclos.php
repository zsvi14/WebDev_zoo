<?php
header('Content-Type: application/json');
include_once '../db/database.php';  // Assurez-vous que le chemin est correct

$query = "SELECT e.nom, a.nom AS animal
          FROM enclos e
          LEFT JOIN enclos_animaux ea ON e.id = ea.id_enclos
          LEFT JOIN animaux a ON ea.id_animal = a.id";

$result = $db->query($query);

if ($result->num_rows > 0) {
    $enclos = [];
    while ($row = $result->fetch_assoc()) {
        // Construire la structure des enclos avec leurs animaux
        $enclos[$row['nom']]['nom'] = $row['nom'];
        $enclos[$row['nom']]['animaux'][] = ['nom' => $row['animal']];
    }
    echo json_encode(array_values($enclos));  // Renvoyer sous forme de tableau
} else {
    echo json_encode([]);  // Aucune donnée à renvoyer
}
?>

<?php
header('Content-Type: application/json');
include_once '../db/database.php';  
$json = file_get_contents('/front/CSS_JS/assets/enclos.json');
echo $json;

$query = "SELECT e.nom AS enclos_nom, a.nom AS animal
          FROM enclos e
          LEFT JOIN enclos_animaux ea ON e.id = ea.id_enclos
          LEFT JOIN animaux a ON ea.id_animal = a.id";

$result = $db->query($query);

if ($result->num_rows > 0) {
    $enclos = [];
    while ($row = $result->fetch_assoc()) {
        // Vérifier si l'enclos existe déjà dans le tableau
        if (!isset($enclos[$row['enclos_nom']])) {
            $enclos[$row['enclos_nom']] = ['nom' => $row['enclos_nom'], 'animaux' => []];
        }
        // Ajouter l'animal à l'enclos
        $enclos[$row['enclos_nom']]['animaux'][] = ['nom' => $row['animal']];
    }
    echo json_encode(array_values($enclos));  // Renvoyer sous forme de tableau
} else {
    echo json_encode([]);  // Aucune donnée à renvoyer
}
?>

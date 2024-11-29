<?php
header('Content-Type: application/json');
include_once '../db/database.php';  

$query = "SELECT e.nom AS enclos_nom, a.nom AS animal
          FROM enclos e
          LEFT JOIN enclos_animaux ea ON e.id = ea.id_enclos
          LEFT JOIN animaux a ON ea.id_animal = a.id";

$result = $db->query($query);

if ($result->num_rows > 0) {
    // Créez un tableau pour stocker les enclos et leurs animaux
    $enclos = [];

    // Parcourez les résultats de la base de données
    while ($row = $result->fetch_assoc())

    // Renvoie la réponse au format souhaité
    echo json_encode(array_values($enclos));  // array_values() pour réindexer les clés
} else {
    // Si aucune donnée n'est trouvée, renvoie un tableau vide
    echo json_encode([]);
}
?>

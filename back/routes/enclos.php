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
    while ($row = $result->fetch_assoc()) {
        // Si l'enclos n'existe pas encore dans le tableau, ajoutez-le
        if (!isset($enclos[$row['enclos_nom']])) {
            $enclos[$row['enclos_nom']] = ['nom' => $row['enclos_nom'], 'animaux' => []];
        }

        // Ajoutez l'animal à l'enclos
        if ($row['animal']) {
            $enclos[$row['enclos_nom']]['animaux'][] = ['nom' => $row['animal']];
        }
    }

    // Uniformiser les données : s'assurer que "animaux" est toujours une liste
    foreach ($enclos as &$entry) {
        if (count($entry['animaux']) === 0) {
            // Ajouter un animal par défaut si aucun animal trouvé
            $entry['animaux'][] = ['nom' => $entry['nom']];
        }
    }

    // Renvoie la réponse au format souhaité
    echo json_encode(array_values($enclos));  // array_values() pour réindexer les clés
} else {
    // Si aucune donnée n'est trouvée, ajouter un enclos avec un animal par défaut
    $default_enclos = [
        ['nom' => 'Enclos des Panthères', 'animaux' => [['nom' => 'Panthères']]]
    ];
    echo json_encode($default_enclos);
}
?>



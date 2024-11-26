<?php
header('Content-Type: application/json');
include_once '../db/database.php';  

$query = "SELECT e.nom AS enclos_nom, a.nom AS animal
          FROM enclos e
          LEFT JOIN enclos_animaux ea ON e.id = ea.id_enclos
          LEFT JOIN animaux a ON ea.id_animal = a.id";

$result = $db->query($query);

$enclos = []; // Tableau final des enclos

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Vérifie si l'enclos existe déjà dans le tableau
        if (!isset($enclos[$row['enclos_nom']])) {
            $enclos[$row['enclos_nom']] = [
                'nom' => $row['enclos_nom'],
                'animaux' => [] // Initialise la liste d'animaux
            ];
        }

        // Ajoute l'animal à l'enclos si trouvé
        if ($row['animal']) {
            $enclos[$row['enclos_nom']]['animaux'][] = ['nom' => $row['animal']];
        }
    }

    // Ajoute un animal par défaut pour les enclos sans animaux
    foreach ($enclos as &$entry) {
        if (empty($entry['animaux'])) {
            $entry['animaux'][] = ['nom' => 'Animal par défaut']; // Modifier ici si besoin
        }
    }

    // Réindexe les enclos avant envoi
    echo json_encode(array_values($enclos));
} else {
    // Cas où aucune donnée n'est trouvée dans la base de données
    echo json_encode([
        [
            'nom' => 'Enclos des Panthères',
            'animaux' => [['nom' => 'Panthères']]
        ]
    ]);
}
?>

<?php
header('Content-Type: application/json');

// Inclure la connexion à la base de données
include_once '../db/database.php';

// Charger le fichier JSON avec les enclos et animaux
$json = file_get_contents('../front/CSS_JS/assets/enclos.json');
$enclos_json = json_decode($json, true);  // Décoder le contenu du fichier JSON

// Exécuter la requête SQL pour récupérer les enclos et les animaux
$query = "SELECT e.nom AS enclos_nom, a.nom AS animal
          FROM enclos e
          LEFT JOIN enclos_animaux ea ON e.id = ea.id_enclos
          LEFT JOIN animaux a ON ea.id_animal = a.id";

$result = $db->query($query);

if ($result->num_rows > 0) {
    // Créer un tableau pour stocker les enclos et leurs animaux
    $enclos = [];

    while ($row = $result->fetch_assoc()) {
        // Si l'enclos n'existe pas encore dans le tableau, l'ajouter
        if (!isset($enclos[$row['enclos_nom']])) {
            $enclos[$row['enclos_nom']] = ['nom' => $row['enclos_nom'], 'animaux' => []];
        }

        // Ajouter l'animal à l'enclos
        if ($row['animal']) {
            $enclos[$row['enclos_nom']]['animaux'][] = ['nom' => $row['animal']];
        }
    }

    // Fusionner les enclos récupérés de la base avec ceux du fichier JSON
    // Utilisation de array_merge pour combiner les deux ensembles de données
    // Si un enclos existe à la fois dans la base et dans le fichier JSON, on l'ajoute ensemble
    foreach ($enclos_json as &$json_enclos) {
        foreach ($enclos as $db_enclos) {
            // Si l'enclos existe déjà, on fusionne les animaux
            if ($json_enclos['nom'] == $db_enclos['nom']) {
                $json_enclos['animaux'] = array_merge($json_enclos['animaux'], $db_enclos['animaux']);
                break;
            }
        }
    }

    // Si un enclos n'existe pas dans le fichier JSON, l'ajouter
    foreach ($enclos as $db_enclos) {
        $found = false;
        foreach ($enclos_json as $json_enclos) {
            if ($json_enclos['nom'] == $db_enclos['nom']) {
                $found = true;
                break;
            }
        }

        // Si l'enclos n'a pas été trouvé, on l'ajoute
        if (!$found) {
            $enclos_json[] = $db_enclos;
        }
    }

    // Renvoi de la réponse sous forme de JSON
    echo json_encode($enclos_json);
} else {
    // Si aucun enclos n'est trouvé dans la base de données, renvoyer les enclos du fichier JSON
    echo json_encode($enclos_json);  // Renvoie le contenu du fichier JSON s'il existe
}
?>

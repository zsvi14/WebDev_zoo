<?php
header('Content-Type: application/json');
include_once '../db/database.php';  // Inclure la connexion à la base de données

// Charger le fichier JSON si nécessaire
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

    // Combiner les données de la base et du fichier JSON si nécessaire (ici, on ajoute les enclos depuis la base de données)
    $enclos_final = array_merge($enclos_json, array_values($enclos));

    // Renvoyer la réponse sous forme de JSON
    echo json_encode($enclos_final);

} else {
    // Si aucun enclos n'est trouvé dans la base de données, renvoyer les enclos JSON existants ou un tableau vide
    echo json_encode($enclos_json);  // Renvoie le contenu du fichier JSON s'il existe
}
?>

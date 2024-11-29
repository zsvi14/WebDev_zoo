<?php
header('Content-Type: application/json');
include_once '../db/database.php';  // Assurez-vous que ce chemin est correct

// Requête SQL pour récupérer les enclos et leurs animaux
$query = "SELECT e.nom_enclos AS enclos_nom, e.nom_animal AS animal
          FROM enclos e";

// Exécution de la requête SQL
$result = $db->query($query);

if ($result->num_rows > 0) {
    $enclos = [];
    while ($row = $result->fetch_assoc()) {
        // Si l'enclos n'est pas déjà dans le tableau, on l'ajoute
        if (!isset($enclos[$row['enclos_nom']])) {
            $enclos[$row['enclos_nom']] = [
                'nom' => $row['enclos_nom'], 
                'animaux' => []
            ];
        }
        // Ajouter l'animal à l'enclos
        $enclos[$row['enclos_nom']]['animaux'][] = ['nom' => $row['animal']];
    }
    // Renvoyer les enclos sous forme de tableau JSON
    echo json_encode(array_values($enclos));
} else {
    // Renvoyer un tableau vide si aucun résultat
    echo json_encode([]);
}
?>


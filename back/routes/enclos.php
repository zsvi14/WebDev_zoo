<?php
header('Content-Type: application/json');
include_once '../db/database.php';

// Requête SQL pour récupérer les enclos
$query = "SELECT e.nom AS enclos_nom
          FROM enclos e";

$result = $db->query($query);

if ($result->num_rows > 0) {
    $enclos = [];

    while ($row = $result->fetch_assoc()) {
        // Ajouter l'enclos au tableau
        $enclos[] = ['nom' => $row['enclos_nom']];
    }

    // Renvoyer le résultat sous forme de tableau JSON
    echo json_encode($enclos);
} else {
    // Si aucun enclos n'est trouvé, renvoyer un tableau vide
    echo json_encode([]);
}
?>

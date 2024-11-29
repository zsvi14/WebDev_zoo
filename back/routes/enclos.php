<?php
header('Content-Type: application/json');
include_once '../db/database.php';  

// Requête SQL pour obtenir les enclos avec leurs animaux associés
$query = "
    SELECT e.nom_enclos, a.nom AS animal
    FROM enclos e
    LEFT JOIN animaux a ON e.id = a.id_enclos
";

// Exécution de la requête
$result = $db->query($query);

// Vérification si des résultats sont retournés
if ($result->num_rows > 0) {
    $enclos = [];  // Tableau pour stocker les enclos et leurs animaux
    
    // Traitement des résultats de la requête
    while ($row = $result->fetch_assoc()) {
        // Si l'enclos n'existe pas déjà dans le tableau, l'ajouter
        if (!isset($enclos[$row['nom_enclos']])) {
            $enclos[$row['nom_enclos']] = [
                'nom' => $row['nom_enclos'],
                'animaux' => []  // Initialiser le tableau des animaux
            ];
        }

        // Ajouter l'animal à l'enclos
        if ($row['animal']) {
            $enclos[$row['nom_enclos']]['animaux'][] = ['nom' => $row['animal']];
        }
    }

    // Convertir le tableau des enclos en JSON et l'afficher
    echo json_encode(array_values($enclos));  // Utilisation de array_values pour réindexer le tableau
} else {
    // Si aucun résultat n'est trouvé, renvoyer un tableau vide
    echo json_encode([]);
}
?>

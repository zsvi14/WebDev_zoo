<?php
header('Content-Type: application/json'); // Définit le type de contenu à JSON

// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=bddzoo', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erreur de connexion : ' . $e->getMessage()]);
    exit;
}

// Requête pour récupérer les enclos et leurs animaux
$query = "
    SELECT e.id AS enclos_id, e.nom AS nom_enclos, a.id AS animal_id, a.nom AS nom_animal
    FROM enclos e
    LEFT JOIN animaux a ON e.id = a.id_enclos
";

try {
    $stmt = $pdo->query($query);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Organiser les données
    $enclosList = [];
    foreach ($rows as $row) {
        $enclosId = $row['enclos_id'];

        if (!isset($enclosList[$enclosId])) {
            $enclosList[$enclosId] = [
                'id' => $enclosId,
                'nom' => $row['nom_enclos'],
                'animaux' => []
            ];
        }

        if ($row['animal_id']) {
            $enclosList[$enclosId]['animaux'][] = [
                'id' => $row['animal_id'],
                'nom' => $row['nom_animal']
            ];
        }
    }

    // Retourner les données
    echo json_encode(array_values($enclosList));
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erreur lors de la récupération des données : ' . $e->getMessage()]);
}
?>

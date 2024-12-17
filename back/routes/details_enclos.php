<?php
// Paramètres de connexion à la base de données
$host = "localhost";
$dbname = "bddzoo";
$username = "root";
$password = "";

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["error" => "Erreur de connexion : " . $e->getMessage()]);
    exit;
}

// Vérifie si un ID d'enclos est passé dans l'URL
if (isset($_GET['id'])) {
    $enclosId = intval($_GET['id']);

    // Requête pour récupérer les détails de l'enclos
    $query = "SELECT e.nom_enclos AS enclos, b.nom AS biome, 
                     GROUP_CONCAT(a.nom SEPARATOR ', ') AS animaux
              FROM enclos e
              LEFT JOIN biomes b ON e.id_biomes = b.id
              LEFT JOIN animaux a ON e.id = a.id_enclos
              WHERE e.id = :id
              GROUP BY e.id";

    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $enclosId]);
    $details = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si aucun enclos n'est trouvé
    if (!$details) {
        echo json_encode(["error" => "Aucun enclos trouvé avec cet ID."]);
        exit;
    }

    // Retourner les détails de l'enclos en JSON
    echo json_encode($details);
} else {
    echo json_encode(["error" => "ID d'enclos manquant."]);
}
